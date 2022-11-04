<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // Task 2 Request Validations
        if ($this->routeIs('task-2')) {
            return [
                "operation_type"=>'required|in:addition,subtraction,multiplication',
                "x"=>'integer|required',
                "y"=>'integer|required',
            ];
        }
    }

    public function messages()
    {
        return [
            // Task 2 Request Validations
            'operation_type.required' => 'Operation type is required',
            'operation_type.in' => 'Operation type should either be multiplication, addition, or subtraction',
            'x.required' => 'x value is required',
            'y.required' => 'y value is required',
            'y.integer' => 'y value must be an integer',
            'x.integer' => 'x value must be an integer',
        ];
    }
}
