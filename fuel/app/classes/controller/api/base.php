<?php

class Controller_Api_Base extends \Controller
{

    /*
     * Create the error response
     * @message - error message
     */
    
    protected function error($message) {
        
        return $this->_response(false, $message);
        
    }
    
    /*
     * Create the success response
     * @data - data to return
     */
    
    protected function success($data, $message = "") {
        
        return $this->_response(true, $message, $data);
        
    }
    
    /*
     * Return API response as json encoded string
     * @data - array
     */
    
    private function _response($status, $message, $data = array()) {
        
        return json_encode(array(
            "status" => $status,
            "message" => $message,
            "data" => $data
        ));
        
    }

}
