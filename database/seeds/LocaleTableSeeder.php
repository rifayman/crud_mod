<?php

use Illuminate\Database\Seeder;
use Infinety\CRUD\Models\Locale;

class LocaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locale = new Locale();
        $locale->language = "Español";
        $locale->iso = "es";
        $locale->state = 1;
        $locale->save();

        $locale = new Locale();
        $locale->language = "English";
        $locale->iso = "en";
        $locale->state = 1;
        $locale->save();
    }
}
