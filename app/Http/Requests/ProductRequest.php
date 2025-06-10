<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_type_id' => 'required|exists:product_types,id',
            'name' => 'required|string|max:255',
            'article' => 'required|string|max:255',
            'min_price' => 'required|numeric|min:0.01|max:9999999999999999.99',
            'width' => 'required|numeric',
        ];
    }
    public function messages(): array{
        return [
            'name.required' => 'Пожалуйста введите новое название, поле не может быть пустым',
            'article.required' => 'Пожалуйста введите новый артикул, поле не может быть пустым',
            'min_price.required' => 'Пожалуйста введите новую цену, поле не может быть пустым',
            'width.required' => 'Пожалуйста введите новую ширину, поле не может быть пустым',
        ];
    }
}
