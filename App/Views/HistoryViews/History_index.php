<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id="Main-Section">
      <!--Back to top button-->
      <a id="Back-To-Top-Button"></a>
      <div id="Top-Filter-Section">
      </div>
      <div id="Main-Results-Container">
        <div id="Main-Results-Wrapper">
          <?php if (empty($data['GetPreviousBookingDetails'])): ?>
            <div class="History-Booking-Container">
              <div class="History-Booking-Left-Container text-center">
              </div>
              <div class="History-Booking-Middle-Container text-center">
                <hr>
                <p >No History is made by you</p>
              </div>
              <div class="History-Booking-Second-Middle-Container">
              </div>
              <div class="History-Booking-Right-Container">
              </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
          <?php endif; ?>
          </div>
        <div id="Main-Results-Wrapper">
          <?php foreach($data['GetPreviousBookingDetails'] as $GetPreviousBookingDetails): ?>
            <div id="History-Booking-Section">
            <div class="History-Booking-Container">
            <!--This is where the car picture located-->
            <div class="History-Booking-Left-Container">
              <img src="<?= BASEURL; ?>/<?= $GetPreviousBookingDetails['Car_Picture'];?>">
            </div>
            <!--This is where all the details of Booking-->
            <div class="History-Booking-Middle-Container">
              <span class="Horizontal-Cars-Name"><?= $GetPreviousBookingDetails['Car_Name'];?></span>
              <span class="Horizontal-Cars-Details">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/gender-neutral-user.png"/>  <?= $GetPreviousBookingDetails['Car_Passengers'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/red-purse.png"/>  <?= $GetPreviousBookingDetails['Car_Bag_Quantity'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/car-door.png"/>  <?= $GetPreviousBookingDetails['Car_Number_Of_Door'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/automatic.png"/>  <?= $GetPreviousBookingDetails['Car_System'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/winter.png"/>  <?php if($GetPreviousBookingDetails['Car_Cooling_System'] == "True"){echo "Aircon";}else{echo "Non-Aircon";}?></li>
                </ol>
              </span>
              <span class="Horizontal-Cars-Location">
                <ol>
                  <li class=""><img src="https://img.icons8.com/ios-glyphs/18/000000/building.png"/>  <?= $GetPreviousBookingDetails['Departure'];?></li>
                  <li class=""><img src="https://img.icons8.com/ios/18/000000/map-pin.png"/>  <?= $GetPreviousBookingDetails['Destination'];?></li>
                  <li class=""><img src="https://img.icons8.com/ios/18/000000/date-span.png"/>  <?php if($GetPreviousBookingDetails['Period_Of_Book'] == 0){echo "Charges Per Ride";}else{echo $GetPreviousBookingDetails['Period_Of_Book']." Day";};?></li>
                </ol>
              </span>
            </div>
            <!--This is where all the details of Price-->
            <div class="History-Booking-Second-Middle-Container">
                <div class="History-Booking-Car-Tilte">
                  Price Summary
                </div>
                <div class="History-Booking-Car-Charges-Wrapper">
                  <div class="Book-Car-Charge-Name">
                    Rental Car Charges
                  </div>
                  <div class="Book-Car-Charge-Price">
                    RM <?= $GetPreviousBookingDetails['Initial_Price'];?>
                  </div>
                  <div class="Book-Car-Period">
                    Rental Period: <?php if($GetPreviousBookingDetails['Period_Of_Book'] == 0){echo "Charges Per Ride";}else{echo $GetPreviousBookingDetails['Period_Of_Book']." Day";};?>
                  </div>
                  <div class="Book-Car-Charge-Name">
                    Car Taxation
                  </div>
                  <div class="Book-Car-Charge-Price">
                    RM <?= $GetPreviousBookingDetails['Tax'];?>
                  </div>
                  <div class="Book-Car-Charge-Name">
                    Car Deposit
                  </div>
                  <div class="Book-Car-Charge-Price">
                    RM <?= $GetPreviousBookingDetails['Car_Deposit'];?>
                  </div>
                </div>
                <div class="History-Booking-Car-Charges-Wrapper">
                  <div class="History-Booking-Car-Estimate-Price-Title">
                    Total:
                  </div>
                  <div class="History-Booking-Car-Estimate-Price">
                    RM <?= $GetPreviousBookingDetails['Total_Price'];?>
                  </div>
                </div>
            </div>
            <!--This is where the print button located-->
            <div class="History-Booking-Right-Container">
              <form action="<?= BASEURL;  ?>/History/print" method="post">
                <button id="PrintReceipeButton" type="submit" name="button">Print Reciept</button>
                <input type="hidden" name="invoiceID" value="<?= $GetPreviousBookingDetails['Invoice_Id'];?>"/>
              </form>
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>
  </body>
</html>
<script type="text/javascript">
  //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
   dropdown[i].addEventListener("click", function() {
     //this.classList.toggle("active");
     var dropdownContent = this.nextElementSibling;
     if (dropdownContent.style.display === "block") {
       dropdownContent.style.display = "none";
     } else {
       dropdownContent.style.display = "block";
     }
   });
  }

  var btn = $('#Back-To-Top-Button');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });


</script>
