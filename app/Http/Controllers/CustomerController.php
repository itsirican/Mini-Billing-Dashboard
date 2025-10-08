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

        return view('customers.index', [
        'customers' => $customers,
        'stats' => $stats,
    ]);
    }

    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'address' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle picture upload
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('customers', 'public');
            $validated['picture'] = $path;
        }
        Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully!');
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
    public function edit(Customer $customer)
{
    return view('customers.edit', compact('customer'));
}

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'address' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle new picture upload (simple store method)
        if ($request->hasFile('picture')) {
            // Optional: delete old picture manually if exists
            if ($customer->picture && file_exists(public_path('storage/' . $customer->picture))) {
                unlink(public_path('storage/' . $customer->picture));
            }

            // Store new picture
            $path = $request->file('picture')->store('customers', 'public');
            $validated['picture'] = $path;
        }

        $customer->update($validated);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        // Optional: delete the picture file if exists
        if ($customer->picture && file_exists(public_path('storage/' . $customer->picture))) {
            unlink(public_path('storage/' . $customer->picture));
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}