<?php


    namespace App\Http\Controllers;

    use App\Drill;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;


public function mypage()
{
    $drills = Auth::user()->drills()->get();
    return view('drills.mypage', compact('drills'));
}
