<?php
namespace Utilities\Paypal;

use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PayPalCapture
{
    public static function captureOrder($orderId)
    {
        $request = new OrdersCaptureRequest($orderId);
        $client = PayPalClient::client();
        $response = $client->execute($request);
        return $response;
    }
}

?>
