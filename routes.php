<?php 

$router->get('/', 'HomeController@index');
$router->get('/listings', 'ListingController@index');
$router->get('/listings/create', 'ListingController@create');
$router->get('/listing', 'ListingController@show');
$router->post('/listings', 'ListingController@store');
$router->delete('/listings/{id}', 'listingController@destroy');