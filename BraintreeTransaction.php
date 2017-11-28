<?php
require_once '/var/www/zeta.trollandtoad.com/vendor/braintree/braintree_php/lib/Braintree.php';
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('gx7yfcfb8k4rnxzr');
Braintree_Configuration::publicKey('m2f9dj3m7fd9wb6m');
Braintree_Configuration::privateKey('862195f02b6731dccb8762baf1bb9ee8');

$ClientData = file_get_contents('php://input');

          $result = Braintree_Transaction::sale([
          'amount' => '10.00',
          'paymentMethodNonce' => $ClientData,
          'options' => [
          'submitForSettlement' => True
          ]]);

          if($result->success) {
            echo("Transaction communication was a success. Transaction was " . $result->transaction->status);
          }
          else
          {
            echo("We Failed " . $result->errors->deepAll());
          }
?>