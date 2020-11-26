<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           $setting = Setting::create([
            'notification_settings_text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit  Nobis  pariatur!' ,
            'about_app' => 'lorem ipsum dolor sit amet consectetur',
            'phone' => '12345678912',
            'email' =>'admin@admin.com',
            'fb_link' => 'admin@facebook.com',
            'tw_link' =>'admin@twitter.com',
            'insta_link' =>'admin@instgram.com',
            'youtube_link' =>'admin@youtube.com',
        ]);
    }
}
