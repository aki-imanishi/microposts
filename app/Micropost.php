<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content'];

    /**
     * この投稿を所有するユーザ。（Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     /**
     * このユーザにfavoriteされたmicropost。（Userモデルとの関係を定義）
     */
     public function favorite_users(){
        return $this->belongsToMany(User::class, 'favorites', 'micropost_id', 'user_id');
        //(関係先のModelのクラス, 中間テーブル, 中間テーブルに保存されてるmicropostのカラム名, 中間テーブルに保存されてる関係先のカラム名)
        //micropost_idのpostはuser_idのユーザにfavoriteされている
    } 
}
