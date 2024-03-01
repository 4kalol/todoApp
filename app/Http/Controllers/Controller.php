<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Todo;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function add(Request $request)
    {
        $data = [
            'todos' => $request->input('todos'),
            'completed' => $request->input('completed'),
        ];

        $todo = new Todo();
        $todo->todos = $data['todos'];
        $todo->completed = $data['completed'];
        $todo->save();
    }
}
