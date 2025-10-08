@push('styles')
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush
<x-layout title="dashboard">
  <div class="dashboard">
    <div class="overview">
      <h2>Overview</h2>
      <div class="boxes">
        <x-card :stats="$stats['total_customers']" title="Total Custumers" />
        <x-card :stats="$stats['total_invoices']" title="Total Invoices" />
        <x-card :stats="$stats['paid_invoices']" title="Paid Invoices" />
        <x-card :stats="$stats['unpaid_invoices']" title="Unpaid Invoices" />
      </div>
    </div>
    <div class="payments-invoices">
      <div class="payments">
        <h2>Payments</h2>
        <div class="payments-chart">
          <canvas id="myBarChart"></canvas>
        </div>
      </div>
      <div class="invoices">
        <h2>Invoices</h2>
        <div style="width: 400px; height: 400px;">
          <canvas id="myDoughnutChart"></canvas>
        </div>
      </div>
    </div>
    <div class="latest-invoices">
      <h2>Recent Invoices List</h2>
      <div class="table" id="customers_table">
        <section class="table__body">
          <table>
            <thead>
              <tr>
                <th>Id <span class="icon-arrow">&UpArrow;</span></th>
                <th>Invoice Titile <span class="icon-arrow">&UpArrow;</span></th>
                <th>Customer <span class="icon-arrow">&UpArrow;</span></th>
                <th>Amount <span class="icon-arrow">&UpArrow;</span></th>
                <th>Status <span class="icon-arrow">&UpArrow;</span></th>
                <th>Date <span class="icon-arrow">&UpArrow;</span></th>
                <th>Actions <span class="icon-arrow">&UpArrow;</span></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($recentInvoices as $invoice)
                <tr>
                  <td>{{$invoice->id}}</td>
                  <td>{{$invoice->title}}</td>
                  <td>
                    <img src="{{asset('storage/' . $invoice->customer->picture)}}" alt="" />{{ $invoice->customer->name}}
                  </td>
                  <td><strong> ${{ number_format($invoice->amount, 2) }} </strong></td>
                  <td>
                    <p class="status {{$invoice->status}}">{{ ucfirst($invoice->status) }}</p>
                  </td>
                  <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                  <td>
                    <form style="display: inline;" action="{{route('invoices.edit', $invoice->id)}}" method="GET">
                      <button class="table-btn edit">Edit</button>
                    </form>
                    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST"
                      style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="table-btn danger"
                        onclick="return confirm('Are you sure you want to delete this invoice?');">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </section>
      </div>
    </div>
  </div>
  @push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- Payments Chats --}}
    <script>
      const ctx = document.getElementById('myBarChart').getContext('2d');
      const myBarChart = new Chart(ctx, {
        type: 'bar', // Bar chart
        data: {
          labels: @json($last12Months->pluck('month')),
          datasets: [{
            label: 'Payments',
            data: @json($last12Months->pluck('total_paid')),
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            barPercentage: 0.3,
          }]

        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>

    {{-- Invoices Charts --}}
    <script>
      const doughnutCtx = document.getElementById('myDoughnutChart').getContext('2d');
      const myDoughnutChart = new Chart(doughnutCtx, {
        type: 'doughnut',

        data: {
          labels: Object.keys(@json($chartData['invoice_status'])),
          datasets: [{
            data: Object.values(@json($chartData['invoice_status'])),
            backgroundColor: ['#28a745', '#ffc107', '#dc3545'],
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: { position: 'bottom' },
            title: {
              display: true,
              text: 'Doughnut Chart Example'
            }
          },
          cutout: '70%' // controls the size of the doughnut hole
        }
      });
    </script>
  @endpush
</x-layout>