
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
            $query = "select * from individu where nom = '" . $_SESSION['nom'] . "'";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($nom, $prenom, $sexe) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from individu";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // recherche de la valeur de la clé = max(id) + 1'id de la famille
            $query1 = "select id from famille where nom = '$nom'";
            $statement1 = $database->query($query1);
            $tuple1 = $statement1->fetch();
            $famille_id = $tuple1['0'];

            $query2 = "insert into individu (famille_id, id, nom, prenom, sexe) value (:famille_id, :id, :nom, :prenom, :sexe)";
            $statement2 = $database->prepare($query2);
            $statement2->execute([
                ':famille_id' => $famille_id,
                ':id' => $id,
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':sexe' => $sexe
            ]);

            $ids = array('id' => $id, 'famille_id' => $famille_id);

            return $ids;
        } catch (PDOException $e) {
            printf("<p>%s - %s<p/>\n</p", $e->getCode(), $e->getMessage());
            return null;
        }
    }

    // retourne une liste des nom
    public static function getAllNom() {
        try {
            $database = Model::getInstance();
            $query = "select nom, prenom from individu";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    

}
?>
<!-- ----- fin ModelVin -->
