<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);

        $customers = Customer::withCount(['invoices as pending_invoices_count' => function ($query) {
            $query->where('status', 'pending');
        }])->orderBy('created_at', 'desc')->paginate($perPage);

        $stats = [
            'total_customers' => Customer::count(),
            'new_customers' => Customer::whereDate('created_at', '>=', now()->subDays(7))->count(),
            'pending_customers' => Customer::whereHas('invoices', function ($q) {
                $q->where('status', 'pending');
            })->count(),
        ];

        return view('customers', [
        'customers' => $customers,
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