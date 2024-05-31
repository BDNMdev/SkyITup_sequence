<?php
include_once("traitement/sequence.php");
include_once("traitement/mois.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/style.css">
  <title>Trafic</title>
</head>

<body>
  <table>
    <tr>
      <th>Mois</th>
      <th>Montant CDF</th>
      <th>Montant USD</th>
      <th>Taux</th>
    </tr>
    <?php
    for ($i = 0; $i < count($produits); $i++) {
      $smois = $produits[$i]["mois"];
      $mois = $produits[$i]["mois"];
      $mcdf = $produits[$i]["sommes"];
      $musd = $produits[$i]["sommes"] / $produits[$i]["taux"];
      if ($smois == $mois){ 

        $totalcdf += $mcdf;
        $totalusd += $musd;
    ?>
        <tr>
          <td><?= $name_mois[$mois - 1] ?></td>
          <td><?= $mcdf; ?></td>
          <td><?= $musd; ?></td>
          <td><?= $produits[$i]["taux"]; ?></td>
        </tr>
    <?php
      } else { 
        $totalcdf = 0;
        $totalusd = 0;
        $smois = $mois;
      }
    }
    ?>
    <tr class="total">
      <td colspan="1"></td>
      <td colspan="1"><?= $totalcdf; ?></td>
      <td colspan="1"><?= $totalusd; ?></td>
      <td colspan="1"></td>
    </tr>
  </table>
</body>

</html>