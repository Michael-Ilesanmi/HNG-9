<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use stdClass;
use Symfony\Component\HttpFoundation\JsonResponse;

class TasksController extends Controller
{
    //
    protected $slackUsername = "__localdev";

    public function taskOne(): JsonResponse
    {
        $data = new stdClass;
        $data->slackUsername = $this->slackUsername;
        $data->backend = true;
        $data->age = 24;
        $data->bio = 'My name is Michael, and I am a backend developer';
        return response()->json($data);
    }

    /**
     * A function to perform basic arithmetic operations
     * @return JsonResponse
     */
    public function taskTwo(TaskRequest $request): JsonResponse
    {
        $request = $request->validated();

        $_x = $request["x"];
        $_y = $request["y"];

        switch ($request["operation_type"]) {
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
        $data->slackUsername = $this->slackUsername;
        $data->result = $result;
        $data->operation_type = $request["operation_type"];
        return response()->json($data);
    }
}
