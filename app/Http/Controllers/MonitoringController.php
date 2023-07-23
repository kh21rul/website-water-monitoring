<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Http\Requests\StoreMonitoringRequest;
use App\Http\Requests\UpdateMonitoringRequest;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMonitoringRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Monitoring $monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monitoring $monitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMonitoringRequest $request, Monitoring $monitoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monitoring $monitoring)
    {
        //
    }

    public function bacasuhu()
    {
        $monitoring = Monitoring::select('*')->get();
        return view('bacasuhu', ['monitoring' => $monitoring]);
    }

    public function bacakekeruhan()
    {
        $monitoring = Monitoring::select('*')->get();
        return view('bacakekeruhan', ['monitoring' => $monitoring]);
    }

    public function bacaph()
    {
        $monitoring = Monitoring::select('*')->get();
        return view('bacapH', ['monitoring' => $monitoring]);
    }

    public function bacado()
    {
        $monitoring = Monitoring::select('*')->get();
        return view('bacado', ['monitoring' => $monitoring]);
    }

    public function bacakualitasair()
    {
        $monitoring = Monitoring::select('*')->get();
        return view('bacakualitasair', ['monitoring' => $monitoring]);
    }

    public function bacakendali()
    {
        $monitoring = Monitoring::select('*')->get();
        return view('bacakendali', ['monitoring' => $monitoring]);
    }

    public function simpan () {
        Monitoring::where ('id', 1)->update ([
            'temperature' => request ('temperature'),
            'turbidity' => request ('turbidity'),
            'ph' => request ('ph'),
            'dissolved_oxygen' => request ('dissolved_oxygen'),
            'kualitas_air' => request ('kualitas_air'),
            'sistem_kendali' => request ('sistem_kendali'),
        ]);
    }
}
