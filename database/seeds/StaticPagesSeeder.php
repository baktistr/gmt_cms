<?php

use App\StaticPages;
use Illuminate\Database\Seeder;

class StaticPagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = collect([
            [
                'title' => 'Terms & Conditions',
                'slug'  => 'terms-conditions'
            ],
            [
                'title' => 'Privacy Policy',
                'slug'  => 'privacy-policy'
            ]

        ]);

        $title->each(function ($title) {
            factory(StaticPages::class)->create([
                'title' => $title['title'],
                'slug'  => $title['slug']
            ]);
        });
    }
}
