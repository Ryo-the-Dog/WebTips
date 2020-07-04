<?php

namespace App;

use App\Notifications\CustomPasswordReset;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_img', 'introduce',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * パスワードリセット通知の送信
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomPasswordReset($token));
    }

    // Articleモデルとのリレーション
    public function articles() {
        return $this->hasMany('App\Article');
    }
    // Learnモデルとのリレーション
    public function learns() {
        return $this->belongsToMany(
            'App\Article', 'learns', 'user_id', 'article_id'
        )->withTimestamps();
    }
    // Clearモデルとのリレーション
    public function clears() {
        return $this->belongsToMany(
            'App\Article', 'clears', 'user_id', 'article_id'
        )->withTimestamps();
    }
    // AllClearモデルとのリレーション
//    public function allClears() {
//        return $this->belongsToMany(
//            'App\Article', 'allClears', 'user_id', 'step_id'
//        )->withTimestamps();
//    }
}
