<?php

namespace Vanguard\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BinhluanResource extends JsonResource
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
            'id' => (int) $this->id,
            'noidung' => $this->noidung,
            'iduser' => $this->iduser,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
          
        ];
    }
}
