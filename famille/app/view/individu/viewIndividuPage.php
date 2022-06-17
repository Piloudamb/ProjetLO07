
<!-- ----- début viewAll -->
<?php
require ($root . '/app/view/fragment/fragmentGenealogieHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentGenealogieMenu.html';
        include $root . '/app/view/fragment/fragmentGenealogieJumbotron.php';

        echo("<h4>$nom</h4>"); 
        echo("<h4>$prenom</h4>");
        ?>


    </div>
    <?php include $root . '/app/view/fragment/fragmentGenealogieFooter.html'; ?>

    <!-- ----- fin viewAll -->


