#Name Test

Name test is a single page website allowing full text searching of names. This site, created from FuelPHP for the backend and jQuery for the frontend, consists of front end demo, and a back end web service (api).

## API (web service)

The API can be found at /api/names/ with the following methods:

* /api/names/search - search for names by parameter "term" with optional parameter "dupes" to remove duplicate
* /api/names/get_names - retrieve all name in the database, in order do use front end full text searching