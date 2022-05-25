<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body bgcolor=red text="ff0000">




    <?php
    session_start();
    require_once('database.php');



    if (isset($_POST['login'])) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $nome = $_POST['nome'] ?? '';
        $cognome = $_POST['cognome'] ?? '';
        $residenza = $_POST['residenza'] ?? '';
        $id = $_POST['id'] ?? '';


        if (empty($username) || empty($password)) {
            $msg = 'Inserisci username e password %s';
        } else {
            $query = "
                SELECT id, username,password,nome,cognome,residenza
                FROM users
                WHERE username = :username
            ";

            $check = $pdo->prepare($query);
            $check->bindParam(':username', $username, PDO::PARAM_STR);

            $check->execute();

            $user = $check->fetch(PDO::FETCH_ASSOC);

            if (!$user || password_verify($password, $user['password']) === false) {
                $msg = 'Credenziali utente errate %s';
            } else {
                session_regenerate_id();
                $_SESSION['session_id'] = session_id();
                $_SESSION['session_user'] = $user['username'];
                $_SESSION['session_name'] = $user['nome'];
                $_SESSION['session_surname'] = $user['cognome'];
                $_SESSION['session_residenza'] = $user['residenza'];
                $_SESSION['session_id_utente'] = $user['id'];
                
                header('Location: dashboard.php');
                exit;
            }
        }

        printf($msg, '<h3><a href="../login.html">TORNA INDIETRO</a></h3>');
    }
    ?>
  </body>
</html>
