<?php

namespace Vanguard\Http\Requests\Sinhvien;

use Vanguard\Http\Requests\Request;

class RemoveSinhvienRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->id;
        $rule = [
            'id' =>'required',
        ];
        return $rule;

    }
}
