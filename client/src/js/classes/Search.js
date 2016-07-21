/*
 * Search container plugin - attach this to search form to get user input
 */

$.fn.searchContainer = function(result) {

    var thisContainer = this;
    
    var resultContainer = result;
        
    /*
     * Data object to store information/flags
     */
    
    this.Data = {
        
        url_search : "/api/names/search",
        url_get : "/api/names/get_names",

        instant : false,
        dupes : 0,
        names : [],
        lunr: false
        
    };
    
    /*
     * Input object to allow quick reference to DOM elements
     */
    
    this.Inputs = { 
        search_term     : thisContainer.find("input[data-id=search_term]"),
        search_submit   : thisContainer.find("button[data-id=search_submit]"),
        search_dupe     : thisContainer.find("input[data-id=search_dupe]"),
        search_instant  : thisContainer.find("input[data-id=search_instant]")
    };
    
    /*
    * Display ajax request
    */

    this.displayAjaxRequest = function(url) {

        $("#ajax_request").html(url);

    };

    /*
    * Display ajax response
    */

    this.displayAjaxResponse = function(text) {

        $("#ajax_response").html(text);

    };

    /*
     * Load instant results
     */
    
    this.loadInstantResults = function() {
        
        thisContainer.displayAjaxRequest(thisContainer.Data.url_get);

        $.ajax({
            url: thisContainer.Data.url_get,
            dataType : "json",
            success : function(data, status, jqXHR) {
                
                thisContainer.displayAjaxResponse(jqXHR.responseText);

                if(data.status) {
                
                    thisContainer.Data.names = data.data;
                
                    thisContainer.Data.lunr = lunr(function() {
                        this.field('first_name');
                        this.field('last_name');
                        this.ref('id');
                    });
                    
                    for(var i in thisContainer.Data.names) {
                        
                        thisContainer.Data.lunr.add({
                            id: thisContainer.Data.names[i].id,
                            first_name: thisContainer.Data.names[i].first_name,
                            last_name: thisContainer.Data.names[i].last_name
                        });
                        
                    }
                
                } else {
                    
                    alert(data.message);
                    
                }
                
            },
            error : function() {
                
                alert("Sorry, something went wrong. Please try again");
                
            }
        });
        
    };
    
    /*
     * Display instant search results
     */
    
    this.instantSearch = function() {
                
        var results = thisContainer.Data.lunr.search(thisContainer.Data.term);
            
        var arr = [], dupe_check = [];

        for(var i in results) {

            for(var x in thisContainer.Data.names) {

                var dupe_string = thisContainer.Data.names[x].first_name + thisContainer.Data.names[x].last_name;

                if(thisContainer.Data.names[x].id == results[i].ref && (thisContainer.Data.dupes == 0 || $.inArray(dupe_string, dupe_check) === -1)) {

                    arr.push(thisContainer.Data.names[x]);
                    
                    dupe_check.push(thisContainer.Data.names[x].first_name + thisContainer.Data.names[x].last_name);
                    
                }

            }

        }

        resultContainer.displayResults(arr);
        
    };
    
    /*
     * When user input changes, if instant search is turned on, 
     */
    
    this.Inputs.search_term.on("keyup", function() {
       
        thisContainer.Data.term = $(this).val();
       
        if(thisContainer.Data.instant) {
            
            thisContainer.instantSearch();
                        
        }
        
    });
    
    /*
     * When user clicks on search, call API and get response
     */
    
    this.Inputs.search_submit.on("click", function() {

        thisContainer.displayAjaxRequest(thisContainer.Data.url_search);
              
        $.ajax({
            url: thisContainer.Data.url_search,
            data: {
                term : thisContainer.Data.term,
                dupes : thisContainer.Data.dupes
            },
            dataType : "json",
            success : function(data, status, jqXHR) {
                
                thisContainer.displayAjaxResponse(jqXHR.responseText);

                if(data.status) {
                
                    resultContainer.displayResults(data.data);
                
                } else {
                    
                    alert(data.message);
                    
                }
                
            },
            error : function() {
                
                alert("Sorry, something went wrong. Please try again");
                
            }
        });
        
    });
    
    /*
     * Set duplicates flag
     */
    
    this.Inputs.search_dupe.on("change", function() {
        
        thisContainer.Data.dupes = $(this).is(":checked") ? 1 : 0;
        
        if(thisContainer.Data.instant) {
            
            thisContainer.instantSearch();
            
        }
                    
    });
    
    /*
     * Set instant results flag
     */
    
    this.Inputs.search_instant.on("change", function() {
       
        thisContainer.Data.instant = $(this).is(":checked");
        
        if(thisContainer.Data.instant) {
                        
            thisContainer.loadInstantResults();
            
        }
        
    });
   
};