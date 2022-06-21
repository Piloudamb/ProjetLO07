<!-- ----- debut ControllerLien -->
<?php
//session_start();
require_once '../model/ModelLien.php';
require_once '../model/ModelIndividu.php';

class ControllerLien {

    // Affiche un formulaire pour sélectionner un nom qui existe
    public static function lienReadNom() {
        if (isset($_SESSION["nom"])) {
            self::lienReadAll();
        } else {
            $results = ModelEvenement::getAllNom();

            // ----- Construction chemin de la vue
            include 'config.php';
            $vue = $root . '/app/view/liens/viewNom.php';
            require ($vue);
        }
    }

    // --- Liste des liens
    public static function lienReadAll() {
        if (isset($_GET["famille"])) {
            $get_array = explode("|", $_GET['famille']);
            $famille_id = $get_array[0];
            $famille_nom = $get_array[1];
            $_SESSION["famille_id"] = $famille_id;
            $_SESSION["nom"] = $famille_nom;
        } else {
            $famille_id = $_SESSION["famille_id"];
        }
        
        $results = ModelLien::getAlllien($famille_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/liens/viewAll.php';
        if (DEBUG)
            echo ("ControllerLien : lienReadAll : vue = $vue");
        require ($vue);
    }

    //Creation de formulaire de lien parentale
    public static function LienParentalCreate() {
        $results = ModelIndividu::getAllNom();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/liens/viewInsertParental.php';
        require ($vue);
    }

    //recupuration des infotmations de formulaire de lien parentale
    public static function LienParentalCreated() {
        // ajouter une validation des informations du formulaire
        $get_array1 = explode("|", $_GET['individu1']);
        $get_array2 = explode("|", $_GET['individu2']);
        //$famille_id_enfant=$get_array1[0];
        $famille_id_parents = $get_array2[0];
        $iid1 = $get_array1[1];
        $iid2 = $get_array2[1];
        $sexe = $get_array2[2];
        $results = ModelLien::update($iid1, $iid2, $sexe, $famille_id_parents);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/liens/viewInsertedParentale.php';
        require ($vue);
    }

    //Creation de formulaire d'union de deux individu
    public static function LienUnionCreate() {
        $resultshomme = ModelIndividu::getAllNomHomme();
        $resultsfemme = ModelIndividu::getAllNomFemme();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/liens/viewInsertUnion.php';
        require ($vue);
    }

    //recupuration des infotmations de formulaire d'union
    public static function LienUnionCreated() {
        // ajouter une validation des informations du formulaire
        $get_array1 = explode("|", $_GET['individu1']);
        $get_array2 = explode("|", $_GET['individu2']);
        $famille_id = $get_array1[1];
        $iid1 = $get_array1[0];
        $iid2 = $get_array2[0];
        $results = ModelLien::Insert($famille_id, $iid1, $iid2, htmlspecialchars($_GET['lien_type']), htmlspecialchars($_GET['lien_date']), htmlspecialchars($_GET['lien_lieu']));
        include 'config.php';
        $vue = $root . '/app/view/liens/viewInsertedUnion.php';
        require ($vue);
    }

}
?>
<!-- ----- debut ControllerLien -->