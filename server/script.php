<?php
require("controller.php");

if ( isset($_REQUEST['todo']) ){


  header('Content-Type: application/json');

  $todo = $_REQUEST['todo'];

  
  switch($todo){

    case 'readmovies': 
      $data = readMoviesController();
      break;

    default: 
      echo json_encode('[error] Unknown todo value');
      http_response_code(400); // 400 == "Bad request"
      exit();
  }

  
  if ($data===false){
    echo json_encode('[error] Controller returns false');
    http_response_code(500); // 500 == "Internal error"
    exit();
  }

  /**
   * Si tout s'est bien passé, on renvoie la réponse HTTP avec les données ($data) retournées
   * par la fonction de contrôleur et encodées en JSON (json_encode).
   * On renvoie aussi un code de réponse HTTP 200 (OK) pour indiquer que la requête a été traitée avec succès.
   */
  echo json_encode($data);
  http_response_code(200); // 200 == "OK"
  exit();

   
} // fin de if ( isset($_REQUEST['todo']) )


/**
 * Cette partie du code n'est atteinte que si la variable 'todo' n'est pas définie dans la requête.
 * La conception de notre script est basée sur le fait qu'une variable todo doit être définie. Dans
 * le cas contraire, on considère que la requête est invalide et on renvoie un code de réponse 
 * HTTP 404 (Not found), indiquant que la requête HTTP ne correspond à rien.
 */
http_response_code(404); // 404 == "Not found"



?>