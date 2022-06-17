<?php
require ($root . '/app/view/fragment/fragmentGenealogieHeader.html');
?>

<body>
  <div class="container">
      <?php  
      include $root . '/app/view/fragment/fragmentGenealogieMenu.html';
      include $root . '/app/view/fragment/fragmentGenealogieJumbotron.php';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
         <th scope = "col">nom</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des evenement pour une famille selectionnes             
          foreach ($results as $element) {
           echo("<tr><td>" . $element->getId() . "</td></tr><tr><td>" . $element->getIid() ."</td><td>" . $element->getEvent_type() . "</td></tr><tr><td>" . $element->getEvent_date() ."</td><td>" . $element->getEvent_lieu() . "</td></tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentGenealogieFooter.html'; ?>