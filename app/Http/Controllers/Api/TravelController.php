<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelRequest;
use App\Travel;
use App\User;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $userId = null)
    {
        $travels = Travel::all();

        if($userId){
            $travels = $userId->travels;
        }

        return [
            'message' => 'Travels list successful!',
            'data' => $travels
        ];
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
     * @return \Illuminate\Http\Response
     */
    public function store(TravelRequest $request, User $userId)
    {
        if($userId){
            $travel = new Travel([
                'date_travel' => $request->date_travel,
                'country_id' => $request->country_id,
                'municipality_id' => $request->municipality_id
            ]);

            $userTravel = $userId->travels()->save($travel);
            $message = [
                'message' => 'Travel save successful!',
                'data' => $userTravel
            ];
        }else{
            $message = [
                'message' => 'Id user no found',
                'data' => []
            ];
        }

        return $message;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function show(Travel $travel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function edit(Travel $travel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Travel $travel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Travel  $travel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
