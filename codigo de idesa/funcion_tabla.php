<?php 
if(isset($_REQUEST['nom'])){
  $id=$_REQUEST['nom'];
  echo "<p></p>";
}else{
 echo "<p>EL parametro no se recibio</p>";
  $id="";  
}  
$result = file_get_contents( "http://localhost/iderp/index.php/api/obtener_paises/?api_key=Nub13579$&nom=".$id); 
$dato=json_decode($result);
echo "<thead class='thead-dark'>";
echo "<tr>" ;
echo "<th >Codigo</th>";
echo "<th >Nombre</th>";
echo "</tr>";
include 'pagination.php';
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
  if ($dato->total_count > 0){
    $per_page = 10; //la cantidad de registros que desea mostrar  
    $total_pages = ceil($dato->total_count/$per_page);
    $reload = 'index.php';
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $adjacents  = 2; //brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    for($i=$offset; $i<($offset+$per_page);$i++){
      if (array_key_exists($i,$dato->pai_m)){
        echo "<tr>";
        echo "<td class='th-sm'>".$dato->pai_m[$i]->id."</th>";
        echo "<td class='th-sm'>".$dato->pai_m[$i]->name."</th>";
        echo "</tr class='th-sm'>";

      }
    }

            
  echo "</table>";
  echo "	<div class='table-pagination pull-right'>"; 
  echo paginate($reload,$page,$total_pages,$adjacents);
  echo "</div>";
          
  }else{
    echo "<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4>Aviso!!!</h4> No hay datos para mostrar
          </div>";
                  
  }

}
?>