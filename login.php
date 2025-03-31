<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS --><!--viene importata la libreria di bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="../bootstrap/style.css" rel="stylesheet" >
    <link rel="icon" href="http://localhost/bootstrap/snowFlake.png" type="image/icon type">
    <title>Login</title>
  </head>
  <body>
        <form  action = "" method = "post">
        <h2 class="text-center"><strong>❄SoftWeather™</strong></h2>
              <div class="mb-4 mt-5">
              <label for="exampleInputEmail1" class="form-label"><strong>Email</strong></label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "email@example.com">
              <div id="emailHelp" class="form-text">Non sei ancora registrato?<a href="http://localhost/bootstrap/Sign_up.php"> Registrati/Sign up</a></div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1"  class="form-label"><strong>Password</strong></label>
              <input type="password" class="form-control" name="password" aria-describedby="passwordHelp" id="exampleInputPassword1" placeholder = "••••••••••">
            </div>
            
            <button type="conferma" class="btn btn-primary">Conferma</button>
            <?php
// Connessione al database
try {
    $bdd = new PDO('mysql:host=localhost;dbname=testanto;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Errore: ' . $e->getMessage());
}

// Inserimento dati
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];//password inserita dall'utente

    // Query SQL con parametri
    $sql = "SELECT id, password FROM users WHERE email = :email";
    $stmt = $bdd->prepare($sql); // Prepara la query presa da $sql
    $stmt -> execute([':email' => $email  ]);  ////questi sono i parametri da associare alla query come l'email e la password

    $user = $stmt->fetch();//user contiene tutta la riga poichè se l'è andata a prendere con il metodo o sottoclasse fetch()
    if($user&&password_verify($password, $user['password'])){//la funzione $password_verify() confronta la $password inserita dall'utente e la password dentro il data base $user['password']
        header("Location: http://localhost/bootstrap/logger.php");//la funzione header('Location: logger.php') si attiva appena ho fatto il confronto tra i dati inseriti nel login
        // con quelli nel data base , e se i dati confrontati sono corretti mi attiva la funzione header('Location: logger.php')
        //  che mi porta nel file logger.php con le informazioni dell'utente
        exit();
    }else{
      echo "Email o password sbagliata riprova di nuovo <a href='http://localhost/bootstrap/login_in.php'>Riprova di nuovo</a>";
    }
}
?>
          </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

