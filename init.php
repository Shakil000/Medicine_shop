  <script type="text/javascript">
  Stripe.setPublishableKey('pk_test_btBDp7SGVLYdhx0Pa8qW4nTw00Q0vvev2i');
$(document).ready(function() {
$("#paymentForm").submit(function(event) {
// create stripe token to make payment
Stripe.createToken({
number: $('#card_number').val(),
cvc: $('#cvv').val(),
exp: $('#expiry').val(),
}, handleStripeResponse);
return false;
});
});
// handle the response from stripe
function handleStripeResponse(status, response) {
console.log(JSON.stringify(response));
if (response.error) {
$('#makePayment').removeAttr("disabled");
$(".paymentErrors").html(response.error.message);
} else {
var payForm = $("#paymentForm");
//get stripe token id from response
var stripeToken = response['id'];
//set the token into the form hidden input to make payment
payForm.append("<input type='hidden' name='stripeToken' value='" + stripeToken + "' />");
payForm.get(0).submit();
}
}
</script>
