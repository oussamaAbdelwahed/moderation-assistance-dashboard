@extends('layouts.app', ['activePage' => 'signaled-profiles', 'titlePage' => __('postes signalés')])

@section('content')
  <div class="content">
    <div class="container-fluid">
   
      <div class="row">
        <div class="card">
            <div class="card-header card-header-danger">
               <h3 class="card-title">Liste des postes récemment signalés</h3>             
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Email</th>
                  <th>Date de naissance</th>
                  <th>Signalé le(dernier signal)</th>
                  <th>Nombre total de signals</th>
                </thead>
                <tbody id="dt-posts">
                  @foreach ($data as $item)
                    <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->lastname}}</td>
                      <td>{{$item->firstname}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->birthdate}}</td>
                      <td>{{$item->last_signal_date}}</td>
                      <td>{{$item->nbr_of_signals}}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-footer">
               <p></p>
            </div>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        {!! $data->links() !!}
       </div>
    </div>
  </div>
@endsection