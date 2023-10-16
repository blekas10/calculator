<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response 
    {
        return Inertia::render('Calculations/Index', [
            //
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calculator  $calculator
     * @return \Illuminate\Http\Response
     */
    public function show(Calculator $calculator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calculator  $calculator
     * @return \Illuminate\Http\Response
     */
    public function edit(Calculator $calculator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calculator  $calculator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calculator $calculator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calculator  $calculator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calculator $calculator)
    {
        //
    }
}
