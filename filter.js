


  function GetMonitoringData(str) {
    var xhttp;
    if (str == null) {
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("tableViolation").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "GetMonitoringData.php?q="+str, true);
    xhttp.send();

    
}


function searchFilter(pagenumber) {
  pagenumber = pagenumber?pagenumber:0;

  var keywords = $('#keywords').val();

  var filterBy = $('#filterBy').val();
  $.ajax({
      type: 'POST',
      url: 'getData.php',
      data:'page='+page_num+'&keywords='+keywords+'&filterBy='+filterBy,
      beforeSend: function () {
          $('.loading-overlay').show();
      },
      success: function (html) {
          $('#dataContainer').html(html);
          $('.loading-overlay').fadeOut("slow");
      }
  });
}

function setdate(pageName)
{
  var StartDate=$("#StartDate").val();
  document.getElementById("EndDate").value=StartDate;
  paging(0,pageName);
}
function paging(pagenumber,pageName) {
  var xhttp;
  
  
  var PlateNumber= $("#PlateNumber").val();
  var PlateType=$("#PlateType").val();
 var Violation=$('#Violation').val();
  var StartDate=$("#StartDate").val();
  var EndDate=$("#EndDate").val();
  

  
   
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("tableDisplay").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "Paging.php?pagenumber="+pagenumber+"&pageName="+pageName+"&PlateNumber="+ PlateNumber+"&PlateType="+ PlateType+"&Violation="+ Violation+"&StartDate="+ StartDate+"&EndDate="+ EndDate, true);
  setInterval(function() {
    xhttp.send();

}, 100);
  



}




