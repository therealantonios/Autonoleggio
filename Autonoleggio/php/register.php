<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body background="auto2.jpg">

    <?php
    require_once('database.php');

    if (isset($_POST['register'])) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $nome = $_POST['nome'] ?? '';
        $cognome = $_POST['cognome'] ?? '';
        $residenza = $_POST['residenza'] ?? '';
        $CF = $_POST['CF'] ?? '';
        $telefono = $_POST['telefono'] ?? '';

        $isUsernameValid = filter_var(
            $username,
            FILTER_VALIDATE_REGEXP, [
                "options" => [
                    "regexp" => "/^[a-z\d_]{3,20}$/i"
                ]
            ]
        );
        $pwdLenght = mb_strlen($password);

        if (empty($username) || empty($password) || empty($nome) || empty($cognome) || empty($residenza) ||empty($CF) ||empty($telefono)) {
            $msg = 'Compila tutti i campi %s';
        } elseif (false === $isUsernameValid) {
            $msg = 'Lo username non è valido. Sono ammessi solamente caratteri
                    alfanumerici e l\'underscore. Lunghezza minina 3 caratteri.
                    Lunghezza massima 20 caratteri';
        } elseif ($pwdLenght < 8 || $pwdLenght > 20) {
            $msg = 'Lunghezza minima password 8 caratteri.
                    Lunghezza massima 20 caratteri';
        } else {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            $query = "
                SELECT id
                FROM users
                WHERE username = :username
            ";

            $check = $pdo->prepare($query);
            $check->bindParam(':username', $username, PDO::PARAM_STR);
            $check->execute();

            $user = $check->fetchAll(PDO::FETCH_ASSOC);

            if (count($user) > 0) {
                $msg = 'Username già in uso ';
            } else {
                $query = "
                    INSERT INTO users
                    VALUES (0, :username, :password, :nome, :cognome, :residenza, :CF, :telefono)
                ";

                $check = $pdo->prepare($query);
                $check->bindParam(':username', $username, PDO::PARAM_STR);
                $check->bindParam(':password', $password_hash, PDO::PARAM_STR);
                $check->bindParam(':nome', $nome, PDO::PARAM_STR);
                $check->bindParam(':cognome', $cognome, PDO::PARAM_STR);
                $check->bindParam(':residenza', $residenza, PDO::PARAM_STR);
                $check->bindParam(':CF', $CF, PDO::PARAM_STR);
                $check->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $check->execute();

                if ($check->rowCount() > 0) {
                    $msg = 'La registrazione è avvenuta con successo';
                } else {
                    $msg = 'Problemi con l\'inserimento dei dati %s';
                }
            }
        }

        printf("<h3>%s</h3>",$msg);

    }
    ?>
    <br>
    <br>
    <a href="../login.html"><button>VAI AL LOGIN</button></a>
  </body>
</html>
