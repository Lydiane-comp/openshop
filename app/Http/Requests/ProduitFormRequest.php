<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitFormRequest extends FormRequest
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
            'designation' => 'required|min:3|max:50|unique:produits,designation,'.$this->produit,
            'prix' => 'required|numeric|between:1000,1000000',
            'quantite' => 'required|numeric|between:5,5000',
            'description' => 'nullable|max:255',
            'category_id' => 'required|numeric',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif,bmp,svg',
        ];
    }
}
