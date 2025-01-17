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
            $duplicates = Contact::where('number', $contact->number)
            ->where('customer_id', $contact->customer_id)
            ->where('code', $contact->code)
            ->max('id');

            if($contact->id != $duplicates){
                $contact->delete();
            }
        }
    }
}
