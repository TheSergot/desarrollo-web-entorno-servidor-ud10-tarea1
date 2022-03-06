<?php
    require_once 'connection/db.php';

    class clubbasquet {
        public static function getAll() {
            $db = new db();
            $query = "SELECT * FROM jugadores";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['Id'],
                        'nombre' => $row['nombreJugador'],
                        'posicion' => $row['posicion'],
                        'numero' => $row['numero'],
                        'edad' => $row['edad'],
                    ];
                }//fin while
                return $datos;
            }//fin if
            return $datos;
        }//fin getAll

        public static function getWhere($id_jugador) {
            $db = new db();
            $query = "SELECT * FROM jugadores WHERE id=$id_jugador";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['Id'],
                        'nombre' => $row['nombreJugador'],
                        'posicion' => $row['posicion'],
                        'numero' => $row['numero'],
                        'edad' => $row['edad'],
                    ];
                }//fin while
                return $datos;
            }//fin if
            return $datos;
        }//fin getWhere

        public static function insert($nombreJugador, $posicion, $numero, $edad) {
            $db = new db();
            $query = "INSERT INTO jugadores (nombreJugador, posicion, numero, edad)
            VALUES('".$nombreJugador."', '".$posicion."', '".$numero."', '".$edad."')";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }//fin if
            return FALSE;
        }//fin insert

        public static function update($id_jugador, $nombreJugador, $posicion, $numero, $edad) {
            $db = new db();
            $query = "UPDATE jugadores SET
            nombreJugador = '".$nombreJugador."', posicion = '".$posicion."', numero = '".$numero."', edad = '".$edad."'
            WHERE id=$id_jugador";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }//fin if
            return FALSE;
        }//fin update

        public static function delete($id_jugador) {
            $db = new db();
            $query = "DELETE FROM jugadores WHERE id=$id_jugador";
            $db -> query($query);
            if($db->affected_rows) {
                return TRUE;
            }//fin if
            return FALSE;
        }//fin delete
    }//fin clase clubbasquet
?>