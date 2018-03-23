<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Laracasts\Flash\Flash;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $tags = Tag::search($request->name)->orderBy('id', 'ASC')->paginate(5);
        return view('admin.tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'name'      => 'max:120|required|unique:tags'
        ]);

        $tag = new Tag($request->all());
        $tag->save();

        flash("Se ha creado la etiqueta " . $tag->name . " de manera satisfactoria.")->success();
        
        return redirect()->route('tags.index');
    }

    /**
     * Show the form for editing the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tag = Tag::find($id);
        return view('admin.tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $tag = Tag::find($id);
        $tag->fill($request->all());
        $tag->save();

        flash("La etiqueta " . $tag->name . " se ha editado de manera satisfactoria.")->warning();

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $tag = Tag::find($id);
        $tag->delete();

        flash("La etiqueta " . $tag->name . " se ha eliminado de manera satisfactoria.")->warning();

        return redirect()->route('tags.index');
    }
}
