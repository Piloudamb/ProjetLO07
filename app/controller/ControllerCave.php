<?php


class ControllerCave {
    
    public static function mesPropositions() {
      // ----- Construction chemin de la vue
      include 'config.php';
      $vue = $root . '/public/documentation/mesPropositions.php';
      if (DEBUG)
       echo ("ControllerCave : mesPropositions : vue = $vue");
      require ($vue);
    }
    
}
