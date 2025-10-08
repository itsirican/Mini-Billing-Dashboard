@push('styles')
  <link rel="stylesheet" href="{{ asset('css/create-invoices.css') }}">
@endpush
<x-layout title="invoices">
  <h2>Add New Invoice</h2>
  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Invoice Title</label>
      <input type="text" id="name" placeholder="Invoice Title" required>
    </div>
    <div class="form-group">
      <label for="address">Amount</label>
      <input type="text" id="address" placeholder="Address" required>
    </div>
    <div class="form-group">
      <label for="address">Status</label>
      <input type="text" id="address" placeholder="Address" required>
    </div>
    <div class="form-group">
      <label for="name">Custumer</label>
      <select class="selectpicker" data-live-search="true">
        <option data-tokens="ketchup mustard">Hot Dog, Fries and a Soda</option>
        <option data-tokens="mustard">Burger, Shake and a Smile</option>
        <option data-tokens="frosting">Sugar, Spice and all things nice</option>
        <option data-tokens="mustard">Burger, Shake and a Smile</option>
        <option data-tokens="frosting">Sugar, Spice and all things nice</option>
        <option data-tokens="mustard">Burger, Shake and a Smile</option>
        <option data-tokens="frosting">Sugar, Spice and all things nice</option>
      </select>
    </div>
    <a href="{{route('custumer.create')}}" class="create-btn">Done</a>
  </form>
</x-layout>