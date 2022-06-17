<?php
require_once '../model/ModelEvenement.php';
session_start();


class ControllerEvenement {
     // Affiche un formulaire pour sélectionner un nom qui existe
     public static function evenementReadNom() {
  $results = ModelEvenement::getAllNom();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/evenement/viewNom.php';
  require ($vue);
 }
 
  // sauve le nom en variable de session
 public static function evenementReadOne() {
  $famille_nom = $_GET['nom'];
  $_SESSION["nom"] = $famille_nom;
$results = ModelEvenement::getOneNom( htmlspecialchars($_GET['nom']));
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/evenement/viewEvent.php';
  require ($vue);
 }
  public static function evenementCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/evenement/viewInsert.php';
  require ($vue);
 }
  public static function evenementCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelFamille::insert(
      htmlspecialchars($_GET['event_type'],$GET['event_date'],$GET['event_lieu'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/evenement/viewInserted.php';
  require ($vue);
 }
 
 
}
