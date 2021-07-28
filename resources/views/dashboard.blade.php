@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Tableau de bord')])
@push("styles")
 <style>
.ct-chart.ct-square .ct-series.ct-series-a .ct-slice-pie  {
   fill:#002827; 
}
.ct-chart.ct-square .ct-series.ct-series-b .ct-slice-pie {
  fill:#00382f;
}
.ct-chart.ct-square .ct-series.ct-series-c  .ct-slice-pie {
  fill: #00591e; 
}
.ct-chart.ct-square .ct-series.ct-series-d .ct-slice-pie {
   fill : #007f00;
}
.ct-chart.ct-square .ct-series.ct-series-e .ct-slice-pie {
  fill : #009900; 

}
.ct-chart.ct-square .ct-series.ct-series-f .ct-slice-pie{
  fill : #00b200; 
}
.ct-chart.ct-square .ct-series.ct-series-g .ct-slice-pie {
   fill: #51ce00;
}
.ct-chart.ct-square .ct-series.ct-series-h .ct-slice-pie{
  fill: #96ff00;
}
.ct-chart.ct-square .ct-series.ct-series-i .ct-slice-pie{
  fill : #ceff00;
} 
</style>
@endpush

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <h3>Statistiques des 2 derniers jours(hier et aujourd'hui)</h3>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a data-toggle="tooltip" title="Cliquer pour voir plus" href="#">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">
                    people
                  </i>
                </div>
                <p class="card-category">Total de profils signalés</p>
                <h3 class="card-title">{{ $stats['NBR_SIGNALED_PROFILES'] }}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <p></p>
                   {{-- <i class="material-icons">date_range</i> du 10/07/2021 au 13/07/2021 --}}
                </div>
              </div>
            </div>
           </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <a data-toggle="tooltip" title="Cliquer pour voir plus" href="#">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              {{-- <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div> --}}
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category ">Total de posts signalés</p>
              <h3 class="card-title">{{ $stats['NBR_SIGNALED_POSTS'] }}</h3>
            </div>
            {{-- <div class="card-footer">
              <div class="stats">
                <p></p>
               <i class="material-icons text-danger">warning</i>
                <a href="#pablo">Plus de détails...</a> 
              </div>
            </div> --}}
            <div class="card-footer">
              <div class="stats">
                <p></p>
                 {{-- <i class="material-icons">date_range</i> du 10/07/2021 au 11/07/2021 --}}
              </div>
            </div>
          </div>
          </a>
        </div>
       
        <div class="col-lg-3 col-md-6 col-sm-6">
            <a data-toggle="tooltip" title="Cliquer pour voir plus" href="#">

            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">
                    feedback
                 </i>
                </div>
                <p class="card-category">Total de topics crées</p>
                <h3 class="card-title">{{ $stats['NBR_CREATED_TOPICS'] }}</h3>
              </div>
              {{-- <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">local_offer</i> Tracked from Github
                </div>
              </div> --}}
              <div class="card-footer">
                <div class="stats">
                  <p></p>
                   {{-- <i class="material-icons">date_range</i> du 10/07/2021 au 15/07/2021 --}}
                </div>
              </div>
            </div>
          </a>
        </div>
      

          <div class="col-lg-3 col-md-6 col-sm-6">
            <a data-toggle="tooltip" title="Cliquer pour voir plus" href="#">

            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">
                    login
                  </i>
                </div>
                <p class="card-category">Total de consultations (nbr sessions ouvertes)</p>
                <h3 class="card-title">{{ $stats['NBR_OPENED_SESSIONS'] }}</h3>
              </div>
              {{-- <div class="card-footer">
                <div class="stats">
                  <p></p>
                 <i class="material-icons">update</i> Just Updated 
                </div>
              </div> --}}
              <div class="card-footer">
                <div class="stats">
                  <p></p>
                   {{-- <i class="material-icons">date_range</i> du 09/07/2021 au 11/07/2021 --}}
                </div>
              </div>
            </div>
          </a>
         </div>
      </div>

      {{-- deuxieme ligne de statistiques tjrs dans les statistiques récentes --}}
      <div class="row">
        
      </div>
      <br/><br/>

      <div class="row">
        <h3 >Statistiques des 7 derniers jours</h3>
      </div>

      <div class="row">
        <button id="show-group-1-stats-btn" class="btn btn-default">
            Afficher les statistiques des 7 derniers jours
            <i id="spinner-stats-group-1" class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="display:none;"></i>
            <span class="sr-only">Loading...</span>
        </button>
      </div>
      <div class="row blur-container" id="group-1-stats-container">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-info">
              <div class="ct-chart" id="signaledProfiles"></div>

            </div>
            <div class="card-body">
              <h4 class="card-title">Profils signalés par jour</h4>
              <p class="card-category">
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-info">
              <div class="ct-chart" id="signaledPosts"></div>    

            </div>
            <div class="card-body">
              <h4 class="card-title">Postes signalés par jour</h4>
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div> 


        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-info">
              <div class="ct-chart" id="topPosts"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Postes de poids >= 100 par jour</h4>
            </div>
            <div class="card-footer">
              <div class="stats">
              </div>
            </div>
          </div>
        </div>

        <a class="btn btn-success" style="color:white;">voir anciennes semaines</a>

      </div>
      {{-- deuxieme ligne des chartes --}}
      <br/><br/><br/>
      <div class="row">
        <button id="show-group-2-stats-btn" class="btn btn-default">
            Afficher les statistiques des 7 derniers jours
            <i id="spinner-stats-group-2" class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="display:none;"></i>
            <span class="sr-only">Loading...</span>
        </button>
      </div>
      <div id="group-2-stats-container" class="row blur-container">
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-info">
              <h4 class="card-title">Intéractions sur le blog</h4>
            </div>
            <div class="card-body">
            
              <div class="ct-chart ct-square" id="postsInteraction"></div> 
            </div>
            <div class="card-footer">
              <p id="interactions-total">Total d'intéractions = N</p>
            </div>
          </div>
        </div> 

        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-info">
              <h4 class="card-title">Contributeurs à l'échange</h4>
              {{-- <div class="ct-chart" id="websiteViewsChart"></div> --}}
            </div>
            <div class="card-body">
              <div class="ct-chart ct-square" id="exchangeContributors"></div> 

              {{-- <p class="card-category">Last Campaign Performance</p> --}}
            </div>
            <div class="card-footer">
              {{-- <div class="stats"> --}}
              <p id="contributors-total">Total de contributeurs = N</p>
                {{-- <a class="btn btn-success" style="color:white;">voir anciennes semaines</a> --}}
  
                {{-- <i class="material-icons">access_time</i> campaign sent 2 days ago --}}
              {{-- </div> --}}
            </div>
          </div>
        </div> 

        <a class="btn btn-success" style="color:white;">voir anciennes semaines</a>

      </div>
      <br><br><br>
      <div class="row">
        <button id="show-last-signaled-posts-profiles-btn" class="btn btn-default">
            Afficher les derniers postes & profils signalés
            {{-- <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> --}}
            <i id="spinner-signals" class="fa fa-circle-o-notch fa-spin fa-3x fa-fw" style="display:none;"></i>
            <span class="sr-only">Loading...</span>
        </button> 
      </div>
      <div class="row blur-container" id="last-signaled-posts-and-profiles-container">
     
        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-danger">
              <h4 class="card-title">Derniers 5 postes signalés</h4>
              {{-- <p class="card-category">New employees on 15th September, 2016</p> --}}
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>ID</th>
                  <th>Titre</th>
                  <th>Contenu</th>
                  <th>Signalé par(dernier signal)</th>
                  <th>Signalé le(dernier signal)</th>
                  <th>Nombre total de signals</th>
                  {{-- <th>Voir plus</th> --}}
                </thead>
                <tbody id="dt-posts">
                  <tr>
                    <td>1</td>
                    <td>test title</td>
                    <td>text</td>
                    <td>nom/prenom signaleur</td>
                    <td>06/04/2020</td>
                    <td>20</td>
                    {{-- <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td> --}}
                  </tr>
                </tbody>
              </table>
            </div>
          <div class="card-footer">
            <a  href="{{route('all-signaled-posts')}}" class="btn btn-success">
               Voir tous
            </a>
          </div>
        </div>


{{-- LAST SIGNALED PROFILES --}}

        <div class="col-lg-6 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Derniers 5 profils signalés</h4>
              {{-- <p class="card-category">New employees on 15th September, 2016</p> --}}
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
                  {{-- <th>Voir plus</th> --}}
                </thead>
                <tbody id="dt-profiles">
                  <tr>
                    <td>1</td>
                    <td>Test nom </td>
                    <td>Test prénom</td>
                    <td>test@email.test</td>
                    <td>06/04/2020</td>
                    <td>06/04/2020</td>
                    <td>30</td>
                    {{-- <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td> --}}
                  </tr>
                      
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <a href="{{route('all-signaled-profiles')}}" class="btn btn-success">
               Voir tous
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('material') }}/js/plugins/chartist-plugin-tooltip.min.js"></script>
  <script type="text/javascript" src="{{ asset("js/statistics/last_7_days_stats_group_1.js") }}"></script>
@endpush