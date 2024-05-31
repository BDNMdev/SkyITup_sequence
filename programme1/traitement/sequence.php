<?php
    try{
        $bdd = new PDO("mysql:host=localhost;dbname=stage2","root","");
    }catch(Exception $exception){
        die("Erreur: ".$exception->getMessage());
    }
     
    $requette = $bdd->prepare("SELECT MONTH(date) as mois,montant_cdf, taux FROM produits ORDER BY date ;");
    $requette->execute();
    

    $cmoisusd = 0;
    $cmoiscdf = 0;
    $totalcdf = 0;
    $totalusd = 0;
  