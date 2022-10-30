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
}
