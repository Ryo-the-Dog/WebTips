<?php

namespace App\Providers;

use App\Category;
use App\Http\ViewComposers\CategoryComposer;
use App\Http\ViewComposers\UserComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // ユーザー情報取得用コンポーザー
        View::composers([
            UserComposer::class    => '*.*'
        ]);
        // カテゴリー情報取得用コンポーザー
        View::composers([
            CategoryComposer::class    => '*.*'
        ]);

    }
}
