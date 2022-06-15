
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
 
 // Affiche le formulaire de creation d'un individu
 public static function individuCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/individu/viewInsert.php';
  require ($vue);
 }
 
 // Affiche un formulaire pour récupérer les informations d'une nouvelle individu.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function individuCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelIndividu::insert(
      htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['sexe'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/individu/viewInserted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerIndividu -->


