<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RentRequest;
use App\Http\Resources\CarResource;
use App\Http\Resources\RentResource;
use App\Models\Car;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RentResource::collection(Rent::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RentResource
     */
    public function store(Request $request)
    {
//        $validated = $request->validated();
//
//        $rent = Rent::create($validated);

        $car = Car::query()
            ->select('id', 'price')
            ->where('slug', $request['car'])
            ->firstOrFail();

        $rent = new Rent();
        $rent->car_id = $car->id;
        $rent->starts = $request['starts'];
        $rent->ends = $request['ends'];

        $first_date = strtotime(Carbon::parse($rent->starts)->toDate()->format('Y-m-d H:i:s'));
        $second_date = strtotime(Carbon::parse($rent->ends)->toDate()->format('Y-m-d H:i:s'));

        $days = ceil(($second_date - $first_date) / 3600 / 24);

        $rent->days = $days;

        $items = [
            '1,2' => $car->price,
            '3,5' => $car->price * 0.9,
            '6,7' => $car->price * 0.8,
            '8,14' => $car->price * 0.65,
            '15,21' => $car->price * 0.5,
            '22,28' => $car->price * 0.4,
            '29,31' => $car->price * 0.3,
        ];

        foreach ($items as $key => $item) {
            $arrays = explode(',', $key);
            if ($days >= $arrays[0] && $days <= $arrays[1]) {
                $price = $item * $days;
            }
        }

        $rent->toPay = $price;
        $rent->save();

        // Make unavailable
        $car = Car::find($rent->car_id);
        $car->available = false;
        $car->save();

        return new RentResource($rent);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rent $rent
     * @return Response
     */
    public function destroy(Rent $rent)
    {
        $rent->delete();

        return response()->noContent();
    }
}
