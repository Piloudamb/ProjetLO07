<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentGenealogieHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentGenealogieMenu.html';
    include $root . '/app/view/fragment/fragmentGenealogieJumbotron.php';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>Confirmation de la creation d'un lien parentale </h3>");
     echo("<ul>");
     //echo ("<li>id = " . $results . "</li>");
     echo  "<a href='router1.php?action=lienParentalCreated&individu={$results['individu']->getFamille_id()}|{$results['individu']->getIid1()}|{$results['individu']->getIid2()}|{$results['individu']->getSexe()}'>";
     echo ("<li>Famille_id = " . $_GET['famille_id'] . "</li>");
     echo ("<li>Individu_id1 = " . $_GET['iid'] . "</li>");
     echo ("<li>Individu_id2" . $_GET['iid'] . "</li>");
     
     echo("</ul>");
    } else {
     echo ("<h3>Problème de rajout de lien parentale </h3>");
     echo ("idd = " . $_GET['famille_id']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentGenealogieFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
