<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout Page</title>
<script src="../assets/js/script.js"></script>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.container {
  display: flex;
  padding: 100px; /* Increased padding */
  max-width: 900px; /* Increased width */
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  position: relative; /* Ensures positioning context for the image */
}

.form-image {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0.5;
  border-radius: 8px; /* Match container border radius */
}

/* Add any additional CSS styles for the form elements, payment options, etc. */

.left, .right {
  flex: 1;
  z-index: 1; /* Ensure content is above the image */
  position: relative; /* Ensure proper stacking context */
  padding: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.left {
  border-right: 1px solid #ccc;
}

h2 {
  margin-top: 0;
}

form {
  margin-bottom: 20px;
  width: 100%;
  max-width: 300px; /* Adjust max-width as needed */
}

label {
  font-weight: bold;
}

input[type="text"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type="radio"] {
  margin-right: 5px;
}

button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3;
}

.hidden {
  display: none;
}
</style>
</head>
<body>


<div class="container">
<img src="../assets/images/payment.jpg" alt="Form Image" class="form-image">
  <div class="left">
    <h2>Billing Address</h2>
    <form id="billingForm">
      <label for="fullName">Full Name</label>
      <input type="text" id="fullName" name="fullName" required>
      <label for="email">Email</label>
      <input type="text" id="email" name="email" required>
      <label for="address">Address</label>
      <input type="text" id="address" name="address" required>  
      <label for="city">City</label>
      <input type="text" id="city" name="city" required>
      <label for="pin">Pin</label>
      <input type="text" id="pin" name="pin" required>
    </form>
  </div>
  
  <div class="right">
    <h2>Payment Options</h2>
    <div id="paymentOptions">
      <input type="radio" id="creditCard" name="payment" value="creditCard">
      <label for="creditCard">Credit Card</label><br>
      <input type="radio" id="upi" name="payment" value="upi">
      <label for="upi">UPI</label><br>
      <input type="radio" id="cashOnDelivery" name="payment" value="cashOnDelivery">
      <label for="cashOnDelivery">Cash on Delivery</label><br>
    </div>
    
    <div id="creditCardDetails" class="hidden">
      <h3>Enter Credit Card Details</h3>
      <form id="creditCardForm">
        <label for="cardNumber">Card Number</label>
        <input type="text" id="cardNumber" name="cardNumber" required><br>
        <label for="expiryDate">Expiry Date</label>
        <input type="text" id="expiryDate" name="expiryDate" required><br>
        <label for="cvv">CVV</label>
        <input type="text" id="cvv" name="cvv" required><br>
      </form>
    </div>
    
    <div id="upiDetails" class="hidden">
      <h3>Enter UPI ID</h3>
      <form id="upiForm">
        <input type="text" id="upiId" name="upiId" required><br>
      </form>
    </div>
    
    <button id="checkoutButton">Checkout</button>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const creditCardRadio = document.getElementById('creditCard');
  const upiRadio = document.getElementById('upi');
  const cashOnDeliveryRadio = document.getElementById('cashOnDelivery');
  const creditCardDetails = document.getElementById('creditCardDetails');
  const upiDetails = document.getElementById('upiDetails');

  creditCardRadio.addEventListener('change', function() {
    if (creditCardRadio.checked) {
      creditCardDetails.classList.remove('hidden');
      upiDetails.classList.add('hidden');
    }
  });

  upiRadio.addEventListener('change', function() {
    if (upiRadio.checked) {
      upiDetails.classList.remove('hidden');
      creditCardDetails.classList.add('hidden');
    }
  });

  cashOnDeliveryRadio.addEventListener('change', function() {
    if (cashOnDeliveryRadio.checked) {
      upiDetails.classList.add('hidden');
      creditCardDetails.classList.add('hidden');
    }
  });

  const checkoutButton = document.getElementById('checkoutButton');
  checkoutButton.addEventListener('click', function() {
    const billingForm = document.getElementById('billingForm');
    const creditCardForm = document.getElementById('creditCardForm');
    const upiForm = document.getElementById('upiForm');

    if (creditCardRadio.checked) {
      if (creditCardForm.reportValidity()) {
        alert('Payment successful! Thank you for your purchase.');
      }
    } else if (upiRadio.checked) {
      if (upiForm.reportValidity()) {
        alert('Payment successful! Thank you for your purchase.');
      }
    } else if (cashOnDeliveryRadio.checked) {
      if (billingForm.reportValidity()) {
        alert('Order placed! You will pay on delivery.');
      }
    } else {
      alert('Please select a payment option.');
    }
  });

});
</script>

</body>
</html>
