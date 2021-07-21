@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Tableau de bord')])

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
                   <i class="material-icons">date_range</i> du 10/07/2021 au 13/07/2021
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
                 <i class="material-icons">date_range</i> du 10/07/2021 au 11/07/2021
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
                   <i class="material-icons">date_range</i> du 10/07/2021 au 15/07/2021
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
                   <i class="material-icons">date_range</i> du 09/07/2021 au 11/07/2021
                </div>
              </div>
            </div>
          </a>
         </div>
      </div>

      {{-- deuxieme ligne de statistiques tjrs dans les statistiques récentes --}}
      <div class="row">
        {{-- here  --}}
        {{-- 
          <div class="col-lg-3 col-md-6 col-sm-6">
            <a data-toggle="tooltip" title="Cliquer pour voir plus" href="#">

            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">info_outline</i><i class="material-icons">
                    people
                  </i>
                </div>
                <p class="card-category">Total de topics crées</p>
                <h3 class="card-title">6</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">local_offer</i> Tracked from Github
                </div>
              </div>
            </div>
          </a>
          </div>
      

          <div class="col-lg-3 col-md-6 col-sm-6">
            <a data-toggle="tooltip" title="Cliquer pour voir plus" href="#">

            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">
                    feedback
                </i><i class="material-icons">
                    people
                  </i>
                </div>
                <p class="card-category">Total d'utilisateurs qui signalent les commentaires</p>
                <h3 class="card-title">34</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <p></p>
                   <i class="material-icons">update</i> Just Updated 
                </div>
              </div>
            </div>
          </a>
         </div>          
        --}}
      </div>

      <div class="row">
        <h3>Statistiques par jour de la semaine</h3>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-info">
              {{-- <div class="ct-chart" id="dailySalesChart"></div> --}}
              <div class="ct-chart" id="signaledProfiles"></div>

            </div>
            <div class="card-body">
              <h4 class="card-title">Profils signalés par jour</h4>
              <p class="card-category">
                {{-- <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p> --}}
            </div>
            <div class="card-footer">
              <div class="stats">
                <a class="btn btn-success" style="color:white;">voir anciennes semaines</a>
                {{-- <i class="material-icons">access_time</i> updated 4 minutes ago --}}
              </div>
            </div>
          </div>
        </div>

      <div class="col-md-4">
        <div class="card card-chart">
          <div class="card-header card-header-info">
            {{-- <div class="ct-chart" id="websiteViewsChart"></div> --}}
            <div class="ct-chart" id="signaledPosts"></div> 
          </div>
          <div class="card-body">
            <h4 class="card-title">Postes signalés par jour</h4>
            {{-- <p class="card-category">Last Campaign Performance</p> --}}
          </div>
          <div class="card-footer">
            <div class="stats">
              <a class="btn btn-success" style="color:white;">voir anciennes semaines</a>

              {{-- <i class="material-icons">access_time</i> campaign sent 2 days ago --}}
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
            {{-- <p class="card-category">Last Campaign Performance</p> --}}
          </div>
          <div class="card-footer">
            <div class="stats">
              <a class="btn btn-success" style="color:white;">voir anciennes semaines</a>

              {{-- <i class="material-icons">access_time</i> campaign sent 2 days ago --}}
            </div>
          </div>
        </div>
      </div>

      </div>
      {{-- deuxieme ligne des chartes --}}
      
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-info">
              {{-- <div class="ct-chart" id="websiteViewsChart"></div> --}}
              <div class="ct-chart" id="postsInteraction"></div> 
            </div>
            <div class="card-body">
              <h4 class="card-title">Intéractions avec les postes par jour</h4>
              {{-- <p class="card-category">Last Campaign Performance</p> --}}
            </div>
            <div class="card-footer">
              <div class="stats">
                <a class="btn btn-success" style="color:white;">voir anciennes semaines</a>
  
                {{-- <i class="material-icons">access_time</i> campaign sent 2 days ago --}}
              </div>
            </div>
          </div>
        </div> 

        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-info">
              {{-- <div class="ct-chart" id="websiteViewsChart"></div> --}}
              <div class="ct-chart" id="exchangeContributors"></div> 
            </div>
            <div class="card-body">
              <h4 class="card-title">Contributions à l'échange par jour</h4>
              {{-- <p class="card-category">Last Campaign Performance</p> --}}
            </div>
            <div class="card-footer">
              <div class="stats">
                <a class="btn btn-success" style="color:white;">voir anciennes semaines</a>
  
                {{-- <i class="material-icons">access_time</i> campaign sent 2 days ago --}}
              </div>
            </div>
          </div>
        </div> 


      </div>
      
      <div class="row">
     
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
                  <th>Posté le</th>
                  <th>Signalé le</th>
                  <th>Voir plus</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>text</td>
                    <td>06/04/2020</td>
                    <td>06/04/2020</td>
                    <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Minerva Hooper</td>
                    <td>text</td>
                    <td>06/04/2020</td>
                    <td>06/04/2020</td>
                    <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Sage Rodriguez</td>
                    <td>text</td>
                    <td>06/04/2020</td>
                    <td>06/04/2020</td>
                    <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Philip Chaney</td>
                    <td>text</td>
                    <td>06/04/2020</td>
                    <td>06/04/2020</td>
                    <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>ABATA</td>
                    <td>text</td>
                    <td>06/04/2020</td>
                    <td>06/04/2020</td>
                    <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-success">
               Voir tous
            </button>
          </div>
        </div>







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
                  <th>Sex</th>
                  <th>Age</th>
                  <th>Signalé le</th>
                  <th>Voir plus</th>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>1</td>
                    <td>Contenu</td>
                    <td>06/04/2020</td>
                    <td>06/04/2020</td>
                    <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>1</td>
                    <td>Contenu</td>
                    <td>06/04/2020</td>
                    <td>06/04/2020</td>
                    <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>1</td>
                    <td>Contenu</td>
                    <td>06/04/2020</td>
                    <td>06/04/2020</td>
                    <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>1</td>
                    <td>Contenu</td>
                    <td>06/04/2020</td>
                    <td>06/04/2020</td>
                    <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Dakota Rice</td>
                    <td>1</td>
                    <td>Contenu</td>
                    <td>06/04/2020</td>
                    <td>06/04/2020</td>
                    <td>
                      <a href="">
                        <i class="material-icons">
                          more_vert
                        </i>
                      </a>
                    </td>
                  </tr>                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button class="btn btn-success">
               Voir tous
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script src="{{ asset('material') }}/js/plugins/chartist-plugin-tooltip.min.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush