@push('styles')
  <link rel="stylesheet" href="{{ asset('css/custumers.css') }}">
@endpush
<x-layout title="customers">
  @if (session('success'))
    <div class="message">
      <strong class="font-bold">Success!</strong>
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif
  <div class="custumers">
    <div class="overview">
      <h2>Overview</h2>
      <div class="boxes">
        <x-card :stats="$stats['total_customers']" title="Total Custumers" src="admin/upwork.jpg" />
        <x-card :stats="$stats['new_customers']" title="New Custumers" src="admin/upwork.jpg" />
        <x-card :stats="$stats['pending_customers']" title="Pending Custumers" src="admin/upwork.jpg" />
        {{-- <x-card number="1597" title="Total Custumers" src="admin/upwork.jpg" /> --}}
      </div>
    </div>
    <div class="custumers-list">
      <div class="custumers-box">
        <h2>Custumers List</h2>
        <a href="{{route('customers.create')}}" class="create-btn">New Custumer</a>
      </div>
      <div class="table" id="customers_table">
        <section class="table__body">
          <table>
            <thead>
              <tr>
                <th>Id <span class="icon-arrow">&UpArrow;</span></th>
                <th>Customer <span class="icon-arrow">&UpArrow;</span></th>
                <th>Email <span class="icon-arrow">&UpArrow;</span></th>
                <th>Address <span class="icon-arrow">&UpArrow;</span></th>
                <th>Actions <span class="icon-arrow">&UpArrow;</span></th>
                {{-- <th>Status <span class="icon-arrow">&UpArrow;</span></th> --}}
                {{-- <th>Amount <span class="icon-arrow">&UpArrow;</span></th> --}}
              </tr>
            </thead>
            <tbody>
              @foreach ($customers as $customer)
                <tr>
                  <td>{{ $customer->id }}</td>
                  <td>
                    <img src="{{asset('storage/' . $customer->picture)}}" alt="" />{{ $customer->name }}
                  </td>
                  <td>{{ $customer->email }}</td>
                  <td>{{Str::limit($customer->address, 10)}}</td>
                  <td>
                    <form style="display: inline;" action="{{route('customers.edit', $customer->id)}}" method="GET">
                      <button class="table-btn edit">Edit</button>
                    </form>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                      style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="table-btn danger"
                        onclick="return confirm('Are you sure you want to delete this customer?');">
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
</x-layout>