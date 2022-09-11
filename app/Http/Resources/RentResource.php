<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RentResource extends JsonResource
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
//            'user' => $this->user->name,
            'car' => $this->car->name,
            'starts' => Carbon::parse($this->starts)->format('d-M-Y, H:i'),
            'ends' => Carbon::parse($this->ends)->format('d-M-Y, H:i'),
            'toPay' => $this->toPay
        ];
    }
}
