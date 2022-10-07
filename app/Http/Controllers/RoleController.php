<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function getRole()
    {
        $roles = Role::all();
        return response()->json($roles, 200);
    }
    public function getRoleById($id)
    {
        $roles = Role::find($id);
        if (is_null($roles)) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        return response()->json(Role::find($id), 200);
    }
    public function addRole(Request $request)
    {
        $roles = Role::create($request->all());
        return response()->json($roles, 201);
    }
    public function updateRole(Request $request, $id)
    {
        $roles = Role::find($id);
        if (is_null($roles)) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        $roles->update($request->all());
        return response()->json($roles, 200);
    }

    public function deleteRole(Request $request, $id)
    {
        $roles = Role::find($id);
        if (is_null($roles)) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        $roles->delete();
        return response()->json($roles, 204);
    }


    public function showUserRolebyId($id)
    {

        $users = User::where('role_id', "=", $id)->get();

        return response()->json(

            $users,
            200
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
