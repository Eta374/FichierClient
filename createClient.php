<?php
$pdo = new PDO('mysql:host=localhost;dbname=fichierClients;port=3306', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_POST) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $codePostal = $_POST['codePostal'];
        $ville = $_POST['ville'];
        $entreprise = $_POST['entreprise'];
        $profession = $_POST['profession'];

            $req1 = $pdo->prepare("
            INSERT INTO Clients(nom,prenom,adresse,codePostal,ville,entreprise,profession)
            VALUES (:nom,:prenom,:adresse,:codePostal,:ville,:entreprise,:profession)
        ");
    
            $req1->execute(array(
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':adresse' => $adresse,
                ':codePostal' => $codePostal,
                ':ville' => $ville,
                ':entreprise' => $entreprise,
                ':profession' => $profession,
            ));

    }

    header('location:index.php');
