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
        //$drills = Drill::all();
//        $drills = Drill::paginate(6);
//        return view('drills.index', compact('drills'));
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
//        $request->validate([
//            'title' => 'required|string|max:255|',
//            'category_name' => 'required|string|max:255',
//            'problem0' => 'required|string|max:255',
//            'problem1' => 'string|nullable|max:255',
//            'problem2' => 'string|nullable|max:255',
//            'problem3' => 'string|nullable|max:255',
//            'problem4' => 'string|nullable|max:255',
//            'problem5' => 'string|nullable|max:255',
//            'problem6' => 'string|nullable|max:255',
//            'problem7' => 'string|nullable|max:255',
//            'problem8' => 'string|nullable|max:255',
//            'problem9' => 'string|nullable|max:255',
//        ]);
        $request->Validated();

        $drill = new Drill;
        //$drill->fill($request->all())->save();
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

        //$drill = Drill::find($id);
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
    public function update(Request $request, $id)
    {
        if(!ctype_digit($id)) {
            return redirect('/drills/create')->with('flash_message', __('Invalid operation was performed'));
        }

        $request->validate([
            'title' => 'required|string|max:255|',
            'category_name' => 'required|string|max:255',
            'problem0' => 'required|string|max:255',
            'problem1' => 'string|nullable|max:255',
            'problem2' => 'string|nullable|max:255',
            'problem3' => 'string|nullable|max:255',
            'problem4' => 'string|nullable|max:255',
            'problem5' => 'string|nullable|max:255',
            'problem6' => 'string|nullable|max:255',
            'problem7' => 'string|nullable|max:255',
            'problem8' => 'string|nullable|max:255',
            'problem9' => 'string|nullable|max:255',
        ]);

        $drill = Drill::find($id);
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

        //Drill::find($id)->delete();
        Auth::user()->drills()->find($id)->delete();
        return redirect('/drills')->with('flash_message', __('Deleted.'));
    }
}
