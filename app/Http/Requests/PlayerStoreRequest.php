<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'in_game_id' => 'required|numeric|unique:players,in_game_id',
            'in_game_nickname' => 'required|unique:players,in_game_nickname',
            'roles' => 'array|required',
            'photo' => 'file|image|max:2000'
        ];
    }
}
