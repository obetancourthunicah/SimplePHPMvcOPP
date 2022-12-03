<?php

namespace Utilities\Paypal;


use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     */
    public static function environment()
    {
        $clientId = \Utilities\Context::getContextByKey("PAYPAL_CLIENT_ID");
        $clientSecret = \Utilities\Context::getContextByKey("PAYPAL_CLIENT_SECRET");
        $enviroment = \Utilities\Context::getContextByKey("PAYPAL_CLIENT_ENV");
        if ($enviroment == 'PRD') {
            return new ProductionEnvironment($clientId, $clientSecret);
        } else {
            return new SandboxEnvironment($clientId, $clientSecret);
        }
    }
}
