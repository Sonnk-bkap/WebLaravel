<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class CateStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    // public function withValidator($validator)
    // {
    //     $validator->after(function(Validator $validator){
    //         if($this->somethingElseIsInvalid()){
    //             $validator->errors()->add(
    //                 'dulieu','có một vài lỗi xảy ra'
    //             );
    //         }
    //     });
    // }
//     public function after(): array
// {
//     return [
//         function (Validator $validator) {
//             if ($this->somethingElseIsInvalid()) {
//                 $validator->errors()->add(
//                     'field',
//                     'Something is wrong with this field!'
//                 );
//             }
//         }
//     ];
// }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    
    public function rules(): array
    {
        return [
            'CateName'=>'required|min:5',
            'Ord'=>'required'
        ];
    }
    public function messages()
    {
        return[
        'CateName.required'=>'Tên danh mục không được trống',
        'CateName.min'=>'Tên danh mục không được nhỏ hơn 5 ký tự',
        'Ord.required'=>'Thứ tự không thể trống'
        ];
    }
}
