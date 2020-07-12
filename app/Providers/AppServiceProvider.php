<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 商用環境以外だった場合、SQLログを出力させます
        if (config('app.env') !== 'production') {
            \DB::listen(function ($query) {
                \Log::info("Query Time:{$query->time}s] $query->sql");
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Herokuアップロード用にvarcharを制限する
        Schema::defaultStringLength(191);

        // Herokuでhttpsを強制する
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }

        Blade::directive('markdown', function ($expression) {

            $markdown = view(
                str_replace('\'', '', $expression)
            )->render();

            $Parsedown = new \Parsedown();
            return $Parsedown->text($markdown);

        });
    }
}
