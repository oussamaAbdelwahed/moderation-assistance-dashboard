function getLastStats(startDate,endDate){
    $.ajax({
        url:"http://localhost:8000/ajax_test1?startDate="+startDate+"&endDate="+endDate,
        type:"GET",
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        //headers: {"CRSF-TOKEN": $("#crsf").text()},
        success: function(data) {
            console.log(data);
        },
        error: function(err){
          console.log(err);
        }
  });
}

$(function(){
    getLastStats("14/07/2021","16/07/2021");
    //$("#btn").on("click",function(){

    //}); 
 });