<?php
    require_once "models/clubbasquet.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            echo json_encode(clubbasquet::getAll());

            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != null) {
                if(clubbasquet::insert($datos->nombre, $datos->posicion, $datos->numero, $datos->edad)) {
                    http_response_code(200);
                }//fin if
                else {
                    http_response_code(400);
                }//fin else
            }//fin if
            else {
                http_response_code(405);
            }//fin else
            break;
        case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if ($datos != null) {
                if(clubbasquet::update($datos->id, $datos->nombre, $datos->posicion, $datos->numero, $datos->edad)) {
                    http_response_code(200);
                }//fin if
                else {
                    http_response_code(400);
                }//fin else
            }//fin if
            else {
                http_response_code(405);
            }//fin else
            break;
        case 'DELETE':
            if(isset($_GET['id'])) {
                if(clubbasquet::delete($_GET['id'])) {
                    http_response_code(200);
                }//fin if
                else {
                    http_response_code(400);
                }//fin else
            }//fin if
            else {
                http_response_code(405);
            }// fin else
            break;
    }
?>