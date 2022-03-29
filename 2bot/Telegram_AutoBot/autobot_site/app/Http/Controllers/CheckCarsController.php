<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MainRequests\CheckCarsRequest;
use App\Http\Requests\CheckCarsRequestCreate;
use App\Http\Requests\CheckCarsRequestUpdate;
use App\Models\CheckCars;


class CheckCarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $paginate = CheckCars::query()->paginate($request->input('limit'));

        return response()->json(['message' => 'success', 'records' => $paginate->items(), 'total' => $paginate->total()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckCarsRequestCreate $request)
    {
        $CheckCars = CheckCars::make(
            $request->getMark1(),
            $request->getIdTelegramm(),
            $request->getNumber(),
            $request->getApproved()
        );
        $CheckCars->save();
        
        return response()->json(['message' => 'success', 'records' => $CheckCars], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CheckCars  $CheckCars
     * @return \Illuminate\Http\Response
     */
    public function show(CheckCars $CheckCars)
    {
        return response()->json(['message' => 'success', 'records' => $CheckCars], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CheckCarsRequestUpdate  $request
     * @param  \App\Models\CheckCars  $CheckCars
     * @return \Illuminate\Http\Response
     */
    public function update(CheckCarsRequestUpdate $request, CheckCars $CheckCars)
    {
        $CheckCars = CheckCars::getCheckCarsById($request->getId());////////

        $CheckCars->setMark1IfNotEmpty($request->getMark1());
        $CheckCars->setIdTelegrammIfNotEmpty($request->getIdTelegramm());
        $CheckCars->setNumberIfNotEmpty($request->getNumber());
        $CheckCars->setApprovedIfNotEmpty($request->getApproved());

        $CheckCars->save();
        
        return response()->json(['message' => 'success', 'records' => $CheckCars], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckCars  $CheckCars
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckCars $CheckCars)
    {
        $result = $CheckCars->delete();
        return response()->json(['message' => $result ? 'success' : 'error'], $result ? 200 : 500);
    }
}
