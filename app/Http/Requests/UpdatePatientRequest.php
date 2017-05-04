<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePatientRequest extends Request
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
            'number' => 'required',
            'name' => 'required',  
            'card_id' => 'required',
            'case_number' => 'required'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '必须填写患者姓名',
            'number.required' => '必须填写患者编号',
            'card_id.required'  => '必须填写患者身份证号',
            'case_number.required'  => '必须填写就诊病历号'
        ];
    }
}

