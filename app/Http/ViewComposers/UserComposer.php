<?php
// ユーザー情報取得用コンポーザー

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;

use Illuminate\Contracts\Auth\Guard;

class UserComposer {

    protected $auth;

    public function __construct( Guard $auth )
    {
        $this->auth = $auth;
    }

    public function compose(View $view)
    {
        $view->with('userAuth', $this->auth->user() );
    }
}
