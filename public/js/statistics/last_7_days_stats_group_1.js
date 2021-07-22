function getLast7DaysStatsGroup1(){
    $.ajax({
        url:$('meta[name="website-base-url"]').attr('content')+"/stats/get-last7days-stats-g1",
        type:"GET",
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(data) {
            //console.log(data);
            prepareDataToLast7DaysStatsGroup1(data);
        },
        error: function(err){
          console.log(err);
        }
  });
}


function prepareDataToLast7DaysStatsGroup1(data){
    var dataSignaledProfiles = {
        labels: Object.keys(data.SIGNALED_PROFILES).map(String).map(val=> moment(val, "YYYY-MM-DD").format("ddd")),
        series: [Object.values(data.SIGNALED_PROFILES).map(Number)]
    };
    var dataSignaledPosts = {
        labels: Object.keys(data.SIGNALED_POSTS).map(String).map(val=> moment(val, "YYYY-MM-DD").format("ddd")),
        series: [Object.values(data.SIGNALED_POSTS).map(Number)]
    };
    var dataTopPosts = {
        labels: Object.keys(data.POSTS_WEIGHTED_OVER_THAN_100).map(String).map(val=> moment(val, "YYYY-MM-DD").format("ddd")),
        series: [Object.values(data.POSTS_WEIGHTED_OVER_THAN_100).map(Number)]
    };
    md.initDashboardPageGroup1Charts(dataSignaledProfiles,dataSignaledPosts,dataTopPosts);
}

$(function(){
  md.initDashboardPageCharts();
  $("#show-group-1-stats-btn").on("click",function(e){
     $("#spinner-stats-group-1").hide();
     $("#spinner-stats-group-1").show();
     var _this = this;
     getLast7DaysStatsGroup1();

     setTimeout(function(){
        $("#group-1-stats-container").removeClass("blur-container");
        $(_this).hide();
     },2000);
     
  });

  $("#show-group-2-stats-btn").on("click",function(e){
    $("#spinner-stats-group-2").hide();
     $("#spinner-stats-group-2").show();
     var _this = this;
     setTimeout(function(){
        $("#group-2-stats-container").removeClass("blur-container");
        $(_this).hide();
     },3000);

  });
 });