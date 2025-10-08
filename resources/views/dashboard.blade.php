@push('styles')
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush
<x-layout title="dashboard">
  <div class="dashboard">
    <div class="overview">
      <h2>Overview</h2>
      <div class="boxes">
        <x-card :stats="$stats['total_customers']" title="Total Custumers" src="admin/upwork.jpg" />
        <x-card :stats="$stats['total_invoices']" title="Total Invoices" src="admin/upwork.jpg" />
        <x-card :stats="$stats['paid_invoices']" title="Paid Invoices" src="admin/upwork.jpg" />
        <x-card :stats="$stats['unpaid_invoices']" title="Unpaid Invoices" src="admin/upwork.jpg" />
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
                    <img src="{{ $invoice->customer->picture}}" alt="" />{{ $invoice->customer->name}}
                  </td>
                  <td><strong> ${{ number_format($invoice->amount, 2) }} </strong></td>
                  <td>
                    <p class="status {{$invoice->status}}">{{ ucfirst($invoice->status) }}</p>
                  </td>
                  <td>{{ $invoice->created_at->format('Y-m-d') }}</td>
                  <td>
                    <a href="#" class="table-btn edit">Edit</a>
                    <a href="#" class="table-btn danger">Delete</a>
                  </td>
                </tr>
              @endforeach
              {{-- <tr>
                <td>2</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Jeet Saru</td>
                <td>Kathmandu</td>
                <td>27 Aug, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$5350.50</strong></td>
              </tr>
              <tr>
                <td>3</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Sonal Gharti</td>
                <td>Tokyo</td>
                <td>14 Mar, 2023</td>
                <td>
                  <p class="status shipped">Shipped</p>
                </td>
                <td><strong>$210.40</strong></td>
              </tr>
              <tr>
                <td>4</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>New Delhi</td>
                <td>25 May, 2023</td>
                <td>
                  <p class="status delivered">Delivered</p>
                </td>
                <td><strong>$149.70</strong></td>
              </tr>
              <tr>
                <td>5</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Sarita Limbu</td>
                <td>Paris</td>
                <td>23 Apr, 2023</td>
                <td>
                  <p class="status pending">Pending</p>
                </td>
                <td><strong>$399.99</strong></td>
              </tr>
              <tr>
                <td>6</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alex Gonley</td>
                <td>London</td>
                <td>23 Apr, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$399.99</strong></td>
              </tr>
              <tr>
                <td>7</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Jeet Saru</td>
                <td>New York</td>
                <td>20 May, 2023</td>
                <td>
                  <p class="status delivered">Delivered</p>
                </td>
                <td><strong>$399.99</strong></td>
              </tr>
              <tr>
                <td>8</td>
                <td>
                  <img src="{{asset('admin/upwork.jpg')}}" alt="" /> Aayat Ali Khan
                </td>
                <td>Islamabad</td>
                <td>30 Feb, 2023</td>
                <td>
                  <p class="status pending">Pending</p>
                </td>
                <td><strong>$149.70</strong></td>
              </tr>
              <tr>
                <td>9</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>Dhaka</td>
                <td>22 Dec, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$249.99</strong></td>
              </tr>
              <tr>
                <td>9</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>Dhaka</td>
                <td>22 Dec, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$249.99</strong></td>
              </tr>
              <tr>
                <td>9</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>Dhaka</td>
                <td>22 Dec, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$249.99</strong></td>
              </tr>
              <tr>
                <td>9</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>Dhaka</td>
                <td>22 Dec, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$249.99</strong></td>
              </tr>
              <tr>
                <td>9</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>Dhaka</td>
                <td>22 Dec, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$249.99</strong></td>
              </tr> --}}
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