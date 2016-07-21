<?php

namespace Model;

class Names extends \Model {
    
    protected static $_properties = array('id', 'first_name', 'last_name');
    
    protected static $_table_name = 'names';
    
    /*
     * Find names by a term
     * @term - (string) Term to search for
     * @dupes - (bool) Include duplicates or not
     */
    
    public static function find_names($term, $dupes = false) {
        
        /*
         * Using full SQL with binding, rather than ORM methods, to prove knowledge of MySQL :)
         */
                    
        $sql = "SELECT `names`.* FROM `names` WHERE MATCH(`first_name`, `last_name`) AGAINST (:search_term IN BOOLEAN MODE) AND CONCAT(first_name, ' ', last_name) LIKE :search_term_like";
            
        /*
         * Remove duplicates if needed by grouping results by first/last name
         */
        
        if($dupes) {
            
            $sql .= " GROUP BY `first_name`, `last_name`";
            
        }
                
        /*
         * Run query and return results
         */
        
        $search_term_like = '%' . $term . '%';
        
        return \DB::query($sql)
                ->bind("search_term", $term)
                ->bind("search_term_like", $search_term_like)
                ->execute()->as_array();
                
    }
    
    /*
     * Get all names
     */
    
    public static function get_names() {
        
        return \DB::select()->from("names")->execute()->as_array();
        
    }
    
}