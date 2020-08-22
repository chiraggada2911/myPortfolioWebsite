<?php

namespace App\Providers;

use App\Models\Admin\Color;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\HomepageVersion;
use App\Models\Admin\Message;
use App\Models\Admin\Section;
use App\Models\Admin\Seo;
use App\Models\Admin\SiteInfo;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (Schema::hasTable('seos')) {
            // Retrieve the first model
            $seo = Seo::first();
            View::share('seo', $seo);
        }

        if (Schema::hasTable('google_analytics')) {
            // Retrieve the first model
            $google_analytic = GoogleAnalytic::first();
            View::share('google_analytic', $google_analytic);
        }

        if (Schema::hasTable('colors')) {
            // Retrieve the first model
            $color = Color::first();
            View::share('color', $color);
        }

        if (Schema::hasTable('homepage_versions')) {
            // Retrieve the first model
            $homepage_version = HomepageVersion::first();
            View::share('homepage_version', $homepage_version);
        }

        if (Schema::hasTable('site_infos')) {
            // Retrieve the first model
            $site_info = SiteInfo::first();
            View::share('site_info', $site_info);
        }

        if (Schema::hasTable('sections')) {
            // Retrieve the first model
            $sections = Section::all();

            if (count($sections) > 0) {
                // For Section Enable/Disable
                foreach ($sections as $section) {
                    $section_arr[$section->section] = $section->status;
                }

                View::share('section_arr', $section_arr);
            }
        }

        if (Schema::hasTable('messages')) {
            // Retrieve messages
            $unread_messages = Message::where('read', 0)->orderBy('id', 'desc')->take(4)->get();
            $unread_message_count = Message::where('read', 0)->get();
            View::share('unread_messages', $unread_messages);
            View::share('unread_message_count', $unread_message_count);
        }

    }
}
