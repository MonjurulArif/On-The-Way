<?php
include_once 'header.php';
?>
  <div id="covid" style=" border-radius: 10pt; text-align: justify-all;  margin-left: 30px; margin-top: 20px; padding:20px; height:280px; width: 500px; background-color: lightgrey; box-shadow: 5px 5px 5px 5px #888888;">
    <center><h3 style="font-size: 25px;">Covid 19 Update</h3></center> 
    <center><h2 style="font-size: 20px;"><span id="datetime" style="color: black;"></span>&nbsp;&nbsp;<span id="currentTime"></span></h2></center>
    <div style="float: left; width: 50%;">
     <p> <strong>Active Cases: </strong> <strong><span id = "active"></span> </strong></p>
     <p><strong>Total Cases: </strong><strong><span id = "cases"></span> </strong></p>
     <p><strong>New Cases: </strong><strong><span id = "newCases"></span> </strong></p>
     <p><strong>Critical Cases: </strong><strong><span id = "critical"></span> </strong></p>
    </div>
    <div>
      <p><strong>New Deaths: </strong><strong><span id = "newDeath"></span> </strong></p>
      <p><strong>Total Deaths: </strong><strong><span id = "death"></span> </strong></p>
      <p><strong>Recovered Cases: </strong><strong><span id = "recovered"></span> </strong></p>
      <p><strong>Total Testes Done: </strong><strong><span id = "tests"></span> </strong></p>
      <p><strong><center>Stay Home, Stay Safe</center></strong></p>
    </div>
  </div>
<div class = "new">
<h1><b>Welcome to Our Community</h1>
<ul>
  <li>Join us for 24/7 service</li>
  <li>Whenever you need us, We are on the way</li>
  <li>Visit our medicine corner and know your medicine better</li>
  <li>Visit our Doctor Corner. Our professional doctors will give you emergency health tips and answer your questions</li>
  <li>Order your emergency Medicine from us and get quickest delivery</li>
  <li>Visit our Blood Bank Corner to get valuable informations about blood banks around you</li>
</ul></b>

</ul>

</div>
<div class="home-footer" style="margin-top: 100px;">
    <h3>Email: ontheway7911@gmail.com <br>Contact: +8801787772338,+8801515652762</h3>
</div>


<style type="text/css">
  body{
    background-image: url("background3.jpg");
     height: 860px;
     width: 1903px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
  }
</style>

<script >
fetch('https://corona.lmao.ninja/v2/countries/Bangladesh')
.then((response) => {
  return response.json();
})
.then((data) => {
  console.log(data);
  document.getElementById("active").innerHTML = data.active.toLocaleString();
  document.getElementById("cases").innerHTML = data.cases.toLocaleString();
  document.getElementById("critical").innerHTML = data.critical.toLocaleString();
  document.getElementById("death").innerHTML = data.deaths.toLocaleString();
  document.getElementById("recovered").innerHTML = data.recovered.toLocaleString();
  document.getElementById("tests").innerHTML = data.tests.toLocaleString();
  document.getElementById("newCases").innerHTML = data.todayCases.toLocaleString();
  document.getElementById("newDeath").innerHTML = data.todayDeaths.toLocaleString();
});
var dt = new Date();
var dt = new Date();
    document.getElementById("datetime").innerHTML = dt.toLocaleDateString();

  clock();  
    function clock() {
    var now = new Date();
    var TwentyFourHour = now.getHours();
    var hour = now.getHours();
    var min = now.getMinutes();
    var sec = now.getSeconds();
    var mid = 'pm';
    if (min < 10) {
      min = "0" + min;
    }
    if (hour > 12) {
      hour = hour - 12;
    }    
    if(hour==0){ 
      hour=12;
    }
    if(TwentyFourHour < 12) {
       mid = 'am';
    }     
  document.getElementById('currentTime').innerHTML =     hour+':'+min+':'+sec +' '+mid ;
    setTimeout(clock, 1000);
    }







</script>



    
