
<!-- ----- debut ModelFamille -->

<?php
require_once 'Model.php';

class ModelFamille {

    private $id, $nom;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $nom = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

// retourne une liste des nom
    public static function getAllNom() {
        try {
            $database = Model::getInstance();
            $query = "select * from famille";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelFamille");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from famille";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelFamille");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getOne($nom) {
        try {
            $database = Model::getInstance();
            $query = "select * from vin where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVin");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($nom) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from famille";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into famille value (:id, :nom)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom
            ]);

            //ajout d'un individu inconnu pour le parents de tout le monde;
            $query2 = "insert into individu (famille_id, id, nom, prenom, sexe, pere, mere) value (:famille_id, :id, :nom, :prenom, :sexe, :pere, :mere)";
            $statement2 = $database->prepare($query2);
            $statement2->execute([
                'famille_id' => $id,
                'id' => 0,
                'nom' => "?",
                "prenom" => "?",
                "sexe" => "?",
                "mere" => "?",
                "pere" => "?",
            ]);

            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function update() {
        echo ("ModelVin : update() TODO ....");
        return null;
    }

    public static function delete() {
        echo ("ModelVin : delete() TODO ....");
        return null;
    }

}
?>
<!-- ----- fin ModelFamille -->
