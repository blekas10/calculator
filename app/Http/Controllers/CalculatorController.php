<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Http\RedirectResponse;
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
            'calculation' => Calculator::with('user:id,name')->latest()->get(),
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'string|max:255',
        ]);
    
        // Safely evaluate the arithmetic expression
        $result = $this->evaluateExpression($validated['message']);
    
        if ($result === null) {
            return redirect()->back()->withErrors(['message' => 'Invalid calculation.']);
        }
    
        // Save the result or the expression based on your requirements:
        $request->user()->calculations()->create([
            'message' => $result,
        ]);
    
        return redirect(route('calculations.index'));
    
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
    /**
     * Safely evaluates a mathematical expression.
     * 
     * @param  string $expression
     * @return float|null
     */
    private function evaluateExpression(string $expression): ?string
    {
        // Ensure the expression only contains numbers, and arithmetic operators
        if (preg_match("/^[0-9+\-\/\*\. ()]+$/", $expression)) {
            // Replace any potential malicious code
            $expression = str_replace(['<?', '?>', '<?php'], '', $expression);
            
            try {
                // Evaluate the expression
                eval('$result = ' . $expression . ';');
                return $expression . ' = ' . $result;
            } catch (\Throwable $e) {
                return null;
            }
        }
    
        return null;
    }

}
