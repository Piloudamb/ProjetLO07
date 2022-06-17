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
     echo ("<h3>Confirmation de la creation d'un lien d'union  </h3>");
     echo("<ul>");
     //echo ("<li>id = " . $results . "</li>");
     echo ("<li>famille_id = " . $_GET['famille_id'] . "</li>");
     echo ("<li>id individu = " . $_GET['id'] . "</li>");
     echo ("<li>event_id = " . $_GET['iid1'] . "</li>");
     echo ("<li>event_id = " . $_GET['iid2'] . "</li>");
     echo ("<li>Event_type = " . $_GET['lien_type'] . "</li>");
     echo ("<li>Event_date = " . $_GET['lien_date'] . "</li>");
     echo ("<li>Event_lieu = " . $_GET['lien_lieu'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion d'un lien</h3>");
     echo ("id = " . $_GET['iid1']);
     echo ("id = " . $_GET['iid2']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentGenealogieFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    