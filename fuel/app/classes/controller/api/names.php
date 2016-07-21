<?php

use \Model\Names;

class Controller_Api_Names extends Controller_Api_Base
{

    /*
     * Search for names by search term, optionally excluding duplicates
     */
    
    public function action_search()
    {
        
        /*
         * Check if required query parameter "term" exists
         */
        
        if(!Input::get('term')) {
            
            return $this->error("Error - missing required parameter 'term'");
            
        }
        
        /*
         * Search for names by term
         */
        
        $names = Names::find_names(Input::get('term'), (bool) Input::get('dupes', false));
        
        /*
         * Output result
         */
        
        return $this->success($names);
        
    }
    
    /*
     * Get all names
     */
    
    public function action_get_names()
    {
        
        /*
         * Get all names from model
         */
        
        $names = Names::get_names();
        
        /*
         * Output result
         */
        
        return $this->success($names);
        
    }

}
