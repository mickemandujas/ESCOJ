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
         $this->call(CountriesTableSeeder::class);
	     $this->call(InstitutionsTableSeeder::class);
         $this->call(TagsTableSeeder::class);
         $this->call(LanguagesTableSeeder::class);
         $this->call(SourcesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(OrganizationsTableSeeder::class);
         $this->call(ProblemsTableSeeder::class);
    }
}
