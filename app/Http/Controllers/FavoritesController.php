<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store(Request $request) { //favorite
        // 認証済みユーザ（閲覧者）が、idのmicropostをfavoriteする
        $micropost_id = $request->micropost_id;
        \Auth::user()->favorite($micropost_id);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy(Request $request) { //unfavorite
        // 認証済みユーザ（閲覧者）が、idのmicropostをunfavoriteする
        $micropost_id = $request->micropost_id;
        \Auth::user()->unfavorite($micropost_id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
