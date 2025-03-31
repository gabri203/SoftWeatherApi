<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS --><!--viene importata la libreria di bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="icon" href="http://localhost/bootstrap/snowFlake.png" type="image/icon type">
    <title>Sign up</title>
  </head>
  <body>
    <form action = "" method = "post">
            <h2 class="text-center"><strong>Sign up</strong></h2>
            <div class="mb-3 mt-5">

            <label for="exampleInputNome1" name="nome" class="form-label"><strong>Nome</strong></label>
            <input type="nome" name="nome" class="form-control" id="exampleInputNome1" aria-describedby="nomeHelp" placeholder = "Mario">

            <label for="exampleInputCognome1" name="cognome" class="form-label"><strong>Cognome</strong></label>
            <input type="cognome" name="cognome" class="form-control" id="exampleInputCognome1" aria-describedby="cognomeHelp" placeholder = "Rossi">

              <label for="exampleInputEmail1" name="email" class="form-label"><strong>Email</strong></label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder = "email@example.com">
              
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" name="password" class="form-label"><strong>Password</strong></label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder = "••••••••••">
              <?php

// Connessione al database
try {
    $bdd = new PDO('mysql:host=localhost;dbname=testanto;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Errore: ' . $e->getMessage());
}

// Inserimento dati
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Query SQL con parametri
    $sql = "INSERT INTO users (nome,cognome,email,password) VALUES (:nome, :cognome, :email, :password)";
    $stmt = $bdd->prepare($sql); // Prepara la query

    // Esegui la query
    $stmt->execute([
        ':nome' => $nome,
        ':cognome' => $cognome,
        ':email' => $email,//questi sono i parametri da associare alla query come l'email e la password
        ':password' => $password,
    ]);
    echo "Registrazione è andata a buon fine!!/Entra qui per fare Login <a href='http://localhost/bootstrap/login_in.php'>Login In</a>";
}


?>
            </div>
            <button type="submit" class="btn btn-primary">Registrati</button>
          </form>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>