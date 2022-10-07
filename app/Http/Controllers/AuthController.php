<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Junges\ACL\Models\Group;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::where('email', $request['email'])->first();

        if ($user) {
            $response['status'] = 0;
            $response['message'] = 'Email Exists';
            $response['code'] = 409;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        $response['status'] = 1;
        $response['message'] = 'Sucess';
        $response['code'] = 200;
        return response()->json($response);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'invalid email or password',

            ], Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24);
        return response([
            'message' => $token,
        ])->withCookie($cookie);
    }

    public function user()
    {
        return Auth::user();
    }
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users, 200);
    }
    public function getUserById($id)
    {
        $users = User::find($id);
        if (is_null($users)) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(User::find($id), 200);
    }
    public function updateUser(Request $request, $id)
    {
        $users = User::find($id);
        if (is_null($users)) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);
        return response()->json($users, 200);
    }

    public function deleteUser($id)
    {
        $users = User::find($id);
        if (is_null($users)) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $users->delete();
        return response()->json($users, 204);
    }

    public function allusers()
    {
        $users = User::withTrashed()->get();
        return response()->json($users, 200);
    }

    public function getIdUs($id)
    {
        $users = User::find($id);
        if (is_null($users)) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(User::find($id), 200);
    }

    public function suppUser($id)

    {

        $users = User::findOrFail($id);

        $users->delete();

        return response()->json(['deleted_at' => $users->deleted_at], 200);
    }
    public function restore($id)

    {

        $users = User::onlyTrashed()->find($id);

        $users->restore();

        return response()->json($users, 200);
    }



    public function onlyTrashed()

    {

        /**
         * Here we call onlyTrashed as an extra.
         */

        $users = User::onlyTrashed()->get();

        return response()->json($users, 200);
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');
        return response([
            'message' => 'successfully logged out',

        ])->withCookie($cookie);
    }

    public function allGroups()
    {
        $groups = Group::all();
        return response()->json($groups, 200);
    }

    public function getGroupbyId($id)
    {
        $groups = Group::find($id);
        return response()->json($groups, 200);
    }

    public function fileImported(Request $request)
    {
        $imports =  Excel::import(new UsersImport, $request->file);
        return response()->json($imports, 202);
    }
}
