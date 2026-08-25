<?php
// Connexion à la base de données
$connex = new mysqli("localhost", "root", "Alamou78myd", "promo4mi");

// Vérification de la connexion
if ($connex->connect_error) {
    die("Échec de connexion : " . $connex->connect_error);
}

// Requête SQL pour récupérer les étudiants
$requete = "SELECT * FROM etudiant";
$resultat = $connex->query($requete);

// Vérification des erreurs dans la requête
if (!$resultat) {
    die("Erreur dans la requête SQL : " . $connex->error);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants inscrits</title>
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

        h2 {
            text-align: center;
            color: #555;
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

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Liste des étudiants inscrits</h1>

    <?php if ($resultat->num_rows > 0): ?>
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
                <?php while ($ligne = $resultat->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($ligne['NumINE']); ?></td>
                        <td><?php echo htmlspecialchars($ligne['Prenom']); ?></td>
                        <td><?php echo htmlspecialchars($ligne['Nom']); ?></td>
                        <td><?php echo htmlspecialchars($ligne['Age']); ?></td>
                        <td><?php echo htmlspecialchars($ligne['Genre']); ?></td>
                        <td><?php echo htmlspecialchars($ligne['Campus']); ?></td>
                        <td><?php echo htmlspecialchars($ligne['Specialite']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <h2>Aucun étudiant inscrit pour le moment.</h2>
    <?php endif; ?>

    <?php
    // Fermeture de la connexion
    $connex->close();
    ?>
</body>
</html>