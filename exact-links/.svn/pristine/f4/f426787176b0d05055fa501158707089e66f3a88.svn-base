<?php

namespace ExactLinks\Framework\Database\Seeders;

use ExactLinks\Models\Link;

class LedgerSeeder
{
    public static function seed()
    {
        $count = 5;
        $faker = \Faker\Factory::create();
        $model = new Link();
        while(($count--)) {
            $model->create([
                'title' => $w = ucfirst($faker->word),
                'slug' => sanitize_title($w)
            ]);
        }
    }
}
