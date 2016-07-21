<?php

class Test_Model_Names extends TestCase
{
    
    /*
     * Test the search functionality for both duplicates and non-duplicates
     * This test is run knowing that "simon roberts" exists as an entry and is duplicated.
     * As this test is run locally this is ok as we are in control of the test database.
     */
    
    public function test_search() 
    {
        
        $names = Names::find_names("simon roberts", false);
        
        $count = count($names);
        
        $this->assertGreaterThan(0, $count, "Search returned no entries");
                        
        $names = Names::find_names("simon roberts", true);
        
        $this->assertLessThan($count, count($names), "Search returned same number of results");
        
    }
    
    /*
     * Test that the get function returns data
     */
    
    public function test_get()
    {
        
        $names = Names::get_names();
        
        $count = count($names);
        
        $this->assertGreaterThan(0, $count, "Search returned no entries");
        
    }
    
}