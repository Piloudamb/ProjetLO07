
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
        if (isset($_SESSION['famille_id'])) {
            try {
                $database = Model::getInstance();
                $query = "select * from individu where famille_id = '" . $_SESSION['famille_id'] . "'";
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

    public static function insert($nom, $prenom, $sexe) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from individu";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // recherche de la valeur de la clé de la famille
            $query1 = "select id from famille where nom = '$nom'";
            $statement1 = $database->query($query1);
            $tuple1 = $statement1->fetch();
            $famille_id = $tuple1['0'];

            //insertion d'un individu
            $query2 = "insert into individu (famille_id, id, nom, prenom, sexe) value (:famille_id, :id, :nom, :prenom, :sexe)";
            $statement2 = $database->prepare($query2);
            $statement2->execute([
                ':famille_id' => $famille_id,
                ':id' => $id,
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':sexe' => $sexe
            ]);

            $results = array('id' => $id, 'famille_id' => $famille_id);

            return $results;
        } catch (PDOException $e) {
            printf("<p>%s - %s<p/>\n</p", $e->getCode(), $e->getMessage());
            return null;
        }
    }

    // retourne une liste des noms et prénoms
    public static function getAllNom() {
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

    public static function getPage($id, $famille_id) {
        try {
            $database = Model::getInstance();

            //récupérer l'individu choisi
            $query = "select * from individu where id=$id and famille_id=$famille_id";
            $statement = $database->prepare($query);
            $statement->execute();
            $response = $statement->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
            $individu = $response[0];

            //récupérer la date de naissance
            $query2 = "select * from evenement where iid=$id and famille_id=$famille_id and event_type='NAISSANCE'";
            $statement2 = $database->prepare($query2);
            $statement2->execute();
            $response2 = $statement2->fetch();
            $date = $response2['4'];
            $place = $response2['5'];

            //récupérer la date de déces
            $query3 = "select * from evenement where iid=$id and famille_id=$famille_id and event_type='DECES'";
            $statement3 = $database->prepare($query3);
            $statement3->execute();
            $response3 = $statement3->fetch();
            $date2 = $response3['4'];
            $place2 = $response3['5'];
            
            //récupérer les parents
            //pere
            $query4 = "select * from individu where id={$individu->getPere()} and famille_id=$famille_id";
            $statement4 = $database->prepare($query4);
            $statement4->execute();
            $response4 = $statement4->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
            $pere = $response4[0];
            
            //mere
            $query5 = "select * from individu where id={$individu->getMere()} and famille_id=$famille_id";
            $statement5 = $database->prepare($query5);
            $statement5->execute();
            $response5 = $statement5->fetchAll(PDO::FETCH_CLASS, "ModelIndividu");
            $mere = $response5[0];
            
            
            $results = array(
                "individu" => $individu,
                "date_naissance" => $date,
                "place_naissance" => $place,
                "date_deces" => $date2,
                "place_deces" => $place2,
                "pere" => $pere,
                "mere" => $mere,
            );
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
?>
<!-- ----- fin ModelVin -->
