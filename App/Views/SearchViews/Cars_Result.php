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
        <form action="<?= BASEURL; ?>/Search/SearchAgain" method="post">
          <div id="Result_DateTime_Range_Wrapper">
            <select class="form-control select2" name="PeriodOfBooking">
              <option>Day</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
            </select>
          </div>
        <div id="Result_Pick_Up_Wrapper">
          <select class="form-control select2" name="CurrentLocation">
            <option>Pick Up</option>
            <?php foreach($data['Current_Location_Cars'] as $CarsCurrentLocation): ?>
              <option><?= $CarsCurrentLocation['Current_Location'];  ?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div id="Result_Return_wrapper">
          <select class="form-control select2" name="Destination">
            <option>Return</option>
            <?php foreach($data['Destination_Cars'] as $CarsDestination): ?>
              <option><?= $CarsDestination['Destinastion'];  ?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div id="Result_Return_Search_Button_wrapper">
          <button id="Search-Button" type="submit"><img id="Search-Button-Icon" src="https://img.icons8.com/pastel-glyph/25/000000/search--v2.png"/> Search</button>
        </div>
      </form>
      </div>
      <div id="Main-Results-Container">
        <div id="Main-Results-Wrapper">
          <div id="Side-Filter-Wrapper">
            <div id="Side-Filter-Section">
              <div class="Map-Button-Wrapper">
                <button class="Map-Button" type="button" name="button">MAP</button>
              </div>
              <button class= "dropdown-btn">Price
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-container">
                <input class="Price-Range" type="text" name="" value="min"> - <input class="Price-Range" type="text" name="" value="max"> <span class="Price-Range-Filter-Bar"> > </span>
              </div>
              <button class= "dropdown-btn">Rating
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-container">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
              </div>
              <button class= "dropdown-btn">Payment type
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-container">
                <label class="container-block">Online
                    <input class="float-left " type="checkbox" aria-label="Checkbox for following text input">
                </label>

                <label class="container-block">Pay at counter
                    <input class="float-left" type="checkbox" aria-label="Checkbox for following text input">
                </label>
              </div>
              <button class= "dropdown-btn">Passengers
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-container">
                <label class="container-block">3 to 5
                    <input class="float-left " type="checkbox" aria-label="Checkbox for following text input">
                </label>

                <label class="container-block">6 or more
                    <input class="float-left" type="checkbox" aria-label="Checkbox for following text input">
                </label>
              </div>
              <button class= "dropdown-btn">Bags
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-container">
                <label class="container-block">2
                    <input class="float-left " type="checkbox" aria-label="Checkbox for following text input">
                </label>

                <label class="container-block">3
                    <input class="float-left" type="checkbox" aria-label="Checkbox for following text input">
                </label>

                <label class="container-block">4
                    <input class="float-left" type="checkbox" aria-label="Checkbox for following text input">
                </label>

                <label class="container-block">5
                    <input class="float-left" type="checkbox" aria-label="Checkbox for following text input">
                </label>

                <label class="container-block">6
                    <input class="float-left" type="checkbox" aria-label="Checkbox for following text input">
                </label>
              </div>
              <button class= "dropdown-btn">Car type
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-container">
                <label class="container-block">Small
                    <input class="float-left " type="checkbox" aria-label="Checkbox for following text input">
                </label>

                <label class="container-block">Medium
                    <input class="float-left" type="checkbox" aria-label="Checkbox for following text input">
                </label>

                <label class="container-block">Large
                    <input class="float-left" type="checkbox" aria-label="Checkbox for following text input">
                </label>

                <label class="container-block">Suv
                    <input class="float-left" type="checkbox" aria-label="Checkbox for following text input">
                </label>

                <label class="container-block">Van
                    <input class="float-left" type="checkbox" aria-label="Checkbox for following text input">
                </label>

                <label class="container-block">Luxury
                    <input class="float-left" type="checkbox" aria-label="Checkbox for following text input">
                </label>
              </div>
            </div>
          </div>
          <div id="Main-Results-Section">
            <?php foreach($data['SearchCarResult'] as $CarResults): ?>
            <div class="Horizontal-Cars-Container Small-size">
              <div class="Horizontal-Cars-Left">
                <span class="Horizontal-Cars-Name"><?= $CarResults['Car_Name'];?></span>
                <span class="Horizontal-Cars-Details Small-size">
                  <ol>
                    <li><img src="https://img.icons8.com/ios-glyphs/15/000000/gender-neutral-user.png"/>  <?= $CarResults['Car_Passengers'];?></li>
                    <li><img src="https://img.icons8.com/ios-glyphs/15/000000/red-purse.png"/>  <?= $CarResults['Car_Bag_Quantity'];?></li>
                    <li><img src="https://img.icons8.com/ios-glyphs/15/000000/car-door.png"/>  <?= $CarResults['Car_Number_Of_Door'];?></li>
                    <li><img src="https://img.icons8.com/ios-glyphs/15/000000/automatic.png"/>  <?= $CarResults['Car_System'];?></li>
                    <li><img src="https://img.icons8.com/ios-glyphs/15/000000/winter.png"/>  <?php if($CarResults['Car_Passengers'] == "True"){echo "Aircon";}else{echo "Non-Aircon";}?></li>
                  </ol>
                </span>
                <span class="Horizontal-Cars-Location">
                  <ol>
                    <li class="Small-size"><img src="https://img.icons8.com/ios-glyphs/15/000000/building.png"/>  <?= $CarResults['Current_Location'];?></li>
                    <li class="Small-size"><img src="https://img.icons8.com/ios-glyphs/15/000000/cancel.png"/>  Non-Airport</li>
                  </ol>
                </span>
                <span class="Horizontal-Cars-Services">
                  <ol>
                    <li><?php if($CarResults['Car_Fuel_Policy'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/15/000000/gas-station.png"/>  Fuel Policy: same-to-same';}else{}?></li>
                    <li><?php if($CarResults['Car_Unlimited_Mileage'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/15/000000/road.png"/>  Unlimited mileage included';}else{}?></li>
                    <li><?php if($CarResults['Car_Collision_Damage_Waiver'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/15/000000/crashed-car.png"/>  Collision damage waiver';}else{}?></li>
                    <li><?php if($CarResults['Car_Theft_Protection_Waiver'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/15/000000/private-lock.png"/>  Theft protection waiver';}else{}?></li>
                  </ol>
                </span>
              </div>
              <!--This is where the price and the book button-->
              <div class="Horizontal-Cars-Right">
                <!--<span class="Horizontal-Cars-Original-Price"> Rm399</span> -->
                <span class="Horizontal-Cars-Promotion-Price">Rm <?= $CarResults['PricePerHour']; ?><p class="total"> Per Hour</p></span>
                <form action="<?= BASEURL;  ?>/Book/GetBookingCarDetailsbook" method="post">
                  <button class="Horizontal-Cars-Book-Button"type="submit" name="action" value="Book">Book</button>
                  <input type="hidden" name="availableid" value="<?= $CarResults['Available_Id'];?>"/>
                </form>
              </div>
              <!--This is where the car picture located-->
              <div class="Horizontal-Cars-Middle">
                <img src="<?= BASEURL; ?>/<?= $CarResults['Car_Picture'];?>">
              </div>
            </div>
            <?php endforeach;?>
          </div>
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
