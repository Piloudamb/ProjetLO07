<?php
require ($root . '/app/view/fragment/fragmentGenealogieHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentGenealogieMenu.html';
        include $root . '/app/view/fragment/fragmentGenealogieJumbotron.php';
        ?>
        <h3>Veuillez choisir une famille</h3>
        <form role="form" method='get' action='router1.php'>
            <div class="form-group">
                <input type="hidden" name='action' value='evenementReadOne'>
                <label for="nom">nom : </label> <select class="form-control" id='famille' name='famille' style="width: 100px">
<?php
foreach ($results as $famille) {
    echo ("<option value='{$famille->getId()}|{$famille->getNom()}'>"
    . "{$famille->getNom()}"
    . "</option>");
}
?>
                </select>
            </div>
            <p/>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
        <p/>
    </div>

<?php include $root . '/app/view/fragment/fragmentGenealogieFooter.html'; ?>

    <!-- ----- fin viewNom -->
