
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCaveMenu.html';
        include $root . '/app/view/fragment/fragmentCaveJumbotron.php';
        ?>
        <!-- ===================================================== -->
        <?php
        if ($results) {
            echo ("<h3>Le nouvel individu a été ajouté </h3>");
            echo("<ul>");
            //echo ("<li>id = " . $_GET['famille_id'] . "</li>");

            echo ("<li>id = " . $results['id'] . "</li>");
            echo ("<li>famille_id = " . $results['famille_id'] . "</li>");
            echo ("<li>nom = " . $_GET['nom'] . "</li>");
            echo ("<li>prenom = " . $_GET['prenom'] . "</li>");
            echo ("<li>sexe = " . $_GET['sexe'] . "</li>");
            echo("</ul>");
        } else {
            echo ("<h3>Problème d'insertion de l'individu</h3>");
            echo ("id = " . $_GET['nom']);
        }

        echo("</div>");

        include $root . '/app/view/fragment/fragmentCaveFooter.html';
        ?>
        <!-- ----- fin viewInserted -->    


