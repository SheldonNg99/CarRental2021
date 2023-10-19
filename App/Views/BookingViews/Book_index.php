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
        <div id="Top-Filter-Icon-Section">
          <img class="Book-Top-Filter-Icons" src="<?=  BASEURL;  ?>/../Public/img/Icons/icons8-search-100(1).png" >
          <hr class="Book-Top-Filter-Line Book-Top-Filter-Line-Done">
          <img class="Book-Top-Filter-Icons" src="<?=  BASEURL;  ?>/../Public/img/Icons/icons8-more-details-100(1).png" >
          <hr class="Book-Top-Filter-Line">
          <img class="Book-Top-Filter-Icons" src="<?=  BASEURL;  ?>/../Public/img/Icons/icons8-money-bag-100(1).png" >
          <hr class="Book-Top-Filter-Line">
          <img class="Book-Top-Filter-Icons" src="<?=  BASEURL;  ?>/../Public/img/Icons/icons8-received-100.png" >
        </div>
      </div>
      <?php foreach($data['CarAvailibilityDetails'] as $GetDetailsOfCar): ?>
      <div id="Book-Car-Wrapper">
        <div id="Book-Car-Section">
          <div id="Book-Car-Image-Location-Details-Wrapper">
            <div id="Book-Car-Image-Wrapper">
              <img src="<?= BASEURL .'/'. $GetDetailsOfCar['Car_Picture'];?>">
            </div>
            <div id="Book-Car-Location-Wrapper">
              <div id="Book-Car-Pick-Up-Location-Wrapper">
                <img src="https://img.icons8.com/material/24/000000/worldwide-location--v1.png"/>    Pick Up Location
              </div>
              <div id="Book-Car-Pick-Up-Location">
                <?= $GetDetailsOfCar['Current_Location'];?>
                <!--<select class="form-control select2">
                   <option>Pick Up</option>
                   <option>Car</option>
                   <option>Bike</option>
                   <option>Scooter</option>
                   <option>Cycle</option>
                   <option>Horse</option>
                </select>-->
              </div>
              <!--<div id="Book-Car-Return-Date-Wrapper">
                <input type="datetime-local" id="Book-Car-Return-Date" name="birthday">
              </div>-->
              <div id="Book-Car-Return-Location-Wrapper">
                <img src="https://img.icons8.com/material/24/000000/worldwide-location--v1.png"/>     Return Location
              </div>
              <div id="Book-Car-Return-Location">
                <?= $GetDetailsOfCar['Destinastion'];?>
                <!--<select class="form-control select2">
                   <option>Return</option>
                   <option>Car</option>
                   <option>Bike</option>
                   <option>Scooter</option>
                   <option>Cycle</option>
                   <option>Horse</option>
                </select>-->
              </div>
              <div id="Book-Car-Return-Date-Wrapper">
                <!--<div class='input-group date' id='datetimepicker1'>
                   <input type='text' class="form-control" />
                   <span class="input-group-addon">
                   <span class="glyphicon glyphicon-calendar"></span>
                   </span>
                </div>-->
              </div>
              <br>
              <span id="Special-Remark">* Please confirm your location before make the payment</span>

            </div>
            <div id="Book-Car-Details-Wrapper">
              <!--Left Top-->
              <div class="Book-Car-Detail-Wrapper Border-Right-Line">
                <span class="Book-Car-Name"><?= $GetDetailsOfCar['Car_Name'];?></span>
                <span class="Book-Car-Functions">
                  <ol>
                    <li><img src="https://img.icons8.com/ios-glyphs/18/000000/gender-neutral-user.png"/>  <?= $GetDetailsOfCar['Car_Passengers'];?></li>
                    <li><img src="https://img.icons8.com/ios-glyphs/18/000000/red-purse.png"/>  <?= $GetDetailsOfCar['Car_Bag_Quantity'];?></li>
                    <li><img src="https://img.icons8.com/ios-glyphs/18/000000/car-door.png"/>  <?= $GetDetailsOfCar['Car_Number_Of_Door'];?></li>
                    <li><img src="https://img.icons8.com/ios-glyphs/18/000000/automatic.png"/>  <?= $GetDetailsOfCar['Car_System'];?></li>
                    <li><img src="https://img.icons8.com/ios-glyphs/18/000000/winter.png"/>  <?php if($GetDetailsOfCar['Car_Passengers'] == "True"){echo "Aircon";}else{echo "Non-Aircon";}?></li>
                  </ol>
                </span>
              </div>
              <!--Right-Top-->
              <div class="Book-Car-Detail-Wrapper">
                <span class="Book-Car-Important-Info">Information</span>
                <!-- Button trigger modal -->
                <button type="button" class="Information-Buttons Outline-None" data-toggle="modal" data-target="#Information-Modal">
                  Important Info
                </button>
                <!-- Inportant Info Modal -->
                <div class="modal modal-center fade" id="Information-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Important Informations</h5>
                        <button type="button" class="close Outline-None" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:

                        “Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”
                        The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn't distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.

                        The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--End of the modal-->
                <!-- Button trigger modal -->
                <button type="button" class="Information-Buttons Outline-None" data-toggle="modal" data-target="#Terms-And-Conditions-Modal">
                  Terms and Conditions
                </button>
                <!-- Terms and Conditions Modal -->
                <div class="modal modal-center fade" id="Terms-And-Conditions-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Terms And Conditions</h5>
                        <button type="button" class="close Outline-None" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:

                        “Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”
                        The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn't distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.

                        The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Agree</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--End of the modal-->
              </div>
              <!--Left-Bottom-->
              <div class="Book-Car-Detail-Wrapper Border-Right-Line">
                <span class="Book-Car-Services">
                  <ol>
                    <li><?php if($GetDetailsOfCar['Car_Fuel_Policy'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/18/000000/gas-station.png"/>  Fuel Policy: same-to-same';}else{}?></li>
                    <li><?php if($GetDetailsOfCar['Car_Unlimited_Mileage'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/18/000000/road.png"/>  Unlimited mileage included';}else{}?></li>
                    <li><?php if($GetDetailsOfCar['Car_Collision_Damage_Waiver'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/18/000000/crashed-car.png"/>  Collision damage waiver';}else{}?></li>
                    <li><?php if($GetDetailsOfCar['Car_Theft_Protection_Waiver'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/18/000000/private-lock.png"/>  Theft protection waiver';}else{}?></li>
                  </ol>
                </span>
              </div>
              <!--Right Bottom-->
              <div class="Book-Car-Detail-Wrapper">
                <span class="Book-Car-Important-Info">Review:
                  <?php foreach($data['CarAverageReview'] as $Car_Star_Review): ?>

                    <?php
                    $star = $Car_Star_Review['Car_Average_Review'];
                    for ($i=1; $i <= 5 ; $i++){
                      if ($i <= $star) {
                        echo '<span class="fa fa-star checked"></span>';
                      }
                      else {
                        echo '<span class="fa fa-star"></span>';
                      }
                    } ?>
                    <?= $Car_Star_Review['Car_Average_Review']." / 5";  ?>
                  <?php endforeach;?>
                </span>
                <!-- Button trigger modal -->
                <button type="button" class="Information-Buttons Outline-None" data-toggle="modal" data-target="#Review-Modal">
                  Review
                </button>
                <!-- Review Modal -->
                <div class="modal modal-center fade" id="Review-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                        <button type="button" class="close Outline-None" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php if (empty($data['FeedBackDetails'])): ?>
                          <div class="Review-Container">
                            <div class="Review-Content-Container text-center">
                              <span class="Customer-Name">&nbsp;</span>
                              <hr>
                              <p >No feedback is given</p>
                            </div>
                          </div>
                        <?php endif; ?>
                        <?php foreach($data['FeedBackDetails'] as $Car_User_Review): ?>
                        <div class="Review-Container">
                          <div class="Review-Content-Container">
                            <span class="Customer-Name">Commended on <?= $Car_User_Review['Rate_Date_Time']; ?>  &nbsp;</span>
                            <span class="Customer-Name"><img src="https://img.icons8.com/ios-glyphs/13/000000/gender-neutral-user.png"/> <?= $Car_User_Review['User_Name']; ?>  &nbsp;</span>
                            <hr>
                            <p><?= $Car_User_Review['Rating_Content']; ?></p>
                          </div>
                        </div>
                        <?php endforeach;?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="Information-Buttons Outline-None" data-toggle="modal" data-target="#Enquiry-Modal">
                  Ask us any question
                </button>
                <!-- Enquiry Modal -->
                <div class="modal modal-center fade" id="Enquiry-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Drop Us A Message</h5>
                        <button type="button" class="close Outline-None" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <form action="<?= BASEURL;  ?>/Enquiry/SetEnquiry" method="post">
                          <textarea id="userfeedbacktextarea" name="Enquiry" rows="4" cols="68">

                          </textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" name="availableid" value="<?php foreach($data['CarAvailibilityDetails'] as $availableid): ?><?=  $availableid['Available_Id']; ?><?php endforeach;?>">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--End of the modal-->
              </div>
            </div>
          </div>
          <div id="Book-Car-Price-Wrapper">
            <div class="Book-Car-Tilte">
              Price Summary
            </div>
            <div class="Book-Car-Charges-Wrapper">
              <div class="Book-Car-Charge-Name">
                Rental Car Charges
              </div>
              <div class="Book-Car-Charge-Price">
                RM <?= $data['InitialPrice'];?>
              </div>
              <div class="Book-Car-Period">
                Rental Period: <?= $_SESSION['Period_Of_Booking'];  ?>
              </div>
              <div class="Book-Car-Charge-Name">
                Car Taxation
              </div>
              <div class="Book-Car-Charge-Price">
                RM <?= $data['TaxPerRide'];?>
              </div>
              <div class="Book-Car-Charge-Name">
                Car Deposit
              </div>
              <div class="Book-Car-Charge-Price">
                RM <?= $data['CarDeposit'];?>
              </div>
            </div>
            <div class="Book-Car-Charges-Wrapper">
              <div class="Book-Car-Estimate-Price-Title">
                Estimated Total:
              </div>
              <div class="Book-Car-Estimate-Price">
                RM <?= $data['TotalPrice'];?>
              </div>
            </div>
            <br>
            <form action="<?= BASEURL;  ?>/Book/BookTheCar" method="post">
              <input class="Information-Buttons" type="submit" name="action" value="Pay Now">
              <!-- Pass Car Id, Car Deposit, Total Price, Period Of Booking-->
              <input type="hidden" name="carid" value="<?= $GetDetailsOfCar['Car_Id'];?>"/>
              <input type="hidden" name="PeriodOfBooking" value="<?= $_SESSION['Period_Of_Booking'];  ?>"/>
              <input type="hidden" name="CarDeposit" value="<?= $data['CarDeposit'];?>"/>
              <input type="hidden" name="TotalPrice" value="<?= $data['TotalPrice'];?>"/>
              <input type="hidden" name="InitialPrice" value="<?= $data['InitialPrice'];?>"/>
              <input type="hidden" name="Departure" value="<?= $GetDetailsOfCar['Current_Location'];?>"/>
              <input type="hidden" name="Destination" value="<?= $GetDetailsOfCar['Destinastion'];?>"/>
              <input type="hidden" name="Tax" value="<?= $data['TaxPerRide'];?>"/>
            </form>
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
<script>
      $('.select2').select2();
</script>
