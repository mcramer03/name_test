/*
 * Result container plugin - attach this to results table to display results
 */

$.fn.resultContainer = function() {
    
    var thisContainer = this;
    
    /*
     * Display results in table
     */
    
    this.displayResults = function(names) {
        
        $("#results_count").html(names.length);
        
        //Reset html
        
        thisContainer.html("");
        
        //Display results
        
        for(var i in names) {
            
            thisContainer.append("<tr><td>"+names[i].id+"</td><td>"+names[i].first_name+"</td><td>"+names[i].last_name+"</td></tr>");
            
        }
                        
    };
    
    return this;
    
};