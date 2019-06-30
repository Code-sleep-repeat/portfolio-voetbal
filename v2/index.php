<?php
include "lib/connectdb.php";
$sql = 'SELECT * FROM ' . $tablename;
$sth = $db->prepare ($sql);
$sth->execute();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <title>telefoons</title>
</head>
<body>
<main>

<div id="bovenbalk">

  <div id="toevoegen">
    <a id="toevoeg-btn" href="createform.php">
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

  <a id="edit" href="update_form.php">
  <i class="fas fa-edit fa-lg" style="color: #0099cc"> Aanpassen</i>
  </a>

  <div id="streepje">

  </div>
</div>

<div id="streep1">
</div>

    <a href="createform.php"><button>Toevoegen</button></a>
    <table>
    <tr>
            <th>Voornaam</th>
            <th>tussenvoegsel</th>
            <th>achternaam</th>
            <th>Lidnummer</th>

     </tr>

    </thead>
    <tbody>
        <?php while($row= $sth->fetch()) {?>
            <tr>
                <td><?php echo $row["voornaam"];?></td>
                <td><?php echo $row["tussenvoegsel"];?></td>
                <td><?php echo $row["achternaam"];?></td>
                <td><?php echo $row["lidnummer"];?></td>

                <td><a href="update_form.php?lidnummer=<?php echo $row['lidnummer']; ?>"><button>Wijzigen</button></a></td>
                <td><a href="delete.php?lidnummer=<?php echo $row['lidnummer']; ?>"><button>Verwijderen</button></a></td>
              
            </tr>
        <?php } ?>
    </tbody>
    </table>
</body>
</html>