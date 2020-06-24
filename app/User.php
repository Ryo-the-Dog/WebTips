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

    // Stepモデルとのリレーション
    public function steps() {
        return $this->hasMany('App\Step');
    }
    // Challengeモデルとのリレーション
    public function challenges() {
        return $this->belongsToMany(
            'App\Step', 'challenges', 'user_id', 'step_id'
        )->withTimestamps();
    }
    // Clearモデルとのリレーション
    public function clears() {
        return $this->belongsToMany(
            'App\ChildStep', 'clears', 'user_id', 'child_step_id'
        )->withTimestamps();
    }
    // AllClearモデルとのリレーション
    public function allClears() {
        return $this->belongsToMany(
            'App\Step', 'allClears', 'user_id', 'step_id'
        )->withTimestamps();
    }
}
