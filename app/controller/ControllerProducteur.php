<?php
require_once '../model/ModelProducteur.php';


class ControllerProducteur {
    
 // --- Liste des producteurs
 public static function producteurReadAll() {
  $results = ModelProducteur::getAll();
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewAll.php';
  if (DEBUG)
   echo ("ControllerProducteur : producteurReadAll : vue = $vue");
  require ($vue);
 }
 
 // --- Liste des producteurs
 public static function producteurNombreRegion() {
  $results = ModelProducteur::getNombreRegion();
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewNombre.php';
  if (DEBUG)
   echo ("ControllerProducteur : producteurNombreRegion : vue = $vue");
  require ($vue);
 }
 
 // --- Liste des regions
 public static function producteurReadRegion() {
  $results = ModelProducteur::getAllRegion();
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewRegion.php';
  if (DEBUG)
   echo ("ControllerProducteur : producteurReadRegion : vue = $vue");
  require ($vue);
 }
 
 // Affiche un formulaire pour sélectionner un id qui existe
 public static function producteurReadId() {
  $results = ModelProducteur::getAllId();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewId.php';
  require ($vue);
 }
 
 // Affiche un producteur particulier (id)
 public static function producteurReadOne() {
  $producteur_id = $_GET['id'];
  $results = ModelProducteur::getOne($producteur_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewAll.php';
  require ($vue);
 }
 
 // Affiche le formulaire de creation d'un producteur
 public static function producteurCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewInsert.php';
  require ($vue);
 }
 
 // Affiche un formulaire pour récupérer les informations d'un nouveau producteur.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function producteurCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelProducteur::insert(
      htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewInserted.php';
  require ($vue);
 }
    
}
