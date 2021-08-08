@extends('layouts.app', ['activePage' => '', 'titlePage' => __('Tableau de bord')])
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <h3>Affichage relatif au signals du profils d'ID {{$id}} associé à l'utilisateur {{$fullname}}</h3>
      </div>
      <div class="row">
                 <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Derniers 5 profils signalés</h4>
              {{-- <p class="card-category">New employees on 15th September, 2016</p> --}}
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID signal</th>
                  <th>date</th>
                  <th>Cause de signal: Contexte</th>
                  <th>Signalé Par(Prénom Nom)</th>
                  {{-- <th>Options</th> --}}
                </thead>
                <tbody id="dt-profiles">
                 @foreach ($signals as $signal)
                   <tr>
                     <td>{{$signal->id}}</td>
                     <td>{{$signal->created_at}} </td>
                     <td>La publication du {{explode("\\",$signal->context_type)[2]}} d'ID {{$signal->context_id}}</td>
                     <td>{{$signal->signalerUser->firstname}} {{$signal->signalerUser->lastname}}</td>
                     {{-- <td><i class="material-icons">visibility</i></td> --}}
                   </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <div class="d-flex justify-content-center">
                {!! $signals->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection