<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class LevelController extends Controller
{
    /**
     * LevelController constructor.
     */
    public function __construct()
    {
        //$this->middleware('permission:manage.levels', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::with('author')->get();
        return response()->success(compact('levels'));
    }

    public function LevelPoints(){
      $mapee = Level::with(['points','author','points.icon','points.icon.image'])->get();
      return response()->success(compact('mapee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Level::rules());
        $obj = new Level();
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->level_start = $request->level_start;
        $obj->level_end = $request->level_end;
        $obj->type = $request->type;
        $obj->user_id = Auth::user()->id;
        $obj->save();
        return response()->success(compact('obj'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Level::with('author')->find($id);
        $obj->audit = $this->logs($obj->logs);
        unset($obj->logs);
        return response()->success($obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $obj = Level::find($id);
        $this->validate($request,Level::rules());
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->description = $request->description;
        $obj->level_start = $request->level_start;
        $obj->level_end = $request->level_end;
        $obj->user_id = $request->user_id;
        $obj->save();
        $obj = Level::with('author')->find($id);
        $obj->audit = $this->logs($obj->logs);
        unset($obj->logs);
        return response()->success($obj);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Level::destroy($id);

        return response()->success('success');
    }
}
