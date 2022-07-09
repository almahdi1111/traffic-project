function GetViolationData(str) {
  var xhttp;
  if (str == null) {
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("DataTable").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "GetViolationData.php?q="+str, true);
  xhttp.send();
}


  function GetMonitoringData(str) {
    var xhttp;
    if (str == null) {
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("DataTableMonitoring").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "GetMonitoringData.php?q="+str, true);
    xhttp.send();

    
}
