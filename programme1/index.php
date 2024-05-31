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
    $smois = null;
    $totalcdfMois = 0;
    $totalusdMois = 0;
    $grandTotalCDF = 0;
    $grandTotalUSD = 0;
    $taux = 0;

    while($produits = $requette->fetch()) {
      $mois = $produits["mois"];
      $mcdf = $produits["montant_cdf"];
      $musd = $mcdf / $produits["taux"];
      $taux = $produits["taux"];

      if ($smois !== $mois) {
        if ($smois !== null) {
    ?>
        <tr class="total-mois">
          <td colspan="1"><?= $name_mois[$smois - 1]; ?></td>
          <td colspan="1"><?= $totalcdfMois; ?></td>
          <td colspan="1"><?= $totalusdMois; ?></td>
          <td colspan="1"><?= $produits["taux"]; ?></td>
        </tr>
    <?php
          $totalcdfMois = 0;
          $totalusdMois = 0;
        }
        $smois = $mois;
      }

      $totalcdfMois += $mcdf;
      $totalusdMois += $musd;

      $grandTotalCDF += $mcdf;
      $grandTotalUSD += $musd;

    }

    if ($smois !== null) {
    ?>
    <tr class="total-mois">
      <td colspan="1"><?= $name_mois[$smois - 1]; ?></td>
      <td colspan="1"><?= $totalcdfMois; ?></td>
      <td colspan="1"><?= $totalusdMois; ?></td>
      <td colspan="1"><?= $taux; ?></td>
    </tr>
    <?php
    }
    ?>
    <tr class="total">
      <td colspan="1">TOTAL</td>
      <td colspan="1"><?= $grandTotalCDF; ?></td>
      <td colspan="1"><?= $grandTotalUSD; ?></td>
      <td colspan="1"></td>
    </tr>
  </table>
</body>

</html>
