<?php
// Démarrer la session
session_start();

// Vérification que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs saisies par l'utilisateur
    $_SESSION['numINE'] = htmlspecialchars($_POST['NumINE']);
    $_SESSION['prenom'] = htmlspecialchars($_POST['Prenom']);
   
    // Connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $motdepasse = "Alamou78myd";
    $basededonnees = "promo4MI";
    $connex = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

    // Vérification de la connexion
   if ($connex->connect_errno) {

    echo "Échec de connexion à la base de données : " . $connex->connect_error;
    exit();
     }

    // Préparation de la requête SQL avec des paramètres pour éviter les injections SQL
  $requete   = $connex->prepare("INSERT INTO etudiant (NumINE, Prenom, Nom, Age, Genre, Campus, Specialite) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $requete->bind_param("sssisss", $_SESSION['numINE'], $_SESSION['prenom'], $_SESSION['nom'], $_SESSION['age'], $_SESSION['genre'], $_SESSION['campus'], $_SESSION['specialite']);

    // Exécution de la requête
    if ($requete->execute()) {
        echo "Bonne insertion";
    } else {
        echo "Erreur d'insertion : " . $requete->error;
    }

    // Fermeture de la requête et de la connexion
    $requete->close();
    $connex->close();
} else {
    echo "Le formulaire n'a pas été soumis.";
}
?>

<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Récapitulatif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        h1 {
            color: #007BFF;
        }
        table {
            width: 50%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
    </style>
    <script language="JavaScript">
        alert('Vous êtes maintenant inscrit officiellement.\n Essayez de vous connecter pour pouvoir faire des propositions \n mais le compte ne sera actif qu\'après vérification de toutes vos informations personnelles!!!');
    </script>
</head>
<body>
    <h1>Récapitulatif des informations</h1>
    <table>
        <tr>
            <th>Champ</th>
            <th>Valeur</th>
        </tr>
        <tr>
            <td>Numéro INE</td>
            <td><?php echo $_SESSION['numINE']; ?></td>
        </tr>
        <tr>
            <td>Prénom</td>
            <td><?php echo $_SESSION['prenom']; ?></td>
        </tr>
        <tr>
            <td>Nom</td>
            <td><?php echo $_SESSION['nom']; ?></td>
        </tr>
        <tr>
            <td>Âge</td>
            <td><?php echo $_SESSION['age']; ?></td>
        </tr>
        <tr>
            <td>Genre</td>
            <td><?php echo $_SESSION['genre']; ?></td>
        </tr>
        <tr>
            <td>Campus</td>
            <td><?php echo $_SESSION['campus']; ?></td>
        </tr>
        <tr>
            <td>Spécialité</td>
            <td><?php echo $_SESSION['specialite']; ?></td>
        </tr>
    </table>
</body>
</html>