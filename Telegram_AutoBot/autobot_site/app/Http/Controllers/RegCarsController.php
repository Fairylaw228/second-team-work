<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainRequests\RegCarsRequest;
use App\Http\Requests\RegCarsRequestCreate;
use App\Http\Requests\RegCarsRequestUpdate;
use App\Models\RegCars;
use Illuminate\Http\Request;

class RegCarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginateNumber = $request->input('limit') ?? 5;
        
        $paginate = DB::table('users')
        ->join('addresses', 'addresses.id_address', '=', 'users.id_address')
        ->join('roles', 'roles.id_role', '=', 'users.id_role')
        ->join('essences', 'essences.id_essence', '=', 'users.id_essence')->orderBy('users.id_user')->paginate($paginateNumber);
        
        return response()->json(['message' => 'success', 'records' => $paginate->items(), 'total' => $paginate->total()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegCarsRequestCreate $request)
    {
        $RegCars = RegCars::make(
            $request->getNumCar(),
            $request->getModel(),
            $request->getOwner(),
            $request->getAddInfo(),
            $request->getDateTimeOrder(),
            $request->getComment(),
            $request->getApproved(),
            $request->getUser(),
        );
        $RegCars->save();
        
        return response()->json(['message' => 'success', 'records' => $RegCars], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegCars  $RegCars
     * @return \Illuminate\Http\Response
     */
    public function show(RegCars $RegCars)
    {
        return response()->json(['message' => 'success', 'records' => $RegCars], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\RegCarsRequestUpdate  $request
     * @param  \App\Models\RegCars  $RegCars
     * @return \Illuminate\Http\Response
     */
    public function update(RegCarsRequestUpdate $request, RegCars $RegCars)
    {
        $RegCars = RegCars::getRegCarsById($request->getIdRegCar());

        $RegCars->setNumCarIfNotEmpty($request->getNumCar());
        $RegCars->setModelIfNotEmpty($request->getModel());
        $RegCars->setOwnerIfNotEmpty($request->getOwner());
        $RegCars->setAddInfoIfNotEmpty($request->getAddInfo());
        $RegCars->setDateTimeOrderIfNotEmpty($request->getDateTimeOrder());
        $RegCars->setPhoneNumberIfNotEmpty($request->getPhoneNumber());
        $RegCars->setCommentIfNotEmpty($request->getComment());
        $RegCars->setApprovedIfNotEmpty($request->getApproved());
        $user->setUser($request->getUser());

        $RegCars->save();
        
        return response()->json(['message' => 'success', 'records' => $RegCars], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegCars  $RegCars
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegCars $RegCars)
    {
        $result = $RegCars->delete();
        return response()->json(['message' => $result ? 'success' : 'error'], $result ? 200 : 500);
    }


    
}
