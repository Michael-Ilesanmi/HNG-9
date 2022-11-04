<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;
use Symfony\Component\HttpFoundation\JsonResponse;

class TasksController extends Controller
{
    //
    public function taskOne(): JsonResponse
    {
        $data = new stdClass;
        $data->slackUsername = '__localdev';
        $data->backend = true;
        $data->age = 24;
        $data->bio = 'My name is Michael, and I am a backend developer';
        return response()->json($data);
    }

    public function taskTwo(Request $request): JsonResponse
    {
        $this->validate($request, [
            "operation_type"=>'required|in:addition,subtraction,multiplication',
            "x"=>'integer|required',
            "y"=>'integer|required',
        ]);

        $_x = $request->x;
        $_y = $request->y;

        switch ($request->operation_type) {
            case 'addition':
                $result = (int) $_x + $_y;
                break;
            case 'subtraction':
                $result = (int) $_x - $_y;
                break;
            
            case 'multiplication':
                $result = (int) $_x * $_y;
                break;
            default:
                $result = null;
                break;
        }

        $data = new stdClass;
        $data->slackUsername = '__localdev';
        $data->result = $result;
        $data->operation_type = $request->operation_type;
        return response()->json($data);
    }
}
