<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10;

        // Paginate invoices with customer relationship
        $invoices = Invoice::with('customer')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        // Stats
        $stats = [
            'total_invoices' => Invoice::count(),
            'new_invoices' => Invoice::whereDate('created_at', '>=', now()->subDays(7))->count(),
            'pending_invoices' => Invoice::where('status', 'pending')->count(),
        ];

        return view('invoices', [
            'invoices' => $invoices,
            'stats' => $stats,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}