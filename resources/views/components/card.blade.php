@props(["src" => "admin/upwork.jpg", 'number', 'title'])
@push('styles')
  <link rel="stylesheet" href="{{ asset('css/components/card.css') }}">
@endpush
<div class="box">
  <img src="{{asset($src)}}" alt="total">
  <div class="infos">
    <p>{{$number}}</p>
    <p>{{$title}}</p>
  </div>
</div>