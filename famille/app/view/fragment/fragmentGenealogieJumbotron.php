<!-- ----- debut fragmentCaveJumbotron -->
<div class="jumbotron">
  <?php
  if(isset($_SESSION["nom"])) {
      echo("<h3>" . $_SESSION["nom"] . "</h3>");
  } else {
      echo("<h3>PAS DE FAMILLE SELECTIONNEE</h3>");
  }  
  ?>
</div>
<p/>
<!-- ----- fin fragmentCaveJumbotron -->  