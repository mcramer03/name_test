#Name Test

Name test is a single page website allowing full text searching of names. This site, created from FuelPHP for the backend and jQuery for the frontend, consists of front end demo, and a back end web service (api).

## Live Demo

A live demo is available here: http://ec2-52-208-192-29.eu-west-1.compute.amazonaws.com/

## Installation

Installation should be done on a standard WAMP or LAMP server, with PHP 5.3+.

A MySQL db should be created locally with database `test_database` created. SQL queries are available in the GIT repository (test_database.sql) which will create the table `names` and fill the table with names. User `fuel_user`@`localhost` should be created with at least SELECT permissions on `test_database`.

There are no further dependencies to be installed but should you wish to pull the repository and make changes to front end JS/CSS, you will need the following:

* npm - node package manager
* grunt
* bower (jquery/bootstrap/bootstrap-css/lunr.js)
* grunt-contrib-concat
* grunt-contrib-bower-concat
* grunt-contrib-uglify

## API (web service)

The API can be found at /api/names/ with the following methods:

* /api/names/search - search for names by parameter "term" with optional parameter "dupes" to remove duplicate
* /api/names/get_names - retrieve all name in the database, in order to use front end full text searching

## Frontend (demo)

The front end demo enables you to call the web service conveniently and see the request/response from it. This uses Bootstrap CSS for a quick UX design, and jQuery for user interface control.

Asside from using the web service's search functionality, you can also enable "instant search" to pull the entire result set from the database, and instantly search through the results using a full text javascript library.




unit testing: http://prntscr.com/bvpfve