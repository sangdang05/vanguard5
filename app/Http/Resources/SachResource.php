<?php

namespace Vanguard\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SachResource extends JsonResource
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
            'ma' => $this->ma,
            'tensach' => $this->tensach,
            'loai' => $this->loai,
            'soluong' => $this->soluong,
            'tacgia' => $this->tacgia,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
          
        ];
    }
}
