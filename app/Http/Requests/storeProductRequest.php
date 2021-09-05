<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeProductRequest extends FormRequest
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
            'title' => ['required', 'max:32'],
            'type' => ['required'],
            'price' => ['required', 'numeric'],
            'image_product' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Bạn cần thêm tên sản phẩm',
            'title.max' => 'Tên sản phẩm phải không quá 32 kí tự',
            'image_product.mimes' => 'Định dạng file không phù hợp',
            'image_product.max' => 'Dung lượng ảnh quá lớn',
        ];
    }
}
