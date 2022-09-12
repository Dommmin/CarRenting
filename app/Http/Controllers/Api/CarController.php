<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\FavoriteResource;
use App\Models\Car;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CarResource::collection(Car::all());
//        return CarResource::collection(Car::limit(6)->get());
    }

    /**
     * Display the specified resource.
     *
     * @param Car $car
     * @return CarResource
     */
    public function show(Car $car)
    {
        return new CarResource($car);
    }

    /**
     * @param Request $request
     * @return FavoriteResource
     */
    public function addFavorite(Request $request)
    {
        $favorite = new Favorite();
        $favorite->user_id = $request['user'];
        $favorite->car_id = $request['car'];
        $favorite->is_favorite = true;
        $favorite->save();

        return new FavoriteResource($favorite);
    }

    /**
     * @param Request $request
     * @return FavoriteResource
     */
    public function removeFavorite(Request $request)
    {
        $favorite = Favorite::where('user_id', $request['user'])
            ->where('car_id', $request['car'])
            ->first();

        $favorite->delete();

        return new FavoriteResource($favorite);
    }
}
