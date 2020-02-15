<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

    function __construct() {
		parent::__construct();
		$this->load->model("Api_model");
    }

	/* Funciones originales */

    function documents($epi = "") {
        $apiKey = $this->input->get("api_key");
		$order = $this->input->get("order");
        echo json_encode($this->Api_model->get_documents($epi, $order, $apiKey));
    }

    function download_doc($epi = "") {
        $apiKey = $this->input->get("api_key");
        $id = $this->input->get("id");
        $r = $this->Api_model->download_document($epi, $id, $apiKey);

		if( isset($r['errors'])){
			echo json_encode($r);
		}else{

			$file = $r['path'];

			if( file_exists($file) ){
				header('Content-type: application/pdf');
				header("Content-length: ".filesize($file));
				readfile($file);
			} else {
				echo json_encode( array('errors' => array('file not found')));
			}
		}
    }

	//funcion descargar archivos mediante servicios web
	function download_arch($epi = ""){
        $apiKey = $this->input->get("api_key");
        $id = $this->input->get("id");
        $r = $this->Api_model->download_document($epi, $id, $apiKey);

		if( isset($r['errors'])){
			echo json_encode($r);
		}else{

			$file = $r['path'];

			//$this->Api_model->escribirLog($file, "Download Arch");

			if( file_exists($file) ){
				header('Content-Disposition: attachment; filename="'.basename($file).'"');

				header('Content-type:application/MIME');
				header("Content-length: ".filesize($file));
				readfile($file);
			} else {

				echo json_encode( array('errors' => array('file not found')));
			}
	    }
    }



	///MI FUNCION probar metodo post
	function pruebaPost(){
		$apiKey = $this->input->get("api_key");
		$json = file_get_contents('php://input');
        $data=json_decode($json,true);
		$this->Api_model->escribirLog($data, "pruebaPost");

		$r = $this->Api_model->prueba_post($data,$apiKey);
		echo json_encode($r);

	}

	function upload_document(){
       $apiKey = $this->input->get("api_key");
		if(isset($_POST['nombre'])){

			$nom=$_POST['nombre'];
			$nomin=$_POST['nombreingles'];
			$acro=$_POST['acronimo'];
			$cantidad=$_POST['cantidad'];
			$fch=$_POST['fecha'];
		

		}

			if(isset($_FILES['archivos'])){
               if(is_uploaded_file($_FILES['archivos']['tmp_name'])){
                  if ($_FILES['archivos']){
					$target_dir = "C:/wamp/www/test/";
					$target_file = $target_dir . basename($_FILES['archivos']["name"]);
					$ruta_destino_archivo =$target_file;
					$archivo_ok = move_uploaded_file($_FILES['archivos']['tmp_name'], $ruta_destino_archivo);
					echo "exito subido correctamente";
					
					
				  }


				}
			}

			 $res = $this->get_v7("/_process/crear_maestros_ws", array(
				'api_key' => $apiKey,
				'param[nom]' => $nom,
				'param[nom_ing]'=>$nomin,
				'param[acr]' => $acro,
				'param[can]'=>$cantidad,
				'param[fch]'=>$fch,
				'param[doc]'=>$fichero
			));
			
			$list = json_decode($res);

		if( isset($list->errors) ){
			return array(
				'errors' => $list->errors,
			);
		}else{
			return array(
				'count' => $list->count,
				'total_count' => $list->total_count,
				'documents' => $list->nub_api_msg,
			);
		}

	}

 function obtener_datos(){
	 
	$apiKey = $this->input->get("api_key");
	$id = $this->input->get("id");
	 
    $res = $this->get_v7("/_process/PRUEBA_GET_MONEDAS", array(
        'api_key' => $apiKey,
        'param[cod]' =>$id
    ));
   
    $list = json_decode($res);
 echo $res;

    if( isset($list->errors) ){
        return array(
            'errors' => $list->errors, 
        );
    }else{
        return array(
            'path' => $list->mon_m[0]->name,
        );
    }

}



 function obtener_paises(){
	 
	$apiKey = $this->input->get("api_key");
	$name= $this->input->get("nom");
	 
    $res = $this->get_v7("/_process/PRUEBA_GET_PAISES", array(
        'api_key' => $apiKey,
        'param[nom]' =>$name
    ));
   
    $list = json_decode($res);
    echo $res;

    if( isset($list->errors) ){
        return array(
            'errors' => $list->errors, 
        );
    }else{
        return array(
            'path' => $list->pai_m[0]->name,
        );
    }

}


	private function get_v7($endpoint = '', $data = array(), $url_base = IDERP_API_URL_BASE){

		$json = file_get_contents($url_base.$endpoint."?".http_build_query($data), false);

		if($json !== FALSE){
			return $json;
		}
		else {
			return json_encode(array('errors'=>array('IDERP_API_REST_OFFLINE')));
		}
	}
 
 //Subir por ftp
	function upload_ftp(){
		// FTP server details
		$ftpHost     = 'localhost';
		$ftpUsername = 'ruben';
		$ftpPassword = 'idesa';

		// open an FTP connection
		$connId = ftp_connect($ftpHost) or die("Couldn't connect to $ftpHost");

		// login to FTP server
		$ftpLogin = ftp_login($connId, $ftpUsername, $ftpPassword);
		ftp_pasv($connId,true);
	
		
		
		foreach (ftp_nlist($connId,"")as $val) {
			echo $val."<br>";
			
			
		}
		
		$fichero=basename($_FILES['archivos']["name"]);
		$cadena_aleatoria = substr( md5( time() . rand() ), 0, 8 ); 
		// try to upload file
		if (ftp_put($connId,'/'.$cadena_aleatoria."_".basename($_FILES['archivos']["name"]),$fichero,FTP_ASCII)) {
		
			echo "Fichero ".$cadena_aleatoria."_".basename($_FILES['archivos']["name"])." subido correctamente<br>";
			
			
		}else{
			
			echo "fracaso".$cadena_aleatoria."_".basename($_FILES['archivos']["name"])." NO subido correctamente<br>";
		}
	    
		// close the connection
		ftp_close($connId);
		
		
		
	}
   
   
   
   
  

	/* Fin de funciones originales */


	 function ctrl_accesos_get_matriculas() {
        $apiKey = $this->input->get("api_key");
		$fecha = $this->input->get("fecha");
        echo json_encode($this->Api_model->accesos_get_matriculas($fecha, $apiKey));
    }

	function documents_cloud($epi = "") {
        $apiKey = $this->input->get("api_key");
		$order = $this->input->get("order");
        echo json_encode($this->Api_model->get_documents_cloud($epi, $order, $apiKey));
    }

	function documents_produccion($epi = "") {
        $apiKey = $this->input->get("api_key");
		$order = $this->input->get("order");
        echo json_encode($this->Api_model->get_documents_produccion($epi, $order, $apiKey));
    }

	function download_doc_cloud($epi = "") {
        $apiKey = $this->input->get("api_key");
        $id = $this->input->get("id");
        $r = $this->Api_model->download_document_cloud($epi, $id, $apiKey);

		if( isset($r['errors'])){
			echo json_encode($r);
		}else{

			$file = $r['path'];

			if( file_exists($file) ){
				header('Content-type: application/pdf');
				header("Content-length: ".filesize($file));
				readfile($file);
			} else {
				echo json_encode( array('errors' => array('file not found')));
			}
		}
    }

	function download_doc_produccion($epi = "") {
        $apiKey = $this->input->get("api_key");
        $id = $this->input->get("id");
        $r = $this->Api_model->download_document_produccion($epi, $id, $apiKey);

		if( isset($r['errors'])){
			echo json_encode($r);
		}else{

			$file = $r['path'];

			if( file_exists($file) ){
				header('Content-type: application/pdf');
				header("Content-length: ".filesize($file));
				readfile($file);
			} else {
				echo json_encode( array('errors' => array('file not found')));
			}
		}
    }


}

/* End of file api.php */
/* Location: ./application/controllers/api.php */