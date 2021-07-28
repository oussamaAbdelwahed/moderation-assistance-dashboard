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


function getLast7DaysStatsGroup2(){
    $.ajax({
        url:$('meta[name="website-base-url"]').attr('content')+"/stats/get-last7days-stats-g2",
        type:"GET",
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(data) {
           prepareDataToLast7DaysStatsGroup2(data);
        },
        error: function(err){
          console.log(err);
        }
  });  
}

function getLastSignaledPostsAndProfilesGroup3Stats(n){
      $.ajax({
        url:$('meta[name="website-base-url"]').attr('content')+"/stats/get-last-signaled-posts-and-profiles-stats-g3?n="+n,
        type:"GET",
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(data) {
            prepareDataToLastSignaledPostsAndProfilesGroup3DataTables(data);
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

function prepareDataToLast7DaysStatsGroup2(data){
    var keys = Object.keys(data);
    var mapper ={
        "C_I1":"nbr de commentaires",
        "C_I2":"nbr de signals de postes",
        "C_I3":"nbr de signals de profils",
        "C_I4":"nbr de postes",
        "C_I5":"nbr de topics",
        "C_I6":"nbr de votes poids",

        "C_P1":"nbr de publicataires des postes",
        "C_P2":"nbr de commentateurs",
        "C_P3":"nbr de signaleurs de postes",
        "C_P4":"nbr de signaleurs de profils",
        "C_P5":"nbr de créateurs de topics",
        "C_P6":"nbr de voteurs de poids"
    };
    
    var dataInteractions = {
        series: []
    };

    var dataContributors = {
        series: []
    };

    keys.forEach(element => {
      if(element.includes("I")){
        dataInteractions.series.push({meta:mapper[element],value:data[element]});
      }else if(element.includes("P")){
        dataContributors.series.push({meta:mapper[element],value:data[element]});
      }
    });

    md.initDashboardPageGroup2Charts(dataInteractions,dataContributors);
}

function prepareDataToLastSignaledPostsAndProfilesGroup3DataTables(data){
   var postsDT=  $("#dt-posts");
   var profilesDT=  $("#dt-profiles");
   postsDT.empty();
   profilesDT.empty();
   if(Array.isArray(data)){
      var size = data.length;
      var middle = size / 2;

      for(var i=0;i<middle;i++){
        renderRowForPostsDT(postsDT,data[i]);
      }
      for(var i=middle;i<size;i++){
        renderRowForProfilesDT(profilesDT,data[i]);
      }
   }else{
       //clear up the data table with so 0 records
   }
}

function renderRowForPostsDT(domParent,data){
   var diff = moment().diff(moment(data['LAST_SIGNAL_AT'],'YYYY-MM-DD hh:mm:ss'),"days");
   var domElement = $("<tr/>").append(
      $("<td/>",{text:data['C1']})
   ).append(
      $("<td/>",{text:data['C2']})
   ).append(
      $("<td/>",{text:data['C3']})
   ).append(
      $("<td/>",{text:data['C4']+' '+data['C5']})
   ).append(
       diff == 0 ? 
         $("<td/>",{css:{color:"green"},text: "Aujourd'hui ("+data['LAST_SIGNAL_AT']+")"})
       :
         $("<td/>",{text:data['LAST_SIGNAL_AT']})

   ).append(
      $("<td/>",{text:data['NBR_OF_SIGNALS']})
   );
   domParent.append(domElement);
}

function renderRowForProfilesDT(domParent,data){
   var diff = moment().diff(moment(data['LAST_SIGNAL_AT'],'YYYY-MM-DD hh:mm:ss'),"days");

   var domElement = $("<tr/>").append(
      $("<td/>",{text:data['C1']})
   ).append(
      $("<td/>",{text:data['C3']})
   ).append(
      $("<td/>",{text:data['C2']})
   ).append(
      $("<td/>",{text:data['C4']})
   ).append(
      $("<td/>",{text:data['C5']})
   ).append(
        diff == 0 ? 
         $("<td/>",{css:{color:"green"},text: "Aujourd'hui ("+data['LAST_SIGNAL_AT']+")"})
       :
         $("<td/>",{text:data['LAST_SIGNAL_AT']})
   ).append(
      $("<td/>",{text:data['NBR_OF_SIGNALS']})
   );
   domParent.append(domElement);  
}

$(function(){
  md.initDashboardPageCharts();
  $("#show-group-1-stats-btn").on("click",function(e){
     $("#spinner-stats-group-1").show();
     var _this = this;
     getLast7DaysStatsGroup1();

     setTimeout(function(){
        $("#group-1-stats-container").removeClass("blur-container");
        $(_this).hide();
     },500);
     
  });

  $("#show-group-2-stats-btn").on("click",function(e){
     $("#spinner-stats-group-2").show();
     var _this = this;
     getLast7DaysStatsGroup2();
     setTimeout(function(){
        $("#group-2-stats-container").removeClass("blur-container");
        $(_this).hide();
     },500);

  });


  //showing last signaled posts & profiles
  $("#show-last-signaled-posts-profiles-btn").on("click",function(e){
     $("#spinner-signals").show();
     var _this = this;
     getLastSignaledPostsAndProfilesGroup3Stats(5);
     setTimeout(function(){
        $("#last-signaled-posts-and-profiles-container").removeClass("blur-container");
        $(_this).hide();
     },500);
  });


 });