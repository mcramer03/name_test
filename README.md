#Name Test

Name test is a single page website allowing full text searching of names. This site, created from FuelPHP for the backend and jQuery for the frontend, consists of front end demo, and a back end web service (api).

## Live Demo

A live demo is available here: http://mikecramer.tk/

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

## Frontend compilation

Grunt is used to join multiple files from a directory tree before creating a single public javascript and css file for use by the front end. This not only makes code easier to follow and, especially on larger projects, keeps things organised. But also allows for a single javascript / css file to be created, potentially saving on browser requests and bandwidth, making your website quicker and server load lower.

## Unit testing

Unit testing has been integrated using FuelPHP Oil and PHPunit. Test results can be found here: http://prntscr.com/bvpfve

On such a small project there is not much to test but tests have been set up to check that the results from the "search" and "get_names" methods of the model "names" actually return records.

Although this is a small project with not much to go wrong, automated unit testing is still an essential part of development especially as your project and development team start to grow.

Unit testing could be combined nicely with integration testing, especially in the case of web services / APIs, to include testing the controllers of the application, ensuring 100% code coverage.