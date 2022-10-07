<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostCategory;
use App\Models\Post;

class PostCategoryController extends Controller
{
    

    /**
     * It returns a view called `list` in the `posts/category` folder, and passes the variable
     * `` to the view
     */
    public function index()
    {
        $categories = PostCategory::All();
      
        return view('posts.category.list',compact('categories'));
    }


    /**
     * It returns a view called `create` which is located in the `posts/category` folder
     * 
     * @return A view called create.blade.php in the posts/category folder.
     */
    public function create()
    {
        return view('posts.category.create');
    }

   /**
    * The function validates the request, creates a new PostCategory object, and redirects the user to
    * the category page with a success message
    * 
    * @param Request request The request object.
    * 
    * @return The redirect() helper function generates a redirect HTTP response to the given path.
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
      
        PostCategory::create($request->all());
        activity()
            ->event('create')
            ->log('Kategória létrehozása');
        return redirect('/category')->with('success','Új kategória felvéve');
    }

    /**
     * It gets all the posts that have a category_id that matches the category_id passed to the
     * function and that have a status of 1
     * 
     * @param category_id This is the id of the category that we want to show.
     */
    public function show($category_id)
    {
        $posts = Post::where('category_id', '=', $category_id)
                        ->where('status',1)
                        ->get();
        if($posts->isNotEmpty()){
            return view('posts.category.show')->with('posts', $posts); 
        }else{
            abort(404);
        }
           
    }

    /**
     * It returns a view called `posts.category.edit` and passes the `` variable to the view
     * 
     * @param PostCategory category The PostCategory model instance that is being edited.
     * 
     * @return A view called posts.category.edit with the variable 
     */
    public function edit(PostCategory $category)
    {
        return view('posts.category.edit',compact('category'));
    }

    /**
     * The function takes a request and a category as parameters, validates the request, updates the
     * category and redirects back with a success message
     * 
     * @param Request request The request object.
     * @param PostCategory category The PostCategory model instance.
     * 
     * @return The category is being updated with the new data.
     */
    public function update(Request $request, PostCategory $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
      
        $category->update($request->all());
        activity()
                ->event('update')
                ->withProperties(['id' => $category->id])
                ->log('Kategória szerkesztése');
        return redirect()->back()->with('success','Kategória sikeresen módosítva');
    }

    /**
     * The function takes a PostCategory object as a parameter, calls the delete() method on it, and
     * then redirects the user to the /category route with a success message
     * 
     * @param PostCategory category The PostCategory model instance that will be deleted.
     * 
     * @return A redirect to the category page with a success message.
     */
    public function destroy(PostCategory $category)
    {
        activity()
                ->event('delete')
                ->withProperties(['id' => $category->id])
                ->log('Kategória törlése');
        $category->delete();
       
        return redirect('/category')->with('success','Kategória sikeresen törölve');
    }
}
