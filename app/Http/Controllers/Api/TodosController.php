<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todos;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function create(Request $request)
    {
        $todo = new Todos();
        $todo->user_id = $request->user_id;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->unique_id = "121212121212";
        $todo->y_position = $request->y_position;
        $todo->x_position = $request->x_position;
        $todo->save();
        return response()->json(['success' => true]);
    }

    public function todos(Request $request)
    {
        $todos = Todos::where('user_id',$request->id)->get();
        return response()->json(['data' => $todos]);
    }

    public function update(Request $request)
    {
        $todo = Todos::where('id', $request->id)->first();
        $todo->x_position = $request->x_position;
        $todo->y_position = $request->y_position;
        $todo->save();
        return response()->json(['success' => true]);
    }

    public function deleteTodo(Request $request)
    {
        $todo = Todos::where('id', $request->id)->first();
        $todo->delete();
        return response()->json(['success' => true]);
    }

    public function updateTodoContent(Request $request)
    {
        $todo = Todos::where('id', $request->id)->first();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();
        return response()->json(['success' => true]);
    }

    public function complete(Request $request)
    {
        $todo = Todos::where('id', $request->id)->first();
        if($todo->completed === 0) {
            $todo->completed = 1;
        } else {
            $todo->completed = 0;
        }
        $todo->save();
        return response()->json(['success' => true]);
    }
}
