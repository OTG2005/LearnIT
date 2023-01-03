<?php
require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/payment-method-styles.css">

<title>Payment methods</title>
</head>

<body>
      <div class="main">
            <h1> Select Payment Method</h1>	
            <p><img class="img-credit-debit" src="img/Credit-debit.png"></p>
            <input type="checkbox" id="credit-debit" onclick="checkMe()">
            <label class="credit-debit"> Credit/Debit Card</label>

            <p><img class="img-online-banking" src="img/online-banking.jpg"></p>
            <input type="checkbox" id="online-banking" name="check" onclick="checkMe()">
            <label class=online-banking for=online-banking> Online Banking</label>

            <p><img class="img-cash" src="img/cash-on-delivery.png"></p>
            <input type="checkbox" id="cash" name="check" onclick="checkMe()" >
            <label class=cash for=cash> Cash </label>
            <br>
            
            <div class="placeorder">
                  <button onclick="return validate()" data-modal-target="#modal" class="placeorder">PLACE ORDER</button>
            </div>
                  <div  id="overlay2"> </div>
                  <div class="modal" id="modal">
                        <div class="modal-header">
                              <div class="title">Confirm Purchase</div>
                              <button data-close-button class="close-button">&times;</button>
                        </div>
                        <div class="modal-body">
                              <p1 style=" display: inline;">Payment method</p1>
                              <p style="margin-left: 230px; display: inline;" id="text" >Credit/Debit Card</p> 
                              <hr>
                              <div class="pay-button">
                                    <button onclick="return backtohome()">Pay</button> 
                              </div>
                        </div>
                  </div>
                  <div  id="overlay"> </div>
            </div>
      </div>
</body>
<script>
      function backtohome(){
            {
                  alert ('Payment Successfull!')
                  return  window.location.href = "index.php?payment=succesfull";      
            }
      }
</script>

<script>
      function validate(){
            var valid = false;
            
            if (document.getElementById("credit-debit").checked){
                  valid=true;
            }
            else if (document.getElementById("online-banking").checked){
                  valid=true;
            }
            else if (document.getElementById("cash").checked){
                  valid=true;
            }
            else{
                  alert("Please select one payment method ")
                  return  location.reload();
            }
      }

      function checkMe(){
      if (document.getElementById("credit-debit").checked){
            return document.getElementById("text").textContent = "Credit/Debit";
            
      }

      else if(document.getElementById("online-banking").checked){
            return document.getElementById("text").textContent = "Online Banking";
      
      }

      else if(document.getElementById("cash").checked){
            return document.getElementById("text").textContent = "Cash";
            
}
}
</script>

<script>
      Checkboxcontrol = [...document.querySelectorAll('.checkbox-input')];

      Checkboxcontrol.forEach((onecheck) => {
            
            onecheck.addEventListener('click', function() {
                  Checkboxcontrol.forEach((onecheck) =>{
                        onecheck.checked = false;
                        

                  })
                  onecheck.checked = true;
            })

      })
                  
</script>

<script>
      const openmodalbutton = document.querySelectorAll('[data-modal-target]');//css selector
      const closemodalbutton = document.querySelectorAll('[data-close-button]');
      const overlay = document.getElementById('overlay');

      openmodalbutton.forEach(button =>{//arrow function(return a value)
            button.addEventListener('click', () => {
                  const modal = document.querySelector(button.dataset.modalTarget)
                  openModal(modal)
            })
      }) 

      closemodalbutton.forEach(button =>{//arrow function(return a value)
            button.addEventListener('click', () => {
                  const modal = button.closest('.modal') //this is inside the modal so cant use query selector 
                  closeModal(modal)
            })
      }) 
      
      function openModal(modal){
            modal.classList.add('active')
            overlay.classList.add('active')
      }

      function closeModal(modal){
            modal.classList.remove('active')
            overlay.classList.remove('active')
            return location.reload();
      }

</script>
<script>
      function checkme(){
            var cb = document.getElementById("credit-debit")
            var text = document.getElementbyId('credit-debit-text');
            if(cb.checked==true){
                  text.style.display="block";
            } else{
                  text.style.display="none";
            }
            
      }

      const totalAmount = localStorage.getItem('total-amount');

      document.getElementById('total-amount').textContent = totalAmount;

</script>







          

