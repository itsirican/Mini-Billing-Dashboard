@push('styles')
  <link rel="stylesheet" href="{{ asset('css/create-invoices.css') }}">
@endpush
<x-layout title="invoices">
  <h2>Add New Invoice</h2>
  @if ($errors->any())
    <div>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="name">Invoice Title</label>
      <input type="text" id="name" name="title" placeholder="Invoice Title" value="{{ old('title', $invoice->title) }}"
        required>
    </div>
    <div class="form-group">
      <label for="amount">Amount</label>
      <input type="text" id="amount" name="amount" placeholder="Amount" value="{{ old('amount', $invoice->amount) }}"
        required>
    </div>
    <div class="form-group">
      <label>Status</label>
      <select name="status" class="form-control" required>
        <option value="unpaid" {{ old('status', $invoice->status) == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
        <option value="pending" {{ old('status', $invoice->status) == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="paid" {{ old('status', $invoice->status) == 'paid' ? 'selected' : '' }}>Paid</option>
      </select>
    </div>
    <div class="form-group">
      <label>Custumer</label>
      <select name="customer_id" class="selectpicker" data-live-search="true">
        @foreach ($customers as $customer)
          <option value="{{ $customer->id }}" {{ old('customer_id', $invoice->customer_id) == $customer->id ? 'selected' : '' }}>
            {{ $customer->name }} ({{ $customer->email }})
          </option>
        @endforeach
      </select>
    </div>
    <button class="create-btn" style="cursor: pointer">Done</button>
  </form>
</x-layout>