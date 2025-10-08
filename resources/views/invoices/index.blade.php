@push('styles')
  <link rel="stylesheet" href="{{ asset('css/invoices.css') }}">
@endpush
<x-layout title="invoices">
  <div class="invoices">
    <div class="overview">
      <h2>Overview</h2>
      <div class="boxes">
        <x-card :stats="$stats['total_invoices']" title="Total Invoices" />
        <x-card :stats="$stats['new_invoices']" title="New Invoices" />
        <x-card :stats="$stats['pending_invoices']" title="Pending Invoices" />
      </div>
    </div>
    <div class="invoices-list">
      <div class="invoices-box">
        <h2>Invoices List</h2>
        <a href="{{route('invoices.create')}}" class="create-btn">New Invoice</a>
      </div>
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
              @foreach ($invoices as $invoice)
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
      {{ $invoices->links('pagination::bootstrap-5') }}
    </div>
  </div>
</x-layout>