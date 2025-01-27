<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactReason;

class ContactReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactReason::create(['contact_reason' => 'Dúvidas']);
        ContactReason::create(['contact_reason' => 'Sugestões']);
        ContactReason::create(['contact_reason' => 'Reclamações']);
        ContactReason::create(['contact_reason' => 'Elogios']);
        ContactReason::create(['contact_reason' => 'Outros']);
    }
}
