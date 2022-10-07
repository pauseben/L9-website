<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Menu;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::All();
      
        return view('pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $menus =  Menu::where('status', '=', 1)->get();
       $pages =  Page::All();
        return view('pages.create',compact('menus','pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:pages',
            'content' => 'required',
            'author' => 'required',
            'status' => 'required',
            'parent_id' => 'required',
        ]);
      
        Page::create($request->all());
        activity()->log('Oldal létrehozása');
        return redirect()->route('pages.index')
                        ->with('success','Oldal létrehozva');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //$page = Page::whereSlug("/pages/" . $slug)->first();
        $page = Page::where('slug', '=', $slug)->get();
        if($page->isNotEmpty()){
            return view('pages.show')->with('page', $page);
        }else{
            abort(404);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $menus =  Menu::where('status', '=', 1)->get();
        $pages =  Page::where('id', '!=', $page->id)->get();
        return view('pages.edit',compact('page','menus','pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'modifier' => 'required',
            'status' => 'required',
            'menu_id' => 'required',
            'parent_id' => 'required'
            
        ]);
      
        $page->update($request->all());
        activity()
            ->event('update')
            ->withProperties(['id' => $page->id])
            ->log('Oldal szerkesztése ');
        return redirect()->back()->with('success','Oldal sikeresen frissítve');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        activity()
            ->event('delete')
            ->withProperties(['id' => $page->id])
            ->log('Oldal törlése');
        $page->delete();
        
        return redirect()->route('pages.index')
                        ->with('success','Az oldal sikeresen törölve');
    }

}
