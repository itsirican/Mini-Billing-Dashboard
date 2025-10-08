<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
            // Overview stats
    $stats = [
        'total_customers' => Customer::count(),
        'total_invoices' => Invoice::count(),
        'paid_invoices' => Invoice::where('status', 'paid')->count(),
        'unpaid_invoices' => Invoice::where('status', 'unpaid')->count(),
        'pending_invoices' => Invoice::where('status', 'pending')->count(),
    ];

    // Last 12 months payments for bar chart
    $last12Months = collect();
    for ($i = 11; $i >= 0; $i--) {
        $month = now()->subMonths($i);
        $monthName = $month->format('M');
        $totalPaid = Invoice::where('status', 'paid')
            ->whereYear('created_at', $month->year)
            ->whereMonth('created_at', $month->month)
            ->sum('amount');
        $last12Months->push([
            'month' => $monthName,
            'total_paid' => $totalPaid
        ]);
    }

    // Doughnut / Pie chart data suggestions
    $chartData = [
        'paid_vs_unpaid' => [
            'Paid' => Invoice::where('status', 'paid')->count(),
            'Unpaid' => Invoice::where('status', 'unpaid')->count()
        ],
        'invoice_status' => [
            'Paid' => Invoice::where('status', 'paid')->count(),
            'Pending' => Invoice::where('status', 'pending')->count(),
            'Unpaid' => Invoice::where('status', 'unpaid')->count()
        ],
        'customers_with_pending' => Customer::whereHas('invoices', fn($q) => $q->where('status', 'pending'))->count(),
        'revenue_distribution' => [
            'Paid' => Invoice::where('status', 'paid')->sum('amount'),
            'Pending' => Invoice::where('status', 'pending')->sum('amount'),
            'Unpaid' => Invoice::where('status', 'unpaid')->sum('amount')
        ]
    ];

    // Last 3 invoices
    $recentInvoices = Invoice::with('customer')->orderBy('created_at', 'desc')->take(3)->get();

    return view('dashboard', compact('stats', 'last12Months', 'chartData', 'recentInvoices'));
    }
}