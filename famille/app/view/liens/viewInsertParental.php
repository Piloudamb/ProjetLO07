<?php 
require ($root . '/app/view/fragment/fragmentGenealogieHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentGenealogieMenu.html';
      include $root . '/app/view/fragment/fragmentGenealogieJumbotron.php';
    ?> 

     <form role="form" method='get' action='router1.php'>
      <div class="form-group">
          <h3>Ajout d'un lien parentalet</h3>
        <input type="hidden" name='action' value='individuReadAll'>
        <label for="nom">selectionnez un enfant: </label><br> <select class="form-control" id='idd' name='idd' style="width: 100px">
            <?php
            foreach ($results as $iid) {
             echo ("<option>$iid</option>");
            }
            ?>
        </select><br>

       <input type="hidden" name='action' value='individuReadAll'>
        <label for="nom">selectionnez un parent: </label><br> <select class="form-control" id='idd' name='idd' style="width: 100px">
            <?php
            foreach ($results as $iid) {
             echo ("<option>$iid</option>");
            }
            ?>
        </select><br>
       
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">GO</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentGenealogieFooter.html'; ?>

<!-- ----- fin viewInsert -->