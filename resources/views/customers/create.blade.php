@push('styles')
  <link rel="stylesheet" href="{{ asset('css/create-custumers.css') }}">
@endpush
<x-layout title="custumers">
  <h2>Add New Custumer</h2>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" id="address" name="address" placeholder="Address" value="{{ old('address') }}" required>
    </div>
    <div class="form-group">
      <label for="picture">Picture</label>
      <input type="file" id="picture" name="picture">
    </div>
    <button type="submit" class="create-btn">Create Customer</button>
  </form>
</x-layout>