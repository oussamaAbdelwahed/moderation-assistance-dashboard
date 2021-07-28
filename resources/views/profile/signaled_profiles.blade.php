@extends('layouts.app', ['activePage' => 'signaled-profiles', 'titlePage' => __('profils utilisateur signalés')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div>
          @foreach ($data as $item)
           <p>{{$item->id}}</p>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection