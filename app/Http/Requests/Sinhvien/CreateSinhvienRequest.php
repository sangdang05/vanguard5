<?php

namespace Vanguard\Http\Requests\Sinhvien;
use Vanguard\Http\Requests\Request;

class CreateSinhvienRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = [
            'masv' =>'required|unique:sinhvien',
        ];
        return $rule;

    }
}
