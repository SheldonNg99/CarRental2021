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
          <?php foreach($data['GetPreviousEnquiryDetails'] as $GetPreviousEnquiryDetails): ?>
            <div id="History-Booking-Section">
            <div class="History-Booking-Container">
            <!--This is where the car picture located-->
            <div class="History-Booking-Left-Container">
              <img src="<?= BASEURL; ?>/<?= $GetPreviousEnquiryDetails['Car_Picture'];?>">
            </div>
            <!--This is where all the details of Booking-->
            <div class="History-Booking-Middle-Container">
              <span class="Horizontal-Cars-Name"><?= $GetPreviousEnquiryDetails['Car_Name'];?></span>
              <span class="Horizontal-Cars-Details">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/gender-neutral-user.png"/>  <?= $GetPreviousEnquiryDetails['Car_Passengers'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/red-purse.png"/>  <?= $GetPreviousEnquiryDetails['Car_Bag_Quantity'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/car-door.png"/>  <?= $GetPreviousEnquiryDetails['Car_Number_Of_Door'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/automatic.png"/>  <?= $GetPreviousEnquiryDetails['Car_System'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/winter.png"/>  <?php if($GetPreviousEnquiryDetails['Car_Cooling_System'] == "True"){echo "Aircon";}else{echo "Non-Aircon";}?></li>
                </ol>
              </span>
              <span class="Horizontal-Cars-Location">
                <ol>
                  <li class=""><img src="https://img.icons8.com/ios-glyphs/18/000000/building.png"/>  <?= $GetPreviousEnquiryDetails['Current_Location'];?></li>
                  <li class=""><img src="https://img.icons8.com/ios/18/000000/map-pin.png"/>  <?= $GetPreviousEnquiryDetails['Destinastion'];?></li>
                </ol>
              </span>
            </div>
            <!--This is where all the details of Price-->
            <div class="History-Booking-Second-Middle-Container">
                <div class="History-Booking-Car-Tilte">
                  Enquiry Summary
                </div>
                <div class="History-Booking-Car-Charges-Wrapper">
                </div>
                <div class="History-Booking-Car-Charges-Wrapper text-center">
                  <?= $GetPreviousEnquiryDetails['Enquiry_Content'];?>
                </div>
                <span class="float-right">Asked By: <?= $GetPreviousEnquiryDetails['User_Name'];?></span>
            </div>
            <!--This is where the print button located-->
            <div class="History-Booking-Right-Container">
                <button  id="PrintReceipeButton" type="button" class="Information-Buttons Outline-None" data-toggle="modal" data-target="#Information-Modal">Reply</button>
            </div>
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
                    <form action="<?= BASEURL;  ?>/Admin/ReplyEnquiry" method="post">
                      <textarea id="userfeedbacktextarea" name="ReplyEnquiry" rows="4" cols="63">

                      </textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button class="btn btn-primary" type="submit" name="button">Reply</button>
                    <input type="hidden" name="EnquiryID" value="<?= $GetPreviousEnquiryDetails['Enquiry_Id'];?>"/>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <!--End of the modal-->
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
<script>
      $('.select2').select2();
</script>
