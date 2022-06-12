<?php 
    require $_SERVER['DOCUMENT_ROOT'] ."/modelos/PersonaModelo.class.php";

    class PersonaControlador{
        public static function Alta($nombre,$apellido,$username,$email,$pass){
            $p = new PersonaModelo();
            $p -> nombre = $nombre;
            $p -> apellido = $apellido;
            $p -> username = $username;
            $p -> email = $email;
            $p -> pass = $pass;
            $p -> Guardar();
        
        }

        public static function Eliminar($id){
            $p = new PersonaModelo($id);
            $p -> Eliminar();
        }

        public static function Modificar($id,$nombre,$username,$email,$pass){
            $p = new PersonaModelo($id);
            $p -> nombre = $nombre;
            $p -> apellido = $apellido;
            $p -> username = $username;
            $p -> email = $email;
            $p -> pass = $pass;
            $p -> Guardar();
        }

        /*public static function Listar(){
            $p = new PersonaModelo();
            $personitas = $p -> ObtenerTodos();

            $resultado = [];
            foreach($personitas as $persona){
                $t = [
                    'id' => $persona -> id,
                    'nombre' => $persona -> nombre,
                    'apellido' => $persona -> apellido,
                    'telefono' => $persona -> telefono,
                ];
                
                array_push($resultado,$t);
            }
            return $resultado;            
        }*/
    }