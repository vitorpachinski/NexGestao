<?php

namespace App\Console\Commands;

use App\Models\Contact;
use Illuminate\Console\Command;

class RemoveDuplicatedNumbers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-duplicated-numbers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $contacts = Contact::all();

        foreach ($contacts as $contact) {

            $duplicates = Contact::where('number', $contact->number)->where('id', '=', $contact->id)->get();
            if ($duplicates->count() > 0) {
                foreach ($duplicates as $duplicate) {
                    $maxIdContact = $duplicate->max('id');
                    if($duplicate->id === $maxIdContact){
                        $duplicate->delete();
                    }
                    // dd($duplicate);
                }
            }
        }
    }
}
