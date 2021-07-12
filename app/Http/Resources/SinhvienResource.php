<?php

namespace Vanguard\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SinhvienResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'masv' => $this->masv,
            'tensv' => $this->tensv,
            'gioitinh' => $this->gioitinh,
            'namsinh' => $this->namsinh,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
          
        ];
    }
}
