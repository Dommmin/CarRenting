<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class AdminCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CarResource::collection(Car::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return CarResource
     */
    public function store(Request $request): CarResource
    {
//        $data = $request->validated();
//        $car = Car::create($data);

        $car = new Car();
        $car->name = $request['name'];
        $car->year = $request['year'];
        $car->fuel = $request['fuel'];
        $car->fuel_consumption = $request['fuel_consumption'];
        $car->seats = $request['seats'];
        $car->gearbox = $request['gearbox'];
        $car->price = $request['price'];
        $car->horsepower = $request['horsepower'];
        $car->torque = $request['torque'];
        $car->acceleration = $request['acceleration'];
        $car->engine = $request['engine'];
        $car->drivetrain = $request['drivetrain'];

        $images = [];

        if ($request->files) {
            $files = $request->files;
            foreach ($files as $key => $value) {
                $file = $value;
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path("images"), $fileName);
                $images[] = $fileName;
            }
        }

        $car->images = $images;
        $car->main = $car->images[0];
        $car->description = $request['description'];
        $car->save();

        return new CarResource($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Car $car
     * @return CarResource
     */
    public function update(StoreCarRequest $request, Car $car): CarResource
    {
//        $data = $request->validated();
//
//        $car->update($data);

        $car->query()
            ->where('id', $car->id)
            ->firstOrFail();
        $car->name = $request['name'];
        $car->year = $request['year'];
        $car->fuel = $request['fuel'];
        $car->fuel_consumption = $request['fuel_consumption'];
        $car->seats = $request['seats'];
        $car->gearbox = $request['gearbox'];
        $car->price = $request['price'];
        $car->horsepower = $request['horsepower'];
        $car->torque = $request['torque'];
        $car->acceleration = $request['acceleration'];
        $car->engine = $request['engine'];
        $car->drivetrain = $request['drivetrain'];

        $images = [];

        if ($request->files) {
            $files = $request->files;
            foreach ($files as $key => $value) {
                $file = $value;
                $fileName = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path("images"), $fileName);
                $images[] = $fileName;
            }
        }

        $car->images = $images;
//        $car->main = $car->images[0];
        $car->description = $request['description'];
        $car->update();

        return new CarResource($car);
    }

    /**
     * @param Car $car
     * @return CarResource
     */
    public function available(Car $car): CarResource
    {
        $car->available = true;
        $car->update();

        return new CarResource($car);
    }

    /**
     * @param Car $car
     * @return CarResource
     */
    public function unAvailable(Car $car): CarResource
    {
        $car->available = false;
        $car->update();

        return new CarResource($car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return Response
     */
    public function destroy(Car $car): Response
    {
        $car->delete();
        $car->rents()->delete();

        return response()->noContent();
    }
}
