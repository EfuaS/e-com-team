<?php

displayOrderController()

$pid = $_GET['pid'];
$qty = $_GET['qty'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            
        <form id="paymentForm">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email-address" required />
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="tel" id="amount" value = "<?php echo $amt; ?>" required />
                </div>
                <div class="form-group">
                    <label for="ref">Reference</label>
                    <input type="text" id="ref" required />
                </div>
                <div class="form-group">
                    <input hidden type="tel" id="productID" value = "<?php echo $pid; ?>" />
                </div>

                <div class="form-group">
                    <label for="currency">Currency</label>
                    <input type="text" id="currency" value="$" required />
                </div>

                <div class="form-submit">
                    <button type="submit" onclick="payWithPaystack()"> Pay </button>
                </div>
        </form>
<script src="https://js.paystack.co/v1/inline.js"></script> 



<script> 
            var paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener('submit', payWithPaystack, false);
            function payWithPaystack(e) {
                let email = document.getElementById('email-address').value
                let amount = document.getElementById('amount').value
                let curr = document.getElementById('currency').value
                let productid = document.getElementById('productID').value
                let qty = document.getElementById('qty').value


                e.preventDefault()
                var handler = PaystackPop.setup({
                    key: 'pk_test_ff644bb327c10e5393677f660553c3fffec45468', // Replace with your public key
                    email: document.getElementById('email-address').value,
                    amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
                    currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
                    ref: document.getElementById('ref').value, // Replace with a reference you generated
                    callback: function(response) {
                    //this happens after the payment is completed successfully
                    var reference = response.reference;
                    alert('Payment complete! Reference: ' + reference);
                    // Make an AJAX call to your server with the reference to verify the transaction
                    window.location = `../actions/process_payment.php?ref=${reference}&email=${email}&amount=${amount}&curr=${curr}&qty=${qty}&pid=${productid}`
                    },
                    onClose: function() {
                    alert('Transaction was not completed, window closed.');
                    },
                });
            handler.openIframe();
            }
</script>
</body>
</html>