<?php

namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
//            'product_id' => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
//            'product_id.required' => 'A Product is required',

        ];
    }
}
