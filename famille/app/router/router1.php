
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerFamille.php');
require ('../controller/ControllerProducteur.php');
require ('../controller/ControllerCave.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
 case "familleReadAll" :
 case "familleReadOne" :
 case "familleReadNom" :
 case "familleCreate" :
 case "familleCreated" :
  ControllerFamille::$action();
  break;
 
 case "producteurReadAll" :
 case "producteurReadOne" :
 case "producteurReadId" :
 case "producteurCreate" :
 case "producteurCreated" :
 case "producteurReadRegion" :
 case "producteurNombreRegion" :   
  ControllerProducteur::$action();
  break;

 case "mesPropositions" :
  ControllerCave::$action();
  break;

 // Tache par défaut
 default:
  $action = "caveAccueil";
  ControllerFamille::$action();
}
?>
<!-- ----- Fin Router1 -->

