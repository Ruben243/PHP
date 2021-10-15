<?php include 'includes/header.php';
//  al indicar use se puede quitar App\Clientes() en la llamada

// importar autoload de composer
require 'vendor/autoload.php';
use App\Clientes;
use App\Detalles;

// incluir las otras clases
// este autoload manual es sustituido por composer
// function mi_autoload($clase){
//     $ruta=explode('\\',$clase);
//     require  __DIR__ . '/clases/' . $ruta[1] . '.php';
//  }
 //  spl_autoload_register('mi_autoload');

 $detalles=new Detalles();
 $clientes=new Clientes();

 

include 'includes/footer.php';