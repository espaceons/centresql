<?php include 'header.php'; ?>

<section class="hero">
    <h1>Présentation du centre :</h1>
    <p>Centre de Formation d'Apprentissage Teboulba</p>
    <a href="#programs" class="cta-button">A propos</a>
</section>
<section id="about" class="section">
    <h2>À propos de nous</h2>
    <p>
        <?php
        // Inclure le fichier de configuration (connexion à la BDD)
        require_once 'config.php';

        try {
            // Spécifiez les champs à afficher
            $sql = "SELECT Code_centre, Nom_a, code_cat, Adresse_a, Ville_a, tel1, Email, Directeur_a, nb_poste, nb_heber FROM [SIMFORM].[dbo].[param]";
            $requete = $connexion->query($sql);

            // On s'assure qu'il y a des résultats
            $premiereLigne = $requete->fetch(PDO::FETCH_ASSOC);

            if ($premiereLigne) {
                // Afficher la première ligne
                echo "<div class='report-entry'>";
                foreach ($premiereLigne as $cle => $valeur) {
                    echo "<p><span class='report-entry-label'>" . htmlspecialchars($cle) . "</span> <span class='report-entry-value'>" . htmlspecialchars($valeur) . "</span></p>";
                }
                echo "</div>";

                // Afficher le reste des lignes
                while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='report-entry'>";
                    foreach ($ligne as $cle => $valeur) {
                        echo "<p><span class='report-entry-label'>" . htmlspecialchars($cle) . "</span> <span class='report-entry-value'>" . htmlspecialchars($valeur) . "</span></p>";
                    }
                    echo "</div>";
                }
            } else {
                echo "<p>Aucun résultat trouvé pour la présentation du centre.</p>";
            }

            $connexion = null; // Fermer la connexion PDO
        } catch (PDOException $e) {
            echo "<p style='color: red;'>Erreur de base de données : " . $e->getMessage() . "</p>";
        }
        ?>
    </p>
</section>


</main>

<footer>
    <p>&copy; 2025 École Mon Établissement. Tous droits réservés.</p>
</footer>

</body>

</html>