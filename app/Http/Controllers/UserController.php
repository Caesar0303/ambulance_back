<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUsers(Request $request)
    {
        $users = User::all();
        return response()->json($users, 200);
    }
    public function addUser(Request $request)
    {
        $brigade = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'iin' => $request->iin,
            'post' => $request->post,
        ]);

        if ($brigade) {
            return response()->json(['message' => 'Пользователь добавлен успешно'], 200);
        } else {
            return response()->json(['message' => 'Произошла ошибка'], 500);
        }
    }
}
