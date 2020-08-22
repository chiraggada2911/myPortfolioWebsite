<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Start Frontend
Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home.index');
});

Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::get('about', 'AboutController@index')->name('about.index');
});

Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::get('portfolio', 'PortfolioController@index')->name('portfolio.index');
});

Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::get('contact', 'ContactController@index')->name('contact.index');
    Route::post('contact', 'ContactController@store')->name('contact-page.store');
});

Route::namespace('Frontend')->middleware(['XSS'])->group(function () {
    Route::get('blog', 'BlogController@index')->name('blog.index');
    Route::get('blog/{slug}', 'BlogController@show')->name('blog.show');
});
// Start Frontend

// Start Admin Panel
Route::middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/dashboard', 'HomeController@index')->name('home');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('admin/profile/{id}', 'ProfileController@update')->name('profile.update');
    Route::get('admin/profile/change-password', 'ProfileController@change_password_edit')->name('profile.change_password_edit');
    Route::put('admin/profile/change-password/update', 'ProfileController@change_password_update')->name('profile.change_password_update');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/profile-photo', 'ProfilePhotoController@index')->name('profile-photo.index');
    Route::get('admin/{id}/edit-profile-photo', 'ProfilePhotoController@edit')->name('profile-photo.edit');
    Route::post('admin/profile-photo', 'ProfilePhotoController@store')->name('profile-photo.store');
    Route::get('admin/profile-photo/add-profile-photo', 'ProfilePhotoController@create')->name('profile-photo.create');
    Route::put('admin/profile-photo/{id}', 'ProfilePhotoController@update')->name('profile-photo.update');
    Route::delete('admin/profile-photo/{id}', 'ProfilePhotoController@destroy')->name('profile-photo.destroy');
    Route::patch('admin/profile-photo/update_status/{id}', 'ProfilePhotoController@update_status')->name('profile-photo.update_status');
    Route::patch('admin/profile-photo/all_update_status', 'ProfilePhotoController@all_update_status')->name('profile-photo.all_update_status');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/content', 'ContentController@create')->name('content.create');
    Route::post('admin/content', 'ContentController@store')->name('content.store');
    Route::put('admin/content/{id}', 'ContentController@update')->name('content.update');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/about-me', 'AboutController@create')->name('about-me.create');
    Route::post('admin/about-me', 'AboutController@store')->name('about-me.store');
    Route::put('admin/about-me/{id}', 'AboutController@update')->name('about-me.update');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/personel-info', 'PersonelInfoController@create')->name('personel-info.create');
    Route::post('admin/personel-info', 'PersonelInfoController@store')->name('personel-info.store');
    Route::put('admin/personel-info/{id}', 'PersonelInfoController@update')->name('personel-info.update');

    Route::post('admin/info-list', 'PersonelInfoController@store_info_list')->name('personel-info.store_info_list');
    Route::put('admin/personel-info/update_info-list/{id}', 'PersonelInfoController@update_info_list')->name('personel-info.update_info_list');
    Route::get('admin/{id}/personel-info', 'PersonelInfoController@edit_info_list')->name('personel-info.edit_info_list');
    Route::delete('admin/personel-info/{id}', 'PersonelInfoController@destroy_info_list')->name('personel-info.destroy_info_list');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/counter', 'CounterController@create')->name('counter.create');
    Route::post('admin-panel/counter', 'CounterController@store')->name('counter.store');
    Route::get('admin/{id}/edit-counter', 'CounterController@edit')->name('counter.edit');
    Route::put('admin/counter/{id}', 'CounterController@update')->name('counter.update');
    Route::delete('admin/counter/{id}', 'CounterController@destroy')->name('counter.destroy');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::post('admin/skill', 'SkillController@store')->name('skill.store');
    Route::put('admin/skill/{id}', 'SkillController@update')->name('skill.update');

    Route::get('admin/skill-list', 'SkillListController@create')->name('skill-list.create');
    Route::post('admin/skill-list', 'SkillListController@store')->name('skill-list.store');
    Route::get('admin/{id}/edit-skill-list', 'SkillListController@edit')->name('skill-list.edit');
    Route::put('admin/skill-list/{id}', 'SkillListController@update')->name('skill-list.update');
    Route::delete('admin/skill-list/{id}', 'SkillListController@destroy')->name('skill-list.destroy');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::post('admin/education', 'EducationController@store')->name('education.store');
    Route::put('admin/education/{id}', 'EducationController@update')->name('education.update');

    Route::get('admin/education-list', 'EducationListController@create')->name('education-list.create');
    Route::post('admin/education-list', 'EducationListController@store')->name('education-list.store');
    Route::get('admin/{id}/edit-education-list', 'EducationListController@edit')->name('education-list.edit');
    Route::put('admin/education-list/{id}', 'EducationListController@update')->name('education-list.update');
    Route::delete('admin/education-list/{id}', 'EducationListController@destroy')->name('education-list.destroy');

    Route::get('admin/experience-list', 'ExperienceListController@create')->name('experience-list.create');
    Route::post('admin/experience-list', 'ExperienceListController@store')->name('experience-list.store');
    Route::get('admin/{id}/edit-experience-list', 'ExperienceListController@edit')->name('experience-list.edit');
    Route::put('admin/experience-list/{id}', 'ExperienceListController@update')->name('experience-list.update');
    Route::delete('admin/experience-list/{id}', 'ExperienceListController@destroy')->name('experience-list.destroy');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/portfolio', 'PortfolioController@create')->name('portfolio.create');
    Route::post('admin/portfolio', 'PortfolioController@store')->name('portfolio.store');
    Route::put('admin/portfolio/{id}', 'PortfolioController@update')->name('portfolio.update');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/project', 'ProjectController@create')->name('project.create');
    Route::post('admin/project', 'ProjectController@store')->name('project.store');
    Route::get('admin/{id}/edit-project', 'ProjectController@edit')->name('project.edit');
    Route::put('admin/project/{id}', 'ProjectController@update')->name('project.update');
    Route::delete('admin/project/{id}', 'ProjectController@destroy')->name('project.destroy');

    Route::get('admin/item/{id}', 'ProjectController@create_item')->name('project.create_item');
    Route::post('admin/item', 'ProjectController@store_item')->name('project.store_item');
    Route::get('admin/{project_id}/{id}/edit-item', 'ProjectController@edit_item')->name('project.edit_item');
    Route::put('admin/item/{id}', 'ProjectController@update_item')->name('project.update_item');
    Route::delete('admin/item/{id}', 'ProjectController@destroy_item')->name('project.destroy_item');

    Route::get('admin/image/{id}', 'ProjectController@create_image')->name('project.create_image');
    Route::post('admin/image', 'ProjectController@store_image')->name('project.store_image');
    Route::put('admin/image/{id}', 'ProjectController@update_image')->name('project.update_image');

    Route::get('admin/video/{id}', 'ProjectController@create_video')->name('project.create_video');
    Route::post('admin/video', 'ProjectController@store_video')->name('project.store_video');
    Route::put('admin/video/{id}', 'ProjectController@update_video')->name('project.update_video');

    Route::get('admin/slider/{id}', 'ProjectController@create_slider')->name('project.create_slider');
    Route::post('admin/slider', 'ProjectController@store_slider')->name('project.store_slider');
    Route::get('admin/{project_id}/{id}/edit-slider', 'ProjectController@edit_slider')->name('project.edit_slider');
    Route::put('admin/slider/{id}', 'ProjectController@update_slider')->name('project.update_slider');
    Route::delete('admin/slider/{id}', 'ProjectController@destroy_slider')->name('project.destroy_slider');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/contact', 'ContactController@create')->name('contact.create');
    Route::post('admin/contact', 'ContactController@store')->name('contact.store');
    Route::put('admin/contact/{id}', 'ContactController@update')->name('contact.update');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/social', 'SocialController@create')->name('social.create');
    Route::post('admin/social', 'SocialController@store')->name('social.store');
    Route::get('admin/{id}/edit-social', 'SocialController@edit')->name('social.edit');
    Route::put('admin/social/{id}', 'SocialController@update')->name('social.update');
    Route::patch('admin/social/update_status/{id}', 'SocialController@update_status')->name('social.update_status');
    Route::delete('admin/social/{id}', 'SocialController@destroy')->name('social.destroy');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/blog-info', 'BlogInfoController@create')->name('blog-info.create');
    Route::post('admin/blog-info', 'BlogInfoController@store')->name('blog-info.store');
    Route::put('admin/blog-info/{id}', 'BlogInfoController@update')->name('blog-info.update');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/blog', 'BlogController@index')->name('blog.index');
    Route::get('admin/{id}/edit-blog', 'BlogController@edit')->name('blog.edit');
    Route::post('admin/blog', 'BlogController@store')->name('blog.store');
    Route::get('admin/blog/add-blog', 'BlogController@create')->name('blog.create');
    Route::put('admin/blog/{id}', 'BlogController@update')->name('blog.update');
    Route::delete('admin/blog/{id}', 'BlogController@destroy')->name('blog.destroy');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/site-info', 'SiteInfoController@create')->name('site-info.create');
    Route::post('admin/site-info', 'SiteInfoController@store')->name('site-info.store');
    Route::put('admin/site-info/{id}', 'SiteInfoController@update')->name('site-info.update');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/homepage-version', 'HomepageVersionController@create')->name('homepage-version.create');
    Route::put('admin/homepage-version/{id}', 'HomepageVersionController@update')->name('homepage-version.update');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/google-analytic', 'GoogleAnalyticController@create')->name('google-analytic.create');
    Route::post('admin/google-analytic', 'GoogleAnalyticController@store')->name('google-analytic.store');
    Route::put('admin/google-analytic/{id}', 'GoogleAnalyticController@update')->name('google-analytic.update');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/seo', 'SeoController@create')->name('seo.create');
    Route::post('admin/seo', 'SeoController@store')->name('seo.store');
    Route::put('admin/seo/{id}', 'SeoController@update')->name('seo.update');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/section', 'SectionController@index')->name('section.index');
    Route::patch('admin/section/{id}', 'SectionController@update')->name('section.update');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/color', 'ColorController@create')->name('color.create');
    Route::post('admin/color', 'ColorController@store')->name('color.store');
    Route::put('admin/color/{id}', 'ColorController@update')->name('color.update');
    Route::delete('admin/color/{id}', 'ColorController@destroy')->name('color.destroy');
});

Route::namespace('Admin')->middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/message', 'MessageController@index')->name('message.index');
    Route::put('admin/message/{id}', 'MessageController@update')->name('message.update');
    Route::patch('admin/message/mark_all', 'MessageController@mark_all_read_update')->name('message.mark_all_read_update');
    Route::delete('admin/message/{id}', 'MessageController@destroy')->name('message.destroy');
});

Route::middleware(['auth', 'XSS'])->group(function () {
    Route::get('admin/clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->route('home')
            ->with('success','content.application_cache_cleared');
    });
});
// End Admin Panel