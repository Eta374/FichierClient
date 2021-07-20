<?php

$pdo = new PDO('mysql:host=localhost;dbname=fichierClients;port=3306', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req1 = $pdo->prepare("SELECT * FROM clients");
$req1->execute();
$clients = $req1->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichier Clients</title>
</head>
<body>
    <form action="createClient.php" method="post">
        <input type="text" name="nom" placeholder="nom">
        <input type="text" name="prenom" placeholder="prenom">
        <input type="text" name="adresse" placeholder="adresse">
        <input type="text" name="codePostal" placeholder="codePostal">
        <input type="text" name="ville" placeholder="ville">
        <input type="text" name="entreprise" placeholder="entreprise">
        <input type="text" name="profession" placeholder="profession">
        <input type="submit" value="Créer un client" placeholder="">
    </form>

    <!--Après le formulaire-->
    <section class="listProd">
        <table>
            <thead>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Code Postal</th>
                <th>Ville</th>
                <th>Entreprise</th>
                <th>Profession</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </thead>
            <tbody>
                <?php
                foreach ($clients as $key => $value) {
                ?>

                    <tr>
                        <td><?php echo $value['nom'] ?></td>
                        <td><?php echo $value['prenom'] ?></td>
                        <td><?php echo $value['adresse'] ?></td>
                        <td><?php echo $value['codePostal'] ?></td>
                        <td><?php echo $value['ville'] ?></td>
                        <td><?php echo $value['entreprise'] ?></td>
                        <td><?php echo $value['profession'] ?></td>
                        <td><a href="updateClient.php?id=<?php echo $value['idClient'] ?>">modifier</a></td>
                        <td><a href="deleteClient.php?id=<?php echo $value['idClient'] ?>">x</a></td>
                    </tr>

                <?php
                }
                ?>

            </tbody>
        </table>
    </section>
</body>
</html>