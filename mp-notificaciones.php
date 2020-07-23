<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Credenciales
MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

switch($_POST["type"]) {
    case "payment":
        $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
        echo "Payment: " . $payment;
        break;
    case "plan":
        $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
        echo "Plan: " . $plan;
        break;
    case "subscription":
        $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
        echo "Subscription: " . $plan;
        break;
    case "invoice":
        $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
        echo "Invoice: " . $plan;
        break;
}

?>