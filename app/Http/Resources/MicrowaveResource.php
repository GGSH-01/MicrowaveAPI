<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MicrowaveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'program' => $this->program,
            'door' => $this->door,
            'power' => $this->power,
            'timer' => $this->timer
        ];
    }
}