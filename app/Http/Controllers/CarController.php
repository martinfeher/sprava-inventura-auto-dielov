<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Http\Resources\CarResource;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // retrieve all car data from the database model
        $cars = Car::all();

        // before displaying the car data, filter them with a filter specified in the CarResource 
        return CarResource::collection($cars);
    }


     /**
     * Display single car of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // retieve data from the database for a car with the id, specified in the request
        $car = Car::find($id);

        // before displaying the car data, filter them with a filter specified in the CarResource 
        return new CarResource($car);
    }


    /**
     * Store car in the database
     *
     * @param  \App\Http\Requests\CarRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CarRequest $request)
    {

        // create a new Car model item
        $car = new Car;

        $car->name = $request->name;
        $car->is_registered = $request->is_registered;

        if ($request->has('registration_number')) {   // test if request has a registration_number parameter
            $car->registration_number = $request->registration_number;
        }

        if ($car->save())   // if save operation is successful
        {
            // before displaying the car data, filter them with a filter specified in the CarResource 
            return new CarResource($car);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CarRequest $request
     * @param  \App\Models\car $car
     * @return \Illuminate\Http\Response
     */

    public function update(CarRequest $request, $id)
    {
        // retieve data from the database for a car with the id specified in the request
        $car = Car::find($id);

        $car->name = $request->name;
        $car->is_registered = $request->is_registered;

        if ($request->has('registration_number')) {   // test if request has a registration_number parameter
            $car->registration_number = $request->registration_number;
        }

        if ($car->save())   // if save operation is successful
        {
            // before displaying the car data, filter them with a filter specified in the CarResource 
            return new CarResource($car);
        }
 
    }


    /**
     * Remove a car item with a specific id
     *
     * @param  \App\Models\car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // retieve data from the database for a car with the id specified in the request
        $car = Car::find($id);

        if (!empty($car) ) {  // test if the car database item with the id has been found
            $car->destroy($id);
            return "Auto s id: $id bolo vymazané.";
        } else {
            return "Auto s id: $id nebol nájdený, nebola realizovná žiadna zmena.";
        }
    }
}
