@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Tableau de bord')])
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <h3>Affichage relatif au commentaire</h3>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="card col-lg-6">
          <h5 class="card-header">Featured</h5>
          <div class="card-body">
             <table  class="table table-hover">
                 <thead>
                    {{-- <th>Attribut</th>
                    <th>Valeur</th> --}}
                 </thead>
                 <tbody>
                      <tr>
                        <td><b>Titre</b></td>
                        <td>THe title value</td>
                      </tr>
                      <tr>
                        <td><b>Contenu</b></td>
                        <td>The Content value</td>
                      </tr>
                 </tbody>
             </table>
          </div>
        </div>     
      </div>
    </div>
</div>
@endsection