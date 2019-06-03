<?php

// Simple example to setup and retrieve all data from a table 

// If using Composer
// require 'vendor/autoload.php';

include('variables.php');

// if not using composer, uncomment this
include('../src/Airtable.php');
include('../src/Request.php');
include('../src/Response.php');


use TANIOS\Airtable\Airtable;

$airtable = new Airtable(array(
    'api_key'   => $api_key,
    'base'      => $table_main
));

// Get all entries from the table 'Deals' where the 'Status' is 'New'
$params = array(
    "maxRecords" => 175,
    "pageSize" => 50,
);

$request = $airtable->getContent( 'Main', $params );

do {

    $response = $request->getResponse();

    var_dump( json_encode($response[ 'records' ]) );

}
while( $request = $response->next() );
