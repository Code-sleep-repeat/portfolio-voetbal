
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wijzigen</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <form action="update.php" method="POST">
    <?php include "read.php"?>
    <input type="text" name="voornaam" placeholder="<?php echo $item['voornaam']?>">
        <input type="text" name="tussenvoegsel" placeholder="<?php echo $item['tussenvoegsel']?>">
        <input type="text" name="achternaam" placeholder="<?php echo $item['achternaam']?>"><br>
        <input type="text" name="lidnummer" placeholder="<?php echo $item['lidnummer']?>">
        <input type="text" name="email" placeholder="E-<?php echo $item['email']?>">
        <input type="text" name="soortlid" placeholder="<?php echo $item['soortlid']?>">
        <input type="text" name="geboortedatum" placeholder="<?php echo $item['geboortedatum']?>">
        <input type="text" name="postcode" placeholder="<?php echo $item['postcode']?>">
        <input type="text" name="plaats" placeholder="<?php echo $item['plaats']?>">
        <input type="text" name="telefoonnummer" placeholder="<?php echo $item['telefoonnummer']?>">
        <input type="text" name="mobielnummer" placeholder="<?php echo $item['mobielnummer']?>">
        <input type="text" name="huisnummer" placeholder="<?php echo $item['huisnummer']?>">
    </form>
    
</body>
</html>


<!-- " echo $item['id']?> -->