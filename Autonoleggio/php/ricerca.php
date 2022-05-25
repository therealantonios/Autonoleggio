
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body background="piastrelle.jpg">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=TUA_CHIAVE_API&callback=initMap"></script>
  <script type="text/javascript" src="gmaps.js"></script>
    <?php
    session_start();
    require_once('database.php');


    if (isset($_POST['cerca'])) {
        $categoria = $_POST['categoria'] ?? '';

        ?><h1 align="left">CATEGORIA:  <?php echo "$categoria";  ?></h1><?php
      #    echo $categoria;
            $query = "
                SELECT nome,marca,cilindrata, prezzo_set, id_auto
                FROM auto
                WHERE categoria = :categoria
            ";

            $check = $pdo->prepare($query);

            $check->bindParam(':categoria', $categoria, PDO::FETCH_ASSOC);

            $check->execute();

            $totale = $check->rowCount();
            ?>
            <table alingn=left border="1">
            <tr alingn ="left"><th> <font color="black">MARCA </font></th><th>NOME</th><th>CILINDRATA</th><th>PREZZO SETTIMANA</th><th>ID_AUTO</th></tr>




            <?php
              while($row = $check->fetch(PDO::FETCH_ASSOC)){

                echo '<tr><td>' . $row['marca'] . '</td><td>' . $row['nome'] . '</td><td>' . $row['cilindrata'] . '</td><td>' . $row['prezzo_set'] . '</td><td>' . $row['id_auto'] . '</td></tr>';

            }
            ?></table><?php


      }


        #printf($msg, '<h3><a href="../login.html">TORNA INDIETRO</a></h3>');



     ?>
     <br>
     <br>

     <form method="post" action="ricerca.php">

         <h1>Inserisci</h1>
         Inserisci id_auto che si vuole noleggiare: <input type="text" id="id_auto" placeholder="id_auto" name="id_auto"><br>
         <br>

         Inserisci la data: <input type="text" id="data_prenotazione" placeholder="data_prenotazione" name="data_prenotazione"><br>
         <br>
         Inserisci il tuo id: <input type="text" id="id" placeholder="id" name="id"><br>
         <br>



         <button type="submit" name="prenota">prenota</button>
     </form>

    <?php
    if (isset($_POST['prenota'])) {
        $auto = $_POST['id_auto'] ?? '';
        $data = $_POST['data_prenotazione'] ?? '';
        $id = $_POST['id'] ?? '';


            $query = "
                INSERT INTO prenotazione ( data_prenotazione, fk_users, fk_auto)
                VALUES ('$data', '$id', '$auto' )
            ";

            $check = $pdo->prepare($query);

            #$check->bindParam(':categoria', $categoria, PDO::FETCH_ASSOC);

            $check->execute();

          header("location: successo.php");
            }



            ?>



  </body>

</html>
