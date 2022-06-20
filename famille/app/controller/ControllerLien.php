<!-- ----- debut ControllerLien -->
<?php
//session_start();
require_once '../model/ModelLien.php';
require_once '../model/ModelIndividu.php';

class ControllerLien {

    // --- Liste des liens
    public static function lienReadAll() {
        $results = ModelLien::getAllLien();
        // ----- Construction chemin de la vue 
        include 'config.php';
        $vue = $root . '/app/view/liens/viewAll.php';
        if (DEBUG)
            echo ("ControllerLien : lienReadAll : vue = $vue");
        require ($vue);
    }

    public static function LienParentalCreate() {
        $results = ModelIndividu::getAllNom();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/liens/viewInsertParental.php';
        require ($vue);
    }

    public static function LienParentalCreated() {
        // ajouter une validation des informations du formulaire
        $get_array = explode("|", $_GET['individu']);
        $iid = $get_array[2];
        $sexe = $get_array[3];
        $results = ModelLien::update(htmlspecialchars($_GET['iid']));
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/liens/viewInsertedParentale.php';
        require ($vue);
    }

    public static function LienUnionCreate() {
        $results = ModelIndividu::getAllNom();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/liens/viewInsertUnion.php';
        require ($vue);
    }

    public static function LienUnionCreated() {
        // ajouter une validation des informations du formulaire
        $get_array = explode("|", $_GET['individu']);
        $iid1 = $get_array[0];
        $iid2 = $get_array[1];
        $results = ModelLien::Insert($idd1, $idd2, htmlspecialchars($_GET['lien_type'], $GET['lien_date'], $GET['lien_lieu']));
        include 'config.php';
        $vue = $root . '/app/view/liens/viewInsertedUnion.php';
        require ($vue);
    }

}
