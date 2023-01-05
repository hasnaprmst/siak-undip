// fungsi untuk membuat objek XMLHttpRequest
function getXMLHTTPRequest() {
    if (window.XMLHttpRequest) {
      // code for modern browsers
      return new XMLHttpRequest();
    } else {
      // code for old IE browsers
      return new ActiveXObject("Microsoft.XMLHTTP");
    }
  }

// function call ajax
function callAjax() {
    var xmlhttp = getXMLHTTPRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(inner).innerHTML = this.responseText;
        }
        return false;
    }
    xmlhttp.send(null);
}    

// function get request to get_angkatan.php
function getAngkatan(angkatan, inner) {
    var xmlhttp = getXMLHTTPRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const table = document.getElementById(inner);
            const tbody = table.getElementsByTagName('tbody')[0];
            tbody.innerHTML = this.responseText;
        }
        return false;
    }
    xmlhttp.open("GET", "get_angkatan.php?angkatan=" + angkatan, true);
    xmlhttp.send();
}