<?php 
    require $_SERVER['DOCUMENT_ROOT'] ."/controladores/PersonaControlador.class.php";

 
   

    //PersonaControlador::Alta($nombre,$apellido,$telefono);
    //PersonaControlador::Modificar($id,$nombre,$apellido,$telefono);
    //PersonaControlador::Eliminar($id);

    
    foreach(PersonaControlador::Listar() as $p){
        echo "ID: " . $p['id'] . " <br />";
        echo "Nombre: " . $p['nombre'] . " <br />";
        echo "Apellido: " . $p['apellido'] . " <br />";
        echo "Telefono: " . $p['telefono'] . " <br />";
        echo "<br /><br />";
    }

   
    
    