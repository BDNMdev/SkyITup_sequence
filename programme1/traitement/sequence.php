<?php
    try{
        $bdd = new PDO("mysql:host=localhost;dbname=stage2","root","");
    }catch(Exception $exception){
        die("Erreur: ".$exception->getMessage());
    }
     
    $requette = $bdd->prepare("SELECT MONTH(date) as mois,SUM(montant_cdf) as sommes, taux FROM produits GROUP BY MONTH(date) ORDER BY date ;");
    $requette->execute();
    $produits = $requette->fetchAll();

    $cmoisusd = 0;
    $cmoiscdf = 0;
    $totalcdf = 0;
    $totalusd = 0;
  