<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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

        return view('invoices.index', [
            'invoices' => $invoices,
            'stats' => $stats,
        ]);
    }

    public function create()
    {
        // Pass all customers to select in invoice form
        $customers = Customer::all();
        return view('invoices.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,pending,paid',
            'customer_id' => 'required|exists:customers,id',
        ]);

        Invoice::create($validated);

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Invoice $invoice)
    {
        $customers = Customer::all(); // to allow changing customer
        return view('invoices.edit', compact('invoice', 'customers'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,pending,paid',
            'customer_id' => 'required|exists:customers,id',
        ]);

        $invoice->update($validated);

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully!');
    }

    public function destroy(Invoice $invoice)
{
    $invoice->delete();

    return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully!');
}
}