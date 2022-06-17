<!-- ----- debut ControllerLien -->
<?php
//session_start();
require_once '../model/ModelLien.php';

class ControllerLien {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewGenealogieAccueil.php';
  if (DEBUG)
   echo ("ControllerLien : caveAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des liens
 public static function lienReadAll() {
  $results = ModelFamille::getAlllien();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/lien/viewAll.php';
  if (DEBUG)
   echo ("ControllerEvenement : lienReadAll : vue = $vue");
  require ($vue);
 }

}