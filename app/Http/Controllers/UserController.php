<?php

namespace App\Http\Controllers;

use App\Models\Brigade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function editUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function updateUser($id)
    {
        $updated = User::where('id', $id)->update([
            'first_name' => \request()->first_name,
            'last_name' => \request()->last_name,
            'iin' => \request()->iin,
            'post' => \request()->post,
            'phone_number' => \request()->phone_number,
            'password' => \request()->password,
        ]);

        if ($updated) {
            return response()->json(['message' => 'Бригада обновлена успешно'], 200);
        } else {
            return response()->json(['message' => 'Произошла ошибка'], 500);
        }
    }
    public function myBrigade($id)
    {
        $mybrigade = Brigade::with(['driver', 'feldsher', 'doctor'])->find($id);
        return response()->json(['myBridage' => $mybrigade]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('iin', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json(['success' => true, 'user' => $user]);
        }

        return response()->json(['success' => false]);
    }
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
