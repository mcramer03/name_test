<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Name Search Demo</title>

    </head>

    <body style="overflow-y:scroll;">

        <div class="container">
        
            <header class="row jumbotron hero-spacer">
                            
                <h1>Name Search Demo</h1>
                            
            </header>
            
            <div class="row" id="search_container">
                
                <div class="col-md-3 form-group">
                    
                    <input type="text" class="form-control" data-id="search_term" />
                
                </div>
                
                <div class="col-md-1">
                    
                    <button class="form-control btn-primary" data-id="search_submit">Search</button>
                    
                </div>
                
                <div class="col-md-3"></div>
                
                <div class="col-md-1"><h4>Options:</h4></div>
                
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" data-id="search_dupe"> Avoid duplicates
                        </label>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" data-id="search_instant" > Instant results
                        </label>
                    </div>
                </div>
               
            </div>
            
            <div class="row">
                
                <hr>
                
            </div>
            
            <div class="row">
                
                <div class="col-md-12">
                    
                    <h3>Results (<span id="results_count">0</span>)</h3>
                    
                </div>
                
                <div class="col-md-12">
                    
                    <table class="table">
                        
                        <thead>
                            
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                            
                        </thead>
                        
                        <tbody id="results_container">
                            
                            
                            
                        </tbody>
                        
                    </table>
                    
                </div>
                
            </div>
            
            <div class="row">
                
                <div class="col-md-12">
                    
                    <hr>
                    
                </div>

            </div>
                
            <div class="row">
                
                <div class="col-md-12">
                    
                    <h4>Ajax Request</h4>
                    
                </div>
                
                <div class="col-md-12">
                    
                    <pre id="ajax_request"></pre>
                    
                </div>
                
            </div>
            
            <div class="row">
                
                <div class="col-md-12">
                    
                    <h4>Ajax Response</h4>
                    
                </div>
                
                <div class="col-md-12">
                    
                    <pre id="ajax_response"></pre>
                    
                </div>
                
            </div>

        </div>

    </body>
    
    <link rel="stylesheet" type="text/css" href="/assets/css/style.min.css" />

    <script type="text/javascript" src="/assets/js/script.min.js"></script>

</html>