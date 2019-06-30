<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>portfolio</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  </head>
  <body>
    <header>

    </header>
    <main>

      <div id="bovenbalk">

        <div id="toevoegen">
          <a id="toevoeg-btn" href="toevoegen.html">
          <i class="fas fa-user-plus" style="color: green">Toevoegen</i>
          </a>

        <div id="uitloggen">
          <a id="uitlog-btn" href="#">
          <i class="fas fa-sign-out-alt" style="color: green">Uitloggen</i>
          </a>
        </div>

        </div>

        </div>

        <div class="search-box">
    		<input class="search-txt" type="text" name="" placeholder="Zoek een lid...">
    		<a class="search-btn" href="#">
    		<i class="fas fa-search"></i>
    		</a>
    		</div>

      </div>

      <div id="gegevens">
        <b> "adres" </b><br>
        <p>text</p>
        <b> "email" </b><br>
        <p>text</p>
      </div>


      <div id="textblok">
        <b>Acties</b>
        <a id="delete" href="#">
        <i class="fas fa-trash-alt fa-lg" style="color: #cc0000"> Verwijderen</i>
        </a>

        <a id="edit" href="aanpassen.html">
        <i class="fas fa-edit fa-lg" style="color: #0099cc"> Aanpassen</i>
        </a>

        <div id="streepje">

        </div>
      </div>

      <div id="streep1">
      </div>


      <div id="voetbalveld">
        <table>
<?php

$json=file_get_contents("http://localhost/portfolio-voetbal/backend/api/member/read.php/");
$data =  json_decode($json);
$leden = $data->leden;

?>

//html
        <?php foreach ($leden as $lid) : ?>
        <tr onclick='document.location="view.php?id=<?php echo $lid->lidnummer; ?>"'>
            <td>  <?php echo $lid->voornaam; ?></td>
            <td> <?php echo $lid->tussenvoegsel; ?> </td>
            <td> <?php echo $lid->achternaam; ?> </td>
            <td> <?php echo $lid->email; ?> </td>
            <td> <?php echo $lid->lidnummer; ?> </td>
        </tr>
        <?php endforeach; ?>
        </table>
        <div id="logo">
        <img src="logo.png" alt="voetbal logo" width="70" height="40">
        </div>
      </div>

    </main>
    <footer>
    </footer>
  </body>
</html>
