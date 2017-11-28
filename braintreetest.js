braintree.client.create({
  authorization: authentication
}, function(err, clientInstance) {
  if (err) {
    console.error(err);
    return;
  }

  braintree.hostedFields.create({
    client: clientInstance,
      customerId : 'braintreetestTNT',
      vault : true,
      fields: {
      number: {
        selector: '#card-number',
        placeholder: '1111 1111 1111 1111'
      },
      cvv: {
        selector: '#cvv',
        placeholder: '111'
      },
      expirationDate: {
        selector: '#expiration-date',
        placeholder: 'MM/YY'
      },
      postalCode: {
        selector: '#postal-code',
        placeholder : '12345'
      }
    },
      billingAddress: {
      streetAddress: 'test',
      extendedAddress: 'test',
      firstName : 'test',
      lastName : 'test',
      countryName: 'United States'
    }
  }, function(err, hostedFieldsInstance) {
    if (err) {
      console.error(err);
      return;
    }

    hostedFieldsInstance.on('focus', function (event) {
      var field = event.fields[event.emittedBy];
      
      $(field.container).next('.hosted-field--label').addClass('label-float').removeClass('filled');
    });
    
    // Emulates floating label pattern
    hostedFieldsInstance.on('blur', function (event) {
      var field = event.fields[event.emittedBy];
      
      if (field.isEmpty) {
        $(field.container).next('.hosted-field--label').removeClass('label-float');
      } else if (event.isValid) {
        $(field.container).next('.hosted-field--label').addClass('filled');
      } else {
        $(field.container).next('.hosted-field--label').addClass('invalid');
      }
    });
    
    hostedFieldsInstance.on('empty', function (event) {
      var field = event.fields[event.emittedBy];

      $(field.container).next('.hosted-field--label').removeClass('filled').removeClass('invalid');
    });
    
    hostedFieldsInstance.on('validityChange', function (event) {
      var field = event.fields[event.emittedBy];

      if (field.isPotentiallyValid) {
        $(field.container).next('.hosted-field--label').removeClass('invalid');
      } else {
        $(field.container).next('.hosted-field--label').addClass('invalid');  
      }
    });

    $('#cardForm').submit(function (event) {
      event.preventDefault();

      hostedFieldsInstance.tokenize(function (err, payload) {
        if (err) {
          alert(err.message);
          console.log(err);
          return;
        }
        alert('Payment nonce received, sending to server for transaction :: ' + payload.nonce);

        $.ajax({
          type: "POST",
          url: "BraintreeTransaction.php",
          data: payload.nonce,
          success: function(msg) {   
            alert(msg);  
        }
});
      });
    });
  });
});