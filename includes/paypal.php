<?php 

require 'paypal/autoload.php';

define('URL_SITIO', 'http://localhost:8888/gdlwebcamp/');

// Instalación de API de Paypal
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AYOek6lzc6tvQGo9au4Gvgdyagg0_d7E3CZEKlJV7sW_XKEpTLbiv1jM8o9n-47wNIO_n913iamcuckt', // ClienteID
        'EKtfqLM5YucjnZmyCFZVfiOdI8wWhVX9iDxiv0o7tFU2ukHc4eNgrhhRVpy35Tpjc2vU_QgpkTNL-Yna' // Secret
    )
);


// Estructura que debe haber en el config.php

// $apiContext = new \Paypal\Rest\ApiContext(
//     new \Paypal\Auth\OAuthTokenCredential(
//          // ClienteID
//          // Secret
//     )
// );