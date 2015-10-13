<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

ini_set('display_errors', 1);
error_reporting(E_ALL);


class Contacto extends CI_Controller {

public function enviar()
	{
			

				$this->config->load("mailing");
				$this->load->library('Mailing');
				$msj = $this->input->post();

				$str = "Datos del contacto:<br>";
				
				foreach ($msj as $item=>$value) {
				
					$str .= ($value) ? $item.": ".htmlspecialchars($value)."<br>" : "";
				
				}
				
				if ( $this->mailing->enviar("marcelakhouri@yahoo.com.ar",$str,"Marcela Khouri Web - Contacto") ) {
	
					echo json_encode(
									array("titulo"=>"Contacto",
									"mensaje"=>"<p><strong>Su contacto se ha enviado correctamente. A la brevedad me comunicaré usted. Muchas Gracias!</strong></p>"
									));
					
				} else {
					
					echo json_encode(
									array("titulo"=>"Contacto",
									"mensaje"=>"<p>Ha ocurrido un error al enviar su mensaje. Intentelo nuevamente o comun&iacute;quese  telef&oacute;nicamente. Muchas Gracias!</p>"
								));
				}
				

	}	

}