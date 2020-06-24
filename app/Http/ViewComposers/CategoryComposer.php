<?php
// カテゴリー情報取得用コンポーザー

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\Contracts\View\View;

class CategoryComposer{

    public function __construct( Category $category )
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $view->with('categoryList', $this->category->getCategoryList() );
    }
}

