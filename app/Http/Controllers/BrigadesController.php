<?php

namespace App\Http\Controllers;

use App\Models\Brigade;
use Illuminate\Http\Request;

class BrigadesController extends Controller
{
    public function listBrigade()
    {
        $brigades = Brigade::all();
        return response()->json($brigades, 200);
    }
    public function addBrigade(Request $request)
    {
        $brigade = Brigade::create([
            'board_number' => $request->board_number,
            'first_user' => $request->first_user,
            'second_user' => $request->second_user,
            'third_user' => $request->third_user,
            'brigade_tablet_phone_number' => $request->brigade_tablet_phone_number,
        ]);

        if ($brigade) {
            return response()->json(['message' => 'Бригада добавлена успешно'], 200);
        } else {
            return response()->json(['message' => 'Произошла ошибка'], 500);
        }
    }

    public function updateBrigade($id)
    {
        $updated = Brigade::where('id', $id)->update([
            'board_number' => \request()->board_number,
            'first_user' => \request()->first_user,
            'second_user' => \request()->second_user,
            'third_user' => \request()->third_user,
            'brigade_tablet_phone_number' => \request()->brigade_tablet_phone_number,
        ]);

        if ($updated) {
            return response()->json(['message' => 'Бригада обновлена успешно'], 200);
        } else {
            return response()->json(['message' => 'Произошла ошибка'], 500);
        }
    }

    public function deleteBrigade($id)
    {
        $brigade = Brigade::find($id);
        if (!$brigade) {
            return response()->json(['message' => 'Бригада не найдена'], 404);
        }

        $brigade->delete();

        return response()->json(['message' => 'Бригада удалена успешно'], 200);
    }

    public function callBrigade($id)
    {
        $brigade = Brigade::find($id);
        return response()->json($brigade->brigade_tablet_phone_number, 200);
    }
}
