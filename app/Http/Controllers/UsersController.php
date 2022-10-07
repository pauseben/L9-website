<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Felhasználók listázása.
     *
     */
    public function list()
    {   
        $users = User::all();
        return view('users.list', compact('users'));
    }


    /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('auth.register');
    }

    /**
     * Store a newly created user
     * 
     * @param User $user
     * @param StoreUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request) 
    {
        
    }

    /**
     * Show user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) 
    {
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * It takes the user id as a parameter, finds the user in the database, and then passes the user,
     * all the roles in the database, and all the permissions in the database to the view.
     * 
     * @param User user The user object that we're editing.
     */
    
    public function edit(User $user)
    {   
        /*$user = Auth::user();
        return view('users.profile', compact('user'));*/
        return view('users.profile', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    public function editUser($id)
    {   
        $user = User::find($id);
        $all_roles_in_database = Role::All();
        $all_permission_in_database = Permission::All();
        return view('admin.edit-user', compact('user','all_roles_in_database','all_permission_in_database'));
    }


    /**
     * If the current password field is empty, then validate the form without the current password
     * field, otherwise validate the form with the current password field
     * 
     * @param User user The user model instance that we are updating.
     * @param UpdateUserRequest request The request object.
     */
    
    public function update(User $user, UpdateUserRequest $request)
    { 
       // if(Auth::user()->email == request('email')) {
        if( empty(request('current_password')) ) {
        
        $this->validate(request(), [
                'name' => 'required',
                'email'    => 'required|between:6,125|email',
            ],[
                'name.required' => 'Név mező kötelező!',
                'email.required' => 'E-mail mező kötelező',
                'email.email' => 'Nem megfelelő e-mail formátum'
            ]);

            $user->name = request('name');
            $user->email = request('email');
            //$user->password = bcrypt(request('password'));
            $user->syncRoles($request->get('role'));
            $user->save();
            activity()
                    ->event('update')
                    ->withProperties(['id' => $user->id])
                    ->log('Felhasználó adat frissítés');
            return back()->with('success', 'Sikeres adat frissítés');

            
        }
        else{
            if(!Hash::check(request('current_password'), auth()->user()->password)){
                return back()->with("error", "Nem megfelelő jelenlegi jelszó");
            }else{
            $this->validate(request(), [
                'name' => 'required',
                'email'    => 'required|between:6,125|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required|same:password',
            ], [
                'name.required' => 'Név mező kötelező!',
                'password.required' => 'Jelszó mező kötelező!',
                //'password.current_password' => 'current_password field is required.',
                'password_confirmation.same' => 'Jelszavak nem egyeznek.',
                'email.required' => 'E-mail mező kötelező',
                'email.email' => 'Nem megfelelő e-mail formátum'
            ]);

            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();

            $user->syncRoles($request->get('role'));
            activity()
                    ->event('update')
                    ->withProperties(['id' => $user->id])
                    ->log('Felhasználó adat és jelszó frissítés');
            return back()->with('success', 'Sikeres adat és jelszó frissítés');  
            }
            
        }
    }

     /**
     * Delete user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) 
    {
        activity()
                    ->event('delete')
                    ->withProperties(['id' => $user->id])
                    ->log('Felhasználó törlése');
        $user->delete();
        
        return redirect()->route('users.list')
            ->withSuccess(__('Felhasználó sikeresn törölve'));
    }


    /**
     * Felhasználó átjelentkeztetése.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function impersonate($id)
    {
        $realUserId = auth()->user()->id; 
        Auth::user()->impersonate(User::find($id));    
       // activity()->log('Átjelentkezés ('.$realUserId.')->('.$id.')');
        activity()
                ->event('impersonate')
                ->causedBy($realUserId)
                ->withProperties(['id' => $id])
                ->log('Átjelentkezés');
        return redirect('/home')->with('success', 'Sikeres átjelentkezés');
    }

    /**
     * Felhasználó visszajelentkeztetése.
     *
     * @return \Illuminate\Http\Response
     */
    public function leaveImpersonate()
    {
        $id = Auth::id();
       auth()->user()->leaveImpersonation();
       //activity()->log('Visszajelezntkezés ('.$id.')');
       activity()
                ->event('leaveImpersonation')
                ->withProperties(['id' => $id])
                ->log('Visszajelentkezés');
        return redirect('/admin')->with('success', 'Sikeres visszajelentkezés');
    }
}
