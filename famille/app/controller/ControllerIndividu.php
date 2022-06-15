
<!-- ----- debut ControllerIndividu -->
<?php
require_once '../model/ModelIndividu.php';

class ControllerIndividu {

 // --- Liste des individus
 public static function individuReadAll() {
  $results = ModelIndividu::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/individu/viewAll.php';
  if (DEBUG)
   echo ("ControllerIndividu : individuReadAll : vue = $vue");
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerIndividu -->


