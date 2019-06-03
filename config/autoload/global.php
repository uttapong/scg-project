<?php
return [
    'cache' => [
      'enabled'  => true,
      'path'     => __DIR__ . '/../../data/cache/',
      'lifetime' => 3600 // in seconds
    ],
    'google_map' => [
        'endPoint' => 'https://maps.googleapis.com/maps/api/place/',
        'mapKey'       => 'AIzaSyCQWpAtVowR7C1BRlml8_LeRMWSpKUZ1HQ',
    ],
];