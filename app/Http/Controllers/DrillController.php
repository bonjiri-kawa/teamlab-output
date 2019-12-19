<?php

namespace App\Http\Controllers;

use App\Drill;
use App\Http\Requests\DrillList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //drillsから問題を表示
        $drills = Auth::user()->drills()->paginate(6);
        return view('drills.index', compact('drills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //new.blade.phpを表示
        return view('drills.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DrillList $request)
    {
        //フォームリクエストでバリデーション
        $request->Validated();

        $drill = new Drill;

        //drillをDBに保存
        Auth::user()->drills()->save($drill->fill($request->all()));

        return redirect('/drills')->with('flash_message', __('Registered.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!ctype_digit($id)){
            return redirect('/drills/create')->with('flash_message', __('Invalid operation was performed'));
        }
        //練習画面表示
        $drill = Drill::find($id);
        return view('drills.show', compact('drill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!ctype_digit($id)){
            return redirect('/drills/create')->with('flash_message', __('Invalid operation was performed'));
        }

        //編集画面表示
        $drill = Auth::user()->drills()->find($id);
        return view('drills.edit', compact('drill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DrillList $request, $id)
    {
        if(!ctype_digit($id)) {
            return redirect('/drills/create')->with('flash_message', __('Invalid operation was performed'));
        }

        //フォームリクエストでバリデーション
        $request->Validated();

        $drill = Drill::find($id);
        //編集内容登録
        $drill->fill($request->all())->save();

        return redirect('/drills')->with('flash_message', __('Registered.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!ctype_digit($id)) {
            return redirect('/drills/create')->with('flash_message', __('Invalid operation was performed'));
        }

        //削除
        Auth::user()->drills()->find($id)->delete();
        return redirect('/drills')->with('flash_message', __('Deleted.'));
    }
}
