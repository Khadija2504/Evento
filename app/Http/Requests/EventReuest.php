<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventReuest extends FormRequest
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
        return [
            'titre' => 'required| max:100',
            'description' => 'required| min:100',
            'date' => 'required',
            'image' => 'required',
            'lieu' => 'required',
            'places_number' => 'required',
            'id_organisateur' => 'required',
            'category_id' => 'required',
            'acceptation' => 'required',
        ];
    }
}
