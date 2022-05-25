<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

  </head>

   <body background="auto3.jpg">
    <?php
    session_start();

    if (isset($_SESSION['session_id'])) {
        $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
        $session_name = htmlspecialchars($_SESSION['session_name'], ENT_QUOTES, 'UTF-8');
        $session_surname = htmlspecialchars($_SESSION['session_surname'], ENT_QUOTES, 'UTF-8');
        $session_residenza = htmlspecialchars($_SESSION['session_residenza'], ENT_QUOTES, 'UTF-8');
        $session_id = htmlspecialchars($_SESSION['session_id'], ENT_QUOTES, 'UTF-8');
        $id = htmlspecialchars($_SESSION['session_id_utente'], ENT_QUOTES, 'UTF-8');

        printf("<h3>Benvenuto/a %s, il tuo session ID è %s</h3>", $session_user, $session_id);
        echo "<br>";

    } else {
        printf("Effettua il %s per accedere all'area riservata", '<a href="../login.html">login</a>');
    }
    ?>
    <h2><p align=center>SEI ENTRATO NELLA TUA AREA PRIVATA </p></h2><br>
    <h3><p align=left><font color="white">IL TUO ACCOUNT </font></p></h3>
    <h3><p align=center><font color="white">SCEGLI LA TIPOLOGIA E VERIFICA LA DISPONIBILITA </font></p></h3>

    <form  action="ricerca.php" method="post" align="center" width="360">
      <select  name="categoria" >
        <option value="utilitaria" id="utilitaria">utilitaria</option>
        <option value="berlina" id="berlina">berlina</option>
        <option value="suv" id="suv">suv</option>
        <option value="compatte" id="compatte">compatte</option>
      </select>
      <input type="submit" name="cerca" value="CERCA">

    </form>

    <table alingn=left border="3" >
      <tr><td><p><font color="gold">NOME:</font></p></td><td><p><font color="	gold"> <?php printf("%s", $session_name); ?></font></p></td></tr>
      <tr><td><p><font color="gold">COGNOME:</font></p></td><td><p><font color="	gold"><?php printf("%s", $session_surname); ?></font></p></td></tr>
      <tr><td><p><font color="gold">RESIDENZA:</font></p></td><td><p><font color="	gold"><?php printf("%s", $session_residenza); ?></font></p></td></tr>
      <tr><td><p><font color="gold">ID:</font></p></td><td><p><font color="	gold"><?php printf("%s", $id); ?></font></p></td></tr>

    </table>





  <?php printf("<h4>%s</h4>", '<a href="logout.php">LOGOUT</a>');
  ?>




  </body>
</html>
