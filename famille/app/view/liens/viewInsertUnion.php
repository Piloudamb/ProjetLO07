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
          <h3>Ajout d'une union </h3>
        <input type="hidden" name='action' value='individuReadAll'>
        <label for="nom">selectionnez un homme: </label><br> <select class="form-control" id='idd' name='idd' style="width: 100px">
            <?php
            foreach ($results as $iid) {
             echo ("<option>$iid</option>");
            }
            ?>
        </select><br>
        
        <input type="hidden" name='action' value='individuReadAll'>
        <label for="nom">selectionnez un femme: </label><br> <select class="form-control" id='idd' name='idd' style="width: 100px">
            <?php
            foreach ($results as $iid) {
             echo ("<option>$iid</option>");
            }
            ?>
        </select><br>

        <label for="nom">selectionnez un type d'union: </label><br> 
        <select class="form-control" id='nom' name='event_type' style="width: 100px">
           <option value="Naissance">Couple</option>
           <option value="Deces" selected>Divorce</option>
           <option value="Naissance">Separation</option>
           <option value="Naissance">Pacs</option><!-- comment -->
           <option value="Naissance">Mariage</option>
        </select><br>
        
        <label>Date(AAAA-MM-JJ)?  </label><br>
            <input type="event_date" name="event_date" required pattern="\d{4}-\d{2}-\d{2}"><br>
            
         <label>Lieu?  </label><br>
            <input type='text' name='event_lieu'>
       
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">GO</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentGenealogieFooter.html'; ?>

<!-- ----- fin viewInsert -->
