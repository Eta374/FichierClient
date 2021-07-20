<?php
$id = $_GET['id'];
$pdo = new PDO('mysql:host=localhost;dbname=fichierClients;port=3306', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req1 = $pdo->prepare("SELECT * FROM clients WHERE idClient = $id");
$req1->execute();
$client = $req1->fetch();

if ($_POST) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['codePostal'];
    $ville = $_POST['ville'];
    $entreprise = $_POST['entreprise'];
    $profession = $_POST['profession'];

    $req2 = $pdo->prepare("UPDATE `clients` 
    SET `nom`= :nom,`prenom`= :prenom,`adresse`= :adresse,`codePostal`= :codePostal,`ville`= :ville,`entreprise`= :entreprise,`profession`= :profession 
    WHERE idClient = $id");

$req2->execute(array(
':nom' => $nom,
':prenom' => $prenom,
':adresse' => $adresse,
':codePostal' => $codePostal,
':ville' => $ville,
':entreprise' => $entreprise,
':profession' => $profession,
));

header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="updateClient.php?id=<?php echo $id ?>" method="post">
        
        <input type="text" name="nom" placeholder="nom" value="<?php echo $client['nom'] ?>">
        <input type="text" name="prenom" placeholder="prenom" value="<?php echo $client['prenom'] ?>">
        <input type="text" name="adresse" placeholder="adresse" value="<?php echo $client['adresse'] ?>">
        <input type="text" name="codePostal" placeholder="codePostal" value="<?php echo $client['codePostal'] ?>">
        <input type="text" name="ville" placeholder="ville" value="<?php echo $client['ville'] ?>">
        <input type="text" name="entreprise" placeholder="entreprise" value="<?php echo $client['entreprise'] ?>">
        <input type="text" name="profession" placeholder="profession" value="<?php echo $client['profession'] ?>">
        <input type="submit" value="Créer un client" placeholder="" value="Modifier un client">
    </form>

</body>
</html>