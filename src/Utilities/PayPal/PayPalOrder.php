<?php

namespace Utilities\Paypal;

use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class PayPalOrder
{
    private $_request;
    private $_body = array(
        "intent"=>"CAPTURE",
        "purchase_units" => array(),
        "application_context" => array(
            "cancel_url"=>"",
            "return_url"=>""
        )
    );
    private $_purchaseUnitTemplate = array(
        "reference_id"=>"",
        "custom_id" => "",
        "amount"=>array(
            "value"=>"0.00",
            "currency_code"=>"USD",
            "breakdown" => array(
                "item_total" => array(
                    "currency_code" => "USD",
                    "value" => "0.00"
                    ),
                "shipping" => array(
                    "currency_code" => "USD",
                    "value" => "0.00"
                    ),
                "handling" => array(
                    "currency_code" => "USD",
                    "value" => "0.00"
                    ),
                "tax_total" => array(
                    "currency_code" => "USD",
                    "value" => "0.00"
                    ),
                "shipping_discount" => array(
                    "currency_code" => "USD",
                    "value" => "0.00"
                    ),
                )
        ),
        "items" => array(

        )
    );
    private $_itemTemplate = array(
        "name" => "",
        "description" => "",
        "sku" => "",
        "unit_amount" =>
        array(
            "currency_code" => "USD",
            "value" => "0.00",
        ),
        "tax" =>
        array(
            "currency_code" => "USD",
            "value" => "0.00",
        ),
        "quantity" => "0",
        "category" => ""
    );

    public function createOrder()
    {
        $this->_request = new OrdersCreateRequest();
        $this->_request->prefer("return=representation");
        $this->_request->body = $this->_body;
        $paypalClient = \Utilities\Paypal\PayPalClient::client();
        $response = $paypalClient->execute($this->_request);
        return array($response->result->links[1], $response);
    }
    public function addItem($name, $description, $sku, $price, $tax, $quantity, $category)
    {
        $newItem = $this->_itemTemplate;
        $newItem["name"] = $name;
        $newItem["description"] = $description;
        $newItem["sku"] = $sku;
        $newItem["unit_amount"]["value"] = (string) $price;
        $newItem["tax"]["value"] = (string) $tax;
        $newItem["quantity"] = (string) $quantity;
        $newItem["category"] = $category;

        $this->addToBody($newItem);
    }

    private function addToBody($newItem)
    {
        $itemTotal = (float) $this->_body["purchase_units"][0]["amount"]["breakdown"]["item_total"]["value"];
        $taxTotal = (float) $this->_body["purchase_units"][0]["amount"]["breakdown"]["tax_total"]["value"];
        $total = (float) $this->_body["purchase_units"][0]["amount"]["value"];

        $this->_body["purchase_units"][0]["items"][] = $newItem;
        $itemTotal += ((float) $newItem["unit_amount"]["value"]  *  (float) $newItem["quantity"]);
        $taxTotal += ((float) $newItem["tax"]["value"]  *  (float) $newItem["quantity"]);
        $total = $itemTotal + $taxTotal;

        $this->_body["purchase_units"][0]["amount"]["breakdown"]["item_total"]["value"] = (string) $itemTotal;
        $this->_body["purchase_units"][0]["amount"]["breakdown"]["tax_total"]["value"] = (string) $taxTotal;
        $this->_body["purchase_units"][0]["amount"]["value"] = (string) $total;

    }

    public function  __construct($referenceID, $cancel_url, $return_url)
    {
        $this->_body["purchase_units"][] = $this->_purchaseUnitTemplate;
        $this->_body["purchase_units"][0]["reference_id"] = (string) $referenceID;
        $this->_body["application_context"]["cancel_url"] = $cancel_url;
        $this->_body["application_context"]["return_url"] = $return_url;
    }
}

?>
