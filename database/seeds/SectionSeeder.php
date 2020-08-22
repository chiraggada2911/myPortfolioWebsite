<?php

use App\Models\Admin\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ID to zero
        Section::truncate();

        // Create datas
        Section::create([
            'title' => 'About Page',
            'section' => 'about_page',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Portfolio Page',
            'section' => 'portfolio_page',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Contact Page',
            'section' => 'contact_page',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Blog Page',
            'section' => 'blog_page',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Personel Info Section',
            'section' => 'personel_info_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Counter Section',
            'section' => 'counter_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Skill Section',
            'section' => 'skill_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Experience Section',
            'section' => 'experience_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Education Section',
            'section' => 'education_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Preloader',
            'section' => 'preloader',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Maintenance Mode',
            'section' => 'maintenance_mode',
            'status' => 0
        ]);


    }
}
