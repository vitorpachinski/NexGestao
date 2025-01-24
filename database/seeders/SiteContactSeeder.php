<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContact;

class SiteContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contact = new SiteContact();

        $contact->name = 'Sistema SG';
        $contact->phone = '(42) 99999-9999';
        $contact->email = 'contato@sg.com';
        $contact->reason = 1;
        $contact->message = 'Bem-vindo ao sistema!';
        $contact->save();
    }
}
