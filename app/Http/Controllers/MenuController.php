<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Page;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::All();
      
        return view('menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    
    /**
     * The function validates the request, then creates a new menu item
     * 
     * @param Request request The request object.
     * 
     * @return The created menu
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
      
        Menu::create($request->all());
        activity()
                ->event('create')
                ->log('Menü létrehozása');
        return redirect()->route('menu.index')
                        ->with('success','Menü létrehozva');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    /**
     * The function takes a menu object as a parameter and returns a view with the menu and pages
     * objects
     * 
     * @param Menu menu This is the menu object that we're editing.
     * 
     * @return A view called menu.edit with the menu and pages variables.
     */
    public function edit(Menu $menu)
    {
        $pages = Page::where('menu_id','=',$menu->id)->get();
        
        return view('menu.edit',compact('menu','pages'));
    }

    
    /**
     * The function takes a request and a menu object as parameters, validates the request, updates the
     * menu object with the request data, and redirects to the menu index page with a success message
     * 
     * @param Request request The request object.
     * @param Menu menu The model instance passed to the controller method.
     * 
     * @return The updated menu
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
      
        $menu->update($request->all());
        activity()
                ->event('update')
                ->withProperties(['id' => $menu->id])
                ->log('Menü szerkesztése');
        return redirect()->route('menu.index')
                        ->with('success','Menü sikeresen frissítve');
    }

    
    /**
     * The function takes a Menu object as a parameter, calls the delete() method on it, and then
     * redirects the user to the index page with a success message
     * 
     * @param Menu menu The route parameter name.
     * 
     * @return A redirect to the menu.index page with a success message.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        activity()
                ->event('delete')
                ->withProperties(['id' => $menu->id])
                ->log('Menü törlése');
        return redirect()->route('menu.index')
                        ->with('success','A menü sikeresen törölve');
    }
}
