<?php
require_once '/var/www/zeta.trollandtoad.com/vendor/braintree/braintree_php/lib/Braintree.php';
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('gx7yfcfb8k4rnxzr');
Braintree_Configuration::publicKey('m2f9dj3m7fd9wb6m');
Braintree_Configuration::privateKey('862195f02b6731dccb8762baf1bb9ee8');

$authentication  = "'".Braintree_ClientToken::generate()."'";

echo("<script type='text/javascript'> var authentication = " . $authentication . "</script>");
?>
<!-- Material Design inspired Hosted Fields theme -->

<!-- Icons are taken from the material design library https://github.com/google/material-design-icons/ -->

<!--[if IE 9]>
<style>

.panel {
  margin: 2em auto 0;
}

</style>
<![endif]-->
<head><link rel="stylesheet" type="text/css" href="braintreetest.css"></head>
<form id="cardForm" method = "POST" action = "#">
  <div class="panel">
    <header class="panel__header">
      <h1>TNT Hosted Fields Credit Card Payment Demo</h1>
    </header>

    <div class="panel__content">
      <div class="textfield--float-label">
        <label class="hosted-field--label" for="card-number">
         <span class="icon">
         <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg></span> Card Number 
        </label>
        <div id="card-number" class="hosted-field"></div>
      </div>

      <div class="textfield--float-label">
        <label class="hosted-field--label" for="firstname">
           <span class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/></svg>
         </span> 
          First Name</label>
        <div id="firstname" class="nonhosted-field"><input type="text" placeholder="First Name" name="firstName"></div>
      </div>

      <div class="textfield--float-label">
        <label class="hosted-field--label" for="lastname">
           <span class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/></svg>
         </span> 
          Last Name</label>
        <div id="lastname" class="nonhosted-field"><input type="text" placeholder="Last Name" name="lastname"></div>
      </div>

      <div class="textfield--float-label">
        <label class="hosted-field--label" for="expiration-date">
           <span class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z"/></svg>
         </span> 
          Expiration Date</label>
        <div id="expiration-date" class="hosted-field"></div>
      </div>

      <div class="textfield--float-label">
        <label class="hosted-field--label" for="cvv">
          <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
            </span>
            CVV</label>
        <div id="cvv" class="hosted-field"></div>
      </div>

      <div class="textfield--float-label">
        <label class="hosted-field--label" for="billingaddstreet">
           <span class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
          <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
         </span> 
          Billing Address Street</label>
        <div id="billingaddstreet" class="nonhosted-field"><input type="text" name="billingAddressStreet" placeholder="Billing Address"></div>
      </div>

      <div class="textfield--float-label">
        <label class="hosted-field--label" for="ext-address">
           <span class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
          <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
         </span> 
          Billing Address Extended</label>
        <div id="ext-address" class="nonhosted-field"><input type="text" name="billingAddressExtended" placeholder="Billing Address Extended"></div>
      </div>

      <div class="textfield--float-label">
        <label class="hosted-field--label" for="postal-code">
           <span class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
         </span> 
          Postal Code</label>
        <div id="postal-code" class="hosted-field"></div>
      </div>
    </div>

    <footer class="panel__footer">
      <button class="pay-button">Pay</button>
    </footer>
  </div>
</form>
<!-- Load the required client component. -->
    <script src="https://js.braintreegateway.com/web/3.26.0/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.26.0/js/hosted-fields.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

    <script src="braintreetest.js"></script>