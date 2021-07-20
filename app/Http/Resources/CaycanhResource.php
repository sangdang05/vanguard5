<?php

namespace Vanguard\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CaycanhResource extends JsonResource
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
            'ten' => $this->ten,
            'loai' => $this->loai,
            'namtrong' => $this->namtrong,
            'mota' => $this->mota,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
          
        ];
    }
} 
