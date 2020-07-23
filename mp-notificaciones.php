<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Credenciales
MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

$data = json_decode(file_get_contents('php://input'), true);

guardarNotificacion($data);

/*switch($data["type"]) {
    case "payment":
        $payment = MercadoPago\Plan.find_by_id($_POST["id"]);
         
        break;
    case "plan":
        $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
        guardarNotificacion($plan); 
        break;
    case "subscription":
        $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
        guardarNotificacion($plan); 
        break;
    case "invoice":
        $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
        guardarNotificacion($plan); 
        break;
}*/

function guardarNotificacion($notificacion){
    //Creamos el JSON
    $json_string = json_encode($notificacion);
    $file = 'mp-notification-'.$notificacion["type"].$notificacion["id"].'.json';
    file_put_contents($file, $json_string);
    http_response_code(200);
}

?>