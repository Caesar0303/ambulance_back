<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUsers(Request $request)
    {
        $users = User::with('brigade')->get();
        return response()->json($users, 200);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Бригада не найдена'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Бригада удалена успешно'], 200);
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
