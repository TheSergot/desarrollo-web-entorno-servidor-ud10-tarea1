<?php
    class db extends mysqli {
        //Atributos necesarios para la conexión
        private $host="localhost";
        private $user="root";
        private $password="";
        private $database="clubbasket";

        function __construct() {
            parent::__construct($this->host, $this->user, $this->password, $this->database);
            $this->set_charset('utf8');
            $this->connect_error == null ? 'Conexión exitosa a la DB' : die('Error al conectar a la BBDD');
        } //end __construct
    } //end class connectDB
?>