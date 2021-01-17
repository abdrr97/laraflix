<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title' => 'Privacy Policy',
            'body' => 'Privacy Policy <b>Privacy Policy</b>',
            'type' => 'policy'
        ]);
        Page::create([
            'title' => 'Terms of Use',
            'body' => 'Terms of Use <b>Terms of Use</b>',
            'type' => 'terms'
        ]);
        Page::create([
            'title' => 'Security',
            'body' => 'Security <b>Security</b>',
            'type' => 'security'
        ]);
    }
}
