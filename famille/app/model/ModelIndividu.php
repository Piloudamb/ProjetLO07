
<!-- ----- debut ModelIndividu -->

<?php
require_once 'Model.php';

class ModelIndividu {
 private $famille_id, $id, $nom, $prenom, $sexe, $pere, $mere;
 
 // pas possible d'avoir 2 constructeurs
 public function __construct($famille_id = NULL, $id = NULL, $nom = NULL, $prenom = NULL, $sexe = NULL, $pere = NULL, $mere = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->famille_id = $famille_id;
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->sexe = $sexe;
   $this->pere = $pere;
   $this->mere = $mere;
  }
 }

 function setFamille_id($id) {
     $this->famille_id = $id;
 }
 
 function setId($id) {
  $this->id = $id;
 }

 function setNom($nom) {
  $this->nom = $nom;
 }
 
 function setPrenom($prenom) {
     $this->prenom = $prenom;
 }
 
 function setSexe($sexe) {
     $this->sexe = $sexe;
 }
 
 function getFamille_id() {
     return $this->famille_id;
 }

 function getId() {
  return $this->id;
 }

 function getNom() {
  return $this->nom;
 }
 
 function getPrenom() {
     return $this->prenom;
 }
 
 function getSexe() {
     return $this->sexe;
 }
 
 function getPere() {
     return $this->pere;
 }
 
 function getMere() {
     return $this->mere;
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from individu";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>
<!-- ----- fin ModelVin -->