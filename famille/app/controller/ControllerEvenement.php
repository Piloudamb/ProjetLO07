<!-- ----- debut ControllerFamille -->
<?php
require_once '../model/ModelEvenement.php';
require_once '../model/ModelIndividu.php';

//session_start();


class ControllerEvenement {

    // Affiche un formulaire pour sélectionner un nom qui existe
    public static function evenementReadNom() {
        if (isset($_SESSION["nom"])) {
            self::evenementReadOne();
        } else {
            $results = ModelEvenement::getAllNom();

            // ----- Construction chemin de la vue
            include 'config.php';
            $vue = $root . '/app/view/evenement/viewNom.php';
            require ($vue);
        }
    }

    // sauve le nom en variable de session
    public static function evenementReadOne() {
        if (isset($_GET["famille"])) {
            $get_array = explode("|", $_GET['famille']);
            $famille_id = $get_array[0];
            $famille_nom = $get_array[1];
            $_SESSION["famille_id"] = $famille_id;
            $_SESSION["nom"] = $famille_nom;
        } else {
            $famille_nom = $_SESSION["nom"];
        }

        $results = ModelEvenement::getOneNom(htmlspecialchars($famille_nom));
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/evenement/viewEvent.php';
        require ($vue);
    }

    //liste des individu
    public static function individuReadAll() {

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/evenement/viewInsert.php';
        require ($vue);
    }

    public static function evenementCreate() {
        $results = ModelIndividu::getAllNom();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/evenement/viewInsert.php';
        require ($vue);
    }

    public static function evenementCreated() {
        // ajouter une validation des informations du formulaire
        // $get = $_GET['individu'];
        $get_array = explode("|", $_GET['individu']);
        $famille_id = $get_array[0];
        $iid = $get_array[1];
        $results = ModelEvenement::insert($famille_id, $iid, htmlspecialchars($_GET['event_type']), htmlspecialchars($_GET['event_date']), htmlspecialchars($_GET['event_lieu'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/evenement/viewInserted.php';
        require ($vue);
    }

}
?>
<!-- ----- debut ControllerEvenement -->