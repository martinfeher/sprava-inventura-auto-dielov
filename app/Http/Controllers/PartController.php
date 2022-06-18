<?php

namespace App\Http\Controllers;


use App\Http\Requests\PartRequest;
use App\Models\Part;
use App\Http\Resources\PartResource;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // retrieve all part data from the database model
        $parts = Part::all();

        // before displaying the part data, filter them with a filter specified in the PartResource 
        return PartResource::collection($parts);
    }

     /**
     * Display single part of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // retieve data from the database for a part with the id specified in the request
        $part = Part::find($id);

        // before displaying the part data, filter them with a filter specified in the PartResource 
        return new PartResource($part);
    }

    /**
     * Store part in the database
     *
     * @param  \App\Http\Requests\PartRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(PartRequest $request)
    {

        // create a new Part model item
        $part = new Part;

        $part->name = $request->name;
        $part->serialnumber = $request->serialnumber;

        if ($request->has('car_id')) {  // test if request has a car_id parameter
            $part->car_id = $request->car_id;
        }

        if ($part->save())   // if save operation is successful
        {
            // before displaying the part data, filter them with a filter specified in the PartResource 
            return new PartResource($part);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PartRequest $request
     * @param  \App\Models\part $part
     * @return \Illuminate\Http\Response
     */

    public function update(PartRequest $request, $id)
    {

        // retieve data from the database for a part with the id specified in the request
        $part = Part::find($id);

        $part->name = $request->name;
        $part->serialnumber = $request->serialnumber;

        if ($request->has('car_id')) {   // test if request has a car_id parameter
            $part->car_id = $request->car_id;
        }

        if ($part->save())   // if save operation is successful
        {
            // before displaying the part data, filter them with a filter specified in the PartResource 
            return new PartResource($part);
        }
 
    }


    /**
     * Remove a part item with a specific id
     *
     * @param  \App\Models\part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // retieve data from the database for a part with the id specified in the request
        $part = Part::find($id);

        if (!empty($part) ) {  // test if the part database item with the id has been found
            $part->destroy($id);
            return "Diel s id: $id bolo vymazané.";
        } else {
            return "Diel s id: $id nebol nájdený, nebola realizovná žiadna zmena.";
        }
    }
}
