<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Junges\ACL\Models\Group;

class PermissionController extends Controller
{

    public function getGroup()
    {
        $groups = Group::all();
        return response()->json($groups, 200);
    }

    public function getPermission()
    {
        $permissions = Permission::all();
        return response()->json($permissions, 200);
    }
    public function getPermissionById($id)
    {
        $permissions = Permission::find($id);
        if (is_null($permissions)) {
            return response()->json(['message' => 'Permission not found'], 404);
        }
        return response()->json(Permission::find($id), 200);
    }
    public function addPermission(Request $request)
    {
        $permissions = Permission::create($request->all());
        return response()->json($permissions, 201);
    }
    public function updatePermission(Request $request, $id)
    {
        $permissions = Permission::find($id);
        if (is_null($permissions)) {
            return response()->json(['message' => 'Permission not found'], 404);
        }
        $permissions->update($request->all());
        return response()->json($permissions, 200);
    }

    public function deletePermission(Request $request, $id)
    {
        $permissions = Permission::find($id);
        if (is_null($permissions)) {
            return response()->json(['message' => 'Permission not found'], 404);
        }
        $permissions->delete();
        return response()->json($permissions, 204);
    }
}
