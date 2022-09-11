<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'slug' => $this->slug,
            'year' => $this->year,
            'fuel' => $this->fuel,
            'fuel_consumption' => $this->fuel_consumption,
            'seats' => $this->seats,
            'gearbox' => $this->gearbox,
            'price' => $this->price,
            'horsepower' => $this->horsepower,
            'torque' => $this->torque,
            'acceleration' => $this->acceleration,
            'engine' => $this->engine,
            'drivetrain' => $this->drivetrain,
            'available' => $this->available,
            'images' => $this->images,
            'main' => $this->main,
            'description' => $this->description,
        ];
    }
}
