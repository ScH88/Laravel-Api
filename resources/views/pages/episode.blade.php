@extends('layouts.app')
@section ('title', 'index')
@section('content')
<section>
  <h1>{{ $episode['title'] }}</h1>
  <p><strong>Date: </strong>{{$episode['created_date']}}</p>
  <small><strong>Episode: </strong>{{$episode['episode_number']}},
    @foreach($episode['metadata'] as $metaname => $metaval)
      <strong>{{ucfirst(str_replace("_", " ", $metaname))}}: </strong> {{$metaval}}{{ ($loop->last ? '' : ',') }}
    @endforeach
  </small>
  <p>{{ $episode['description'] }}</p>
  <p><strong>Download Url:</strong> {{ $episode['download_url'] }}</p>
  <br/>
  <a href="../api/podcast/{{ $episode['id'] }}">View In Json Form</a>
</section>
@endsection
