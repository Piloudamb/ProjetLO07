
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.php';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">famille_id</th>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">sexe</th>
          <th scope = "col">pere</th>
          <th scope = "col">mere</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des familles est dans une variable $results             
          foreach ($results as $element) {
           echo("<tr>"
                   . "<td>" . $element->getFamille_id() ."</td>"
                   . "<td>" . $element->getId() . "</td>"
                   . "<td>" . $element->getNom() . "</td>"
                   . "<td>" . $element->getPrenom() . "</td>"
                   . "<td>" . $element->getSexe() . "</td>"
                   . "<td>" . $element->getPere() . "</td>"
                   . "<td>" . $element->getMere() . "</td>"
                   . "</tr>");
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  