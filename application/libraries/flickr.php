<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Flickr {

	
    public function get($method,$extra_params) {

  		$this->CI =& get_instance();
      
        $init_params = array(
            'method'	=> $method,
            'api_key'	=> $this->CI->config->item("flickr_api_key"),
            'format'	=> "php_serial"
        );
        
        $params = $init_params + $extra_params;
        
        $encoded_params = array();
        
        foreach ($params as $k => $v){
        
            $encoded_params[] = urlencode($k).'='.urlencode($v);
        }
        
        
        # llamar a la API y decodificar la respuesta
        #
        
        $url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);
        
        $rsp = file_get_contents($url);
        
        $rsp_obj = unserialize($rsp);
        
        return $rsp_obj;
    
    }

}

/* End of file flickr.php */