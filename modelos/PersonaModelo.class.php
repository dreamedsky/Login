<?php 
    require $_SERVER['DOCUMENT_ROOT'] . "/modelos/Modelo.class.php";

    class PersonaModelo extends Modelo {
        public $id;
        public $nombre;
        public $apellido;
        public $username;
        public $email;
        public $pass;

        public function __construct($id=""){
            parent::__construct();
            if($id !== "") {
                $this -> id = $id;
                $this -> Obtener();
            }
        }
        public function Guardar(){
            if($this -> id === NULL) $this -> insertar();
            else $this -> modificar();
        }

        public function Obtener(){
            $sql = "SELECT * FROM persona WHERE id = " . $this -> id;
            $fila = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> id = $fila['id'];
            $this -> nombre = $fila['nombre'];
            $this -> apellido = $fila['apellido'];
            $this -> username = $fila ['username'];
            $this -> email = $fila ['email'];
            $this -> pass = $fila ['pass'];
        }

        public function Eliminar(){
            $sql = "DELETE FROM persona WHERE id = " . $this -> id;
            $this -> conexion -> query($sql);
        }

        private function insertar(){
            $sql = "INSERT INTO persona (nombre,apellido,username, email, pass) VALUES (
                '" . $this -> nombre . "',
                '" . $this -> apellido . "', 
                " . $this -> username . "
                " . $this -> email . "
                " . $this -> pass . "
            )";
            $this -> conexion -> query($sql);
        }

        private function modificar(){
            $sql = "UPDATE persona SET 
                    nombre = '" . $this -> nombre . "',
                    apellido = '" . $this -> apellido . "', 
                    username = " . $this -> username . ",
                    email = " . $this -> email . ",
                    pass = " . $this -> pass . ",

                    WHERE id = " . $this -> id;
            $this -> conexion -> query($sql);
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM persona";
            $filas = $this -> conexion -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $elementos = [];
            foreach($filas as $fila){
                $p = new PersonaModelo();
                $p -> id = $fila['id'];
                $p -> nombre = $fila['nombre'];
                $p -> apellido = $fila['apellido'];
                $p -> username = $fila ['username'];
                $p-> email = $fila ['email'];
                $p -> pass = $fila ['pass'];
                array_push($elementos,$p);
            }
            return $elementos;
        }

        
    }