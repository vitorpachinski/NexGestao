<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $customer = new Customer();
        $customer->name = 'Fornecedor1';
        $customer->site = 'fornecedor1.com.br';
        $customer->country = 'CN';
        $customer->email = 'fornecedor1@gmail.com.br';
        $customer->save();

        Customer::create([
            'name' => 'Fornecedor2',
            'site' => 'fornecedor2.com.br',
            'country' => 'US',
            'email' => 'fornecedor2@gmail.com'
        ]);

        /* DB::Table('customers')->insert([
            'name' => 'Fornecedor3',
            'site' => 'fornecedor3.com.br',
            'country' => 'BR',
            'e_mail' => 'fornecedor3@gmail.com'
        ]); */
    }
}
