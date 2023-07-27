<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionExport;
use App\Http\Controllers\Controller;
use App\Imports\PermissionImport;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use DB;

class RoleController extends Controller
{
    public function AllPermissions()
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permissions', compact('permissions'));
    }

    public function AddPermission()
    {
        return view('backend.pages.permission.add_permission');
    }

    public function StorePermission(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'group_name' => 'required'
        ]);

        Permission::create($request->all());

        $notification = array(
            'message' => 'Permission created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permissions')->with($notification);
    }

    public function EditPermission($id = null)
    {
        $permission = Permission::findOrFail($id);

        return view('backend.pages.permission.edit_permission', compact('permission'));
    }

    public function UpdatePermission(Request $request)
    {
        Permission::findOrFail($request->id)->update($request->all());

        $notification = array(
            'message' => 'Permission updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permissions')->with($notification);
    }

    public function DeletePermission($id = null)
    {
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ImportPermission()
    {
        return view('backend.pages.permission.import_permission');
    }

    public function Export()
    {
        return Excel::download(new PermissionExport, 'permissions.xlsx');
    }

    public function Import(Request $request)
    {
        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission imported successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AllRoles()
    {
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    }

    public function AddRole()
    {
        return view('backend.pages.roles.add_role');
    }

    public function StoreRole(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Role::create($request->all());

        $notification = array(
            'message' => 'Role created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function EditRole($id = null)
    {
        $role = Role::findOrFail($id);
        return view('backend.pages.roles.edit_role', compact('role'));
    }

    public function UpdateRole(Request $request)
    {
        Role::findOrFail($request->id)->update($request->all());

        $notification = array(
            'message' => 'Role updated successfulle',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteROle($id = null)
    {
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AddRolesPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('backend.pages.rolesetup.add_role_permission', compact('roles', 'permissions', 'permission_groups'));
    }

    public function RolePermissionStore(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => 'Role Permission added successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
