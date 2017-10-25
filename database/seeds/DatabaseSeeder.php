<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AsistenteTableSeeder::class);
        $this->call(ContactoTableSeeder::class);
        $this->call(SedeTableSeeder::class);
        $this->call(EventTableSeeder::class);  
        $this->call(AsistenteEventoSeeder::class);
    }

}
