@extends('layouts.app')
@section ('title', 'index')
@section('content')
<section>
  <h1>Welcome To Podcast Manager</h1>
  <br/>
  <p>Here, in this website/api service, you can find all current episodes, add, edit or delete episodes.</p>
  <a href="api/podcasts">View Full List In Json Form</a>
  <br/>
  <br/>
</section>
@if(count($episodes) > 0)
@foreach($episodes as $current)
<section>
  <h3>{{$current['title']}}</h3>
  <p><strong>Date: </strong>{{$current['created_date']}}</p>
  <small><strong>Episode: </strong>{{$current['episode_number']}},
    @foreach($current['metadata'] as $metaname => $metaval)
      <strong>{{ucfirst(str_replace("_", " ", $metaname))}}: </strong> {{$metaval}}{{ ($loop->last ? '' : ',') }}
    @endforeach
  </small>
  <p>{{$current['description']}}</p>
  <a href="podcasts/{{ $current['id'] }}" class="btn btn-primary">Go To Podcast</a>
  <br/>
  <br/>
</section>
@endforeach
@else
 <p>No episodes at the moment</p>
@endif
<br/>
<br/>
@endsection
