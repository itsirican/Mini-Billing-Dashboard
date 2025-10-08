@push('styles')
  <link rel="stylesheet" href="{{ asset('css/create-custumers.css') }}">
@endpush
<x-layout title="custumers">
  <h2>Add New Custumer</h2>
  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="name">Full Name</label>
      <input type="text" id="name" placeholder="Full Name" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" placeholder="Email" required>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" id="address" placeholder="Address" required>
    </div>
    <div class="form-group">
      <label for="pictute">Picture</label>
      <input type="file" id="pictute">
    </div>
    <a href="{{route('custumer.create')}}" class="create-btn">Done</a>
  </form>
</x-layout>