<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306','root',''); 
$sql = "CREATE DATABASE IF NOT EXISTS `fichierClients` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);

try{
    $pdo = new PDO('mysql:host=localhost;dbname=fichierClients;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    //Création de la table clients
    $req1 = "CREATE TABLE IF NOT EXISTS `fichierClients`.`clients`(
        `idClient` INT NOT NULL AUTO_INCREMENT,
        `nom` VARCHAR(100),
        `prenom` VARCHAR(100),
        `adresse` VARCHAR(100),
        `codePostal` VARCHAR(100),
        `ville` VARCHAR(100),
        `entreprise` VARCHAR(100),
        `profession` VARCHAR(100),
        `dateCreation` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
        PRIMARY KEY(idClient));";

    $pdo->exec($req1);   
    
}
  catch (PDOException $e){
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
 }
