<?php

use JD\Cloudder\Facades\Cloudder;

// ========================================
// コントローラー内で使用する定数
// ========================================
// 1ページ当たりの表示件数
const NUM_PER_PAGE = 6;
// STEPの表示順を決める基準
const SORT_BY = 'updated_at';
// STEPの表示順
const SORT_ORDER = 'desc';

// ========================================
// コントローラー内で使用する関数
// ========================================

// STEPに関する関数
// ========================================
// STEPを並び替えて取得する関数
function getOrderedSteps($steps) {

    return $steps->orderBy(SORT_BY, SORT_ORDER)->get();
}

// STEPをページネーション処理して取得する関数
function getPaginatedSteps($steps) {

    return $steps->orderBy(SORT_BY, SORT_ORDER)->paginate(NUM_PER_PAGE);
}

// 配列のidを取得する関数
function getIds($items) {

    $ids = [];

    foreach ($items as $item){
        $ids[] = $item->id;
    }

    return $ids;
}

// Cloudinaryに画像をアップロードする関数
function uploadImg($imgFile) {
    // 画像パスを格納
    $imgName = $imgFile->getRealPath();

    // Cloudinaryへアップロード
    Cloudder::upload($imgName, null);

    list($width, $height) = getimagesize($imgName);

    // 直前にアップロードした画像のユニークIDを取得
    $publicId = Cloudder::getPublicId();

    // URLを生成
    $logoUrl = Cloudder::show($publicId, [
        'width'     => $width,
        'height'    => $height
    ]);

    return $logoUrl;
}
