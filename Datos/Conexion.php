<?php

class Conexion
{ private $serv="localhost";
  private $usuario="root";
  private $clave="";
  private $bdatos="malmedica";
  private $conex="";
  
  public function abrirConexion()
  { $this->conex=mysql_connect($this->serv,$this->usuario,$this->clave) or die ('ERROR AL UBICAR URL...:'.mysql_error());
    mysql_select_db($this->bdatos,$this->conex);
   /* $pdo = new PDO('mysql:host= servidor; dbname=bd', $usuario, $clave, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));*/
	return $this->conex;  
  }
  
  public function cerrarConexion()
  { mysql_close($this->conex) or die ('ERROR DE CIERRE...VERIFIQUE..:'.mysql_error()); }
  
  public function generarTransaccion($sql)
  {  $this->abrirConexion();
     $resul=mysql_query($sql,$this->conex) or die ('ERROR DE SENTENCIA...VERIFIQUE..:'.mysql_error()); 
     $this->cerrarConexion();
     return $resul;
  }
}




?>