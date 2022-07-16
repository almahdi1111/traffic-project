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
  var PlateType=$("#PlateType :selected").val();
 var Violation=$('#Violation :selected').val();
 var Location=$("#Location :selected").val();
  var StartDate=$("#StartDate").val();
  var EndDate=$("#EndDate").val();
  

  console.log(Violation);
   
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("tableDisplay").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "Paging.php?pagenumber="+pagenumber+"&pageName="+pageName+"&PlateNumber="+ PlateNumber+"&PlateType="+ PlateType+"&Violation="+ Violation+"&Location="+Location+"&StartDate="+ StartDate+"&EndDate="+ EndDate, true);
xhttp.send();


  



}




