<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    
    /**
     * It takes the id of a user, finds the user in the database, gets all the roles and permissions
     * from the database, and then returns a view with the user, all the roles, and all the permissions
     * 
     * @param id The id of the user you want to edit.
     */
    public function editUser($id)
    {   
        $user = User::find($id);
        $all_roles_in_database = Role::All();
        $all_permission_in_database = Permission::All();
        return view('admin.edit-user', compact('user','all_roles_in_database','all_permission_in_database'));
    }

    public function logs(){
        $logs = Activity::All();
        return view('admin.logs',compact('logs'));
    }

    public function fileManager(){
        return view('admin.file-manager');
    }
}
