<?php

namespace App\Http\Controllers;

use App\Diary;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDiary; // 追加
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    // 追加
    public function index()
    {
        //モデルに格納されたdiariesテーブルのデータベース
        // $diaries = Diary::all();
        $diaries = Diary::orderBy('id', 'desc')->get();

        // dd($diaries);

        return view('diaries.index', ['diaries' => $diaries]);
    }

    public function create()
    {
        // views/diaries/create.blade.phpを表示する
        return view('diaries.create');
    }

    public function store(CreateDiary $request)
    {
        $diary = new Diary();
        // dd('ここに保存処理');

        $diary->title = $request->title;
        $diary->body = $request->body;
        $diary->user_id = Auth::user()->id; //追加 ログインしてるユーザーのidを保存
        $diary->save();

        return redirect()->route('diary.index');
    }

    public function destroy(int $id)
    {
        //Diaryモデルを使用して、diariesテーブルから$idと一致するidをもつデータを取得
        $diary = Diary::find($id);

        //取得したデータを削除
        $diary->delete();

        return redirect()->route('diary.index');
    }

    public function edit(int $id)
    {
        // ddコマンドとは？
        // var_dump()
        // die()
        $diary = Diary::find($id);

        return view('diaries.edit', [
            'diary' => $diary,
        ]);
    }

    // id, バリデーション
    public function update(int $id, CreateDiary $request)
    {
        $diary = Diary::find($id);

        $diary->title = $request->title; //画面で入力されたタイトルを代入
        $diary->body = $request->body; //画面で入力された本文を代入
        $diary->save(); //DBに保存

        return redirect()->route('diary.index'); //一覧ページにリダイレクト
    }

}
