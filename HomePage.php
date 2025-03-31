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
    <link rel="stylesheet" type="text/css" media="screen" href="../bootstrap/style_homePage.css">
</head>
<body>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom" style="background: #000; ">
      <div class="col-md-3 mb-2 mb-md-0">
  
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none" style="color: #fff;font-size:200%; float: right; margin-right: 2em;">
        ❄SoftWeather™
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary" style="color: #fff">Home</a></li>
        <li><a href="#" class="nav-link px-2" style="color: #fff">Mappa</a></li>
        <li><a href="#" class="nav-link px-2" style="color: #fff">Weather</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2" style="float: right;">Sign up</button>
        <button type="button" class="btn btn-primary" style="float: right; background: linear-gradient(90deg, #1c5f97,rgb(0, 174, 255))">Login</button>
      </div>
    </header>

            <form  method="post" class="form-inline">
            <nav class="navbar-navbar-light-bg-light">
            <h1 style="font-size:350%;">❄SoftWeather™</h1>
            <input class="form-control mr-sm-2" name="citta" type="search" placeholder="Cerca citta" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
        </nav>
        </form>
        
            <p align="center" style="color:#000;background:trasparent;"><?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $citta = $_POST["citta"];
    $chiave_api = "47996ffe2aa2b29f1c8ec2e51cd11207";
    $api="https://api.openweathermap.org/data/2.5/weather?q=$citta&units=metric&appid=$chiave_api";
    $api_data = file_get_contents($api);//la funzione file_get_contents mi raccoglie le informazioni in formato json dalla variabile contenente le informazioni richieste tramite la riquiesta http
 

    $weather = json_decode($api_data,true);//la funzione json_decode() mi permette decodificare le informazioni che vengono in formato json e true è perchè di tipo booleana è deve'essere vera

    $celsius = $weather["main"]["temp"];// Poi creo una variabile $celcius che andrà a prendere nella tabella "main" la "temp" che sarebbe temperatura all'interno delle informazioni json
    $descrizione =$weather["weather"][0]["description"];

            echo $descrizione;//qui vado ad stampare le informazioni già decodificate dicendo che voglio solo stampare il clima e la descrizione del clima
            echo "<br>";//<br> per la separazione
            echo $celsius . "°C";//stampo la varibile $celcius= temperatura


}
?></p>
            
            
            
     </section>
    <!-- Sidebar -->
    <nav id="sidebar">
       

        <ul class="list-unstyled components" style="margin-top: 15em;">
           
            <li class="inactive">
                <a  href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="without">
                    <span class="icon" style="float: left;"><i class="fas fa-home"></i></span>
                    Home
                </a>
            </li>
            <li>
                <a href="#Mappa" class="without">
                    <span class="icon" style="float: left;"><i class="fas fa-map"></i></span>
                    Mappa
                </a>
            </li>
            <li>
                <a class="without" href="#weatherSubmenu"  aria-expanded="false">
                    <span class="icon" style="float: left;"><i class="fa-solid fa-cloud-sun-rain"></i></span>
                    Weather
                </a>
            </li>
        </ul>
    </nav>
<!-- Mappa -->
 <div class="containerr" style="margin-top: -10.8em; ">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48235.31501347604!2d14.795143699999999!3d40.922165699999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x133bcc55125ad8dd%3A0xa1275dba604eda!2s83100%20Avellino%20AV!5e0!3m2!1sit!2sit!4v1743004326159!5m2!1sit!2sit" width="450" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
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
<!-- End of .container --><script type="text/javascript" src="https://mdbootstrap.com/api/snippets/static/download/MDB5-Free_8.2.0/js/mdb.umd.min.js"></script><script type="text/javascript">{}</script></body>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
