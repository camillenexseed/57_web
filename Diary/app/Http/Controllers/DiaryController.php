<?php

namespace App\Http\Controllers;

use App\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    // 追加
    public function index()
    {
        //モデルに格納されたdiariesテーブルのデータベース
        $diaries = Diary::all();

        // dd($diaries);

        return view('diaries.index', ['diaries' => $diaries]);
    }
}
