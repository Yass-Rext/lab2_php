<?php
// Démarrer la session
session_start();

// Vérification que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs saisies par l'utilisateur
    $_SESSION['numINE'] = htmlspecialchars($_POST['NumINE']);
    $_SESSION['prenom'] = htmlspecialchars($_POST['Prenom']);
    $_SESSION['nom'] = htmlspecialchars($_POST['Nom']);
    $_SESSION['age'] = htmlspecialchars($_POST['Age']);
    $_SESSION['genre'] = htmlspecialchars($_POST['Genre']);
    $_SESSION['campus'] = htmlspecialchars($_POST['Campus']);
    $_SESSION['specialite'] = htmlspecialchars($_POST['Specialite']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation des données</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .actions {
            text-align: center;
            margin-top: 20px;
        }

        .actions input {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }

        .actions input[type="reset"] {
            background-color: #dc3545;
        }

        .actions input:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <h1>Confirmation des données</h1>
    <table>
        <thead>
            <tr>
                <th>INE</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Âge</th>
                <th>Genre</th>
                <th>Campus</th>
                <th>Spécialité</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $_SESSION['numINE']; ?></td>
                <td><?php echo $_SESSION['prenom']; ?></td>
                <td><?php echo $_SESSION['nom']; ?></td>
                <td><?php echo $_SESSION['age']; ?></td>
                <td><?php echo $_SESSION['genre']; ?></td>
                <td><?php echo $_SESSION['campus']; ?></td>
                <td><?php echo $_SESSION['specialite']; ?></td>
            </tr>
        </tbody>
    </table>
    <div class="actions">
        <form method="POST" action="insert.php">
            <input type="hidden" name="NumINE" value="<?php echo $_SESSION['numINE']; ?>">
            <input type="hidden" name="Prenom" value="<?php echo $_SESSION['prenom']; ?>">
            <input type="hidden" name="Nom" value="<?php echo $_SESSION['nom']; ?>">
            <input type="hidden" name="Age" value="<?php echo $_SESSION['age']; ?>">
            <input type="hidden" name="Genre" value="<?php echo $_SESSION['genre']; ?>">
            <input type="hidden" name="Campus" value="<?php echo $_SESSION['campus']; ?>">
            <input type="hidden" name="Specialite" value="<?php echo $_SESSION['specialite']; ?>">
            <input type="submit" name="confirm" value="Valider">
            <input type="button" value="Annuler" onclick="history.back()">
        </form>
    </div>
</body>
</html>
<?php
} else {
    echo "<p style='color: red; text-align: center;'>Aucune donnée soumise.</p>";
}
?>