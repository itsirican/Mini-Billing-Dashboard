@props(["src" => "images/charts.jpg", 'stats', 'title'])
@push('styles')
  <link rel="stylesheet" href="{{ asset('css/components/card.css') }}">
@endpush
<div class="box">
  <img src="{{asset($src)}}" alt="total">
  <div class="infos">
    <p>{{$stats}}</p>
    <p>{{$title}}</p>
  </div>
</div>