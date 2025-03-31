<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="http://localhost/bootstrap/snowFlake.png" type="image/icon type">
    <title>SoftWeather™</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.12/css/weather-icons.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../bootstrap/style_logger.css">
</head>
<body>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom" style="background: #000; ">
      <div class="col-md-3 mb-2 mb-md-0">
  
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none" style="color: #fff;font-size:200%; float: right; margin-right: 2em;">
        <i>❄SoftWeather™</i>
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <div class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0" style="padding-bottom: 0em !important;">
                    <a href="#submenu" class="d-flex align-items-center text-white text-decoration-none" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Gabriel2003</span>
                    </a>
                </div>
      </ul>

    </header>

            <form  method="post" class="form-inline">
            <nav class="navbar-navbar-light-bg-light">
            <h1 style="font-size:370%; margin:10px; color:black; font-family:'Poppins', sans-serif;">❄SoftWeather™</h1>
            <input class="form-control mr-sm-2" name="citta" type="search" placeholder="Cerca citta" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color:#fff;">Cerca</button>
 
</nav>
        </form>
        
            <p align="center" style="color:#000;background:trasparent;"><?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $citta = $_POST["citta"];
    $chiave_api_meteo = "47996ffe2aa2b29f1c8ec2e51cd11207";
    $api_1="https://api.openweathermap.org/data/2.5/weather?q=$citta&units=metric&appid=$chiave_api_meteo";

    $api_data = file_get_contents($api_1);//la funzione file_get_contents mi raccoglie le informazioni in formato json dalla variabile contenente le informazioni richieste tramite la riquiesta http
    

    $weather = json_decode($api_data,true);//la funzione json_decode() mi permette decodificare le informazioni che vengono in formato json e true è perchè di tipo booleana è deve'essere vera

    $descrizione = $weather["weather"][0]["description"];
    $celsius = $weather["main"]["temp"];
    $icon_code = $weather["weather"][0]["icon"];
    
    $longitudine = $weather["coord"]["lon"];
    $latitudine = $weather["coord"]["lat"];
    
    $api_2="https://static-maps.yandex.ru/1.x/?ll=$longitudine,$latitudine&z=12&l=map&pt=$longitudine,$latitudine,pm2rdl";
    
    ?></p>
    <div class="weather-card">
                <h2 style="font-size: 3rem; margin:10px; color:black; font-family:'Poppins', sans-serif;"><?= htmlspecialchars($citta) ?></h2><!--la funzione htmlspecialchars() serve per inserire i caratteri speciali da php dentro html-->
                
                <div class="weather-icon">
                    <?php
                     echo $descrizione;
                     echo "<br>";
                    // Assegnazione icona con if-else
                    if($icon_code == '01d') {
                        echo '<i class="wi wi-day-sunny"></i>';
                    } 
                    elseif($icon_code == '01n') {
                        echo '<i class="wi wi-moon-alt-new"></i>';
                    }
                    elseif($icon_code == '02d') {
                        echo '<i class="wi wi-day-cloudy"></i>';
                    }
                    elseif($icon_code == '02n') {
                        echo '<i class="wi wi-night-alt-cloudy"></i>';
                    }
                    elseif($icon_code == '03d' || $icon_code == '03n') {
                        echo '<i class="wi wi-cloud"></i>';
                    }
                    elseif($icon_code == '04d' || $icon_code == '04n') {
                        echo '<i class="wi wi-cloudy"></i>';
                    }
                    elseif($icon_code == '09d' || $icon_code == '09n') {
                        echo '<i class="wi wi-showers"></i>';
                    }
                    elseif($icon_code == '10d') {
                        echo '<i class="wi wi-day-showers"></i>';
                    }
                    elseif($icon_code == '10n') {
                        echo '<i class="wi wi-night-alt-showers"></i>';
                    }
                    elseif($icon_code == '11d' || $icon_code == '11n') {
                        echo '<i class="wi wi-thunderstorm"></i>';
                    }
                    elseif($icon_code == '13d' || $icon_code == '13n') {
                        echo '<i class="wi wi-snow"></i>';
                    }
                    elseif($icon_code == '50d') {
                        echo '<i class="wi wi-day-fog"></i>';
                    }
                    elseif($icon_code == '50n') {
                        echo '<i class="wi wi-night-fog"></i>';
                    }
                    else {
                        echo '<i class="fas fa-question-circle"></i>';
                    }
                   
                    echo "<br>";
                    echo  $celsius."°C";
                    echo "<br>";
    echo "<img src='$api_2' style='width: 400px; height: 300px;'>";
   

}
    ?>
                </div>  

     </section>
    <!-- Sidebar -->
    <nav id="sidebar">
       

        <ul class="list-unstyled components" style="margin-top: 13em;">
           
            <li class="inactive">
                <a  href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="without">
                    <span class="icon" style="float: left;"><i class="fas fa-home"></i></span>
                    Home
                </a>
            </li>
            <li>
                <a href="#Mappa" class="without">
                    <span class="icon" style="float: left;"><i class="fas fa-map"></i></span>
                    Map
                </a>
            </li>
            <li>
                <a class="without" href="#weatherSubmenu" data-toggle="collapse" aria-expanded="false">
                    <span class="icon" style="float: left;"><i class="fa-solid fa-cloud-sun-rain"></i></span>
                    Weather
                </a>
            </li>
            <li>
                <a class="without" href="#profileSubmenu" aria-expanded="false" >
                    <span class="icon" ><i class="fas fa-user"></i></span>
                    Profile
                </a>
                
            </li>
            <li>
                <a href="#logout" class="without" style="margin-top: 9em;">
                    <span class="icon" style="float: left;"><i class="fas fa-sign-out-alt"></i></span>
                    Logout
                </a>
            </li>
        </ul>
    </nav>
    <!-- footer -->
<div class="container-my-5 "style="margin-top: 8em;">

  <footer class="text-center">
  <!-- Grid container -->
  <div class="container pt-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-link btn-floating btn-lg text-black m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

      <!-- Twitter -->
      <a class="btn btn-link btn-floating btn-lg text-black m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

      <!-- Google -->
      <a class="btn btn-link btn-floating btn-lg text-black m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

      <!-- Instagram -->
      <a class="btn btn-link btn-floating btn-lg text-black m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

      <!-- Linkedin -->
      <a class="btn btn-link btn-floating btn-lg text-black m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
      <!-- Github -->
      <a class="btn btn-link btn-floating btn-lg text-black m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
    </section>
  </div>
  <div class="text-black">
    © 2020 Copyright:
    <a class="text-black" href="https://mdbootstrap.com/"><strong>SoftWeather™.com</strong>-Powered by <strong>OpenWeatherApi</strong></a>
  </div>
  <!-- Copyright -->
</footer>
  
</div>

</body>
</html>
