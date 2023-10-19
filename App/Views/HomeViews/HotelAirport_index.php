<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $data['title']  ?></title>
  </head>
  <body>
    <div id="Main-Section">
      <div id="Top-Container">
        <div id="Search-Wrapper">
          <form action="<?= BASEURL; ?>/Search/SearchResult" method="post">
          <div id="Search-Title-Wrapper">
            Hotel & Airport Transfer
          </div>
          <div id="Location-Wrapper">
            <select class="form-control select2" name="CurrentLocation">
               <option>Pick Up</option>
               <?php foreach($data['Current_Location_Cars'] as $CarsCurrentLocation): ?>
                 <option><?= $CarsCurrentLocation['Current_Location'];  ?></option>
               <?php endforeach;?>
            </select>
          </div>
          <div id="Location-Wrapper">
            <select class="form-control select2">
               <option>Return</option>
               <?php foreach($data['Destination_Cars'] as $CarsDestination): ?>
                 <option><?= $CarsDestination['Destinastion'];  ?></option>
               <?php endforeach;?>
            </select>
          </div>
          <div id="Search-Button-Wrapper">
            <button id="Search-Button" type="submit"><img id="Search-Button-Icon" src="https://img.icons8.com/pastel-glyph/25/000000/search--v2.png"/>  Search</button>
          </div>
          <input type="hidden" name="PeriodOfBooking" value="0">
          <?php $_SESSION['ServiceId'] = 1; ?>
          </form>
          <p>Transfer Service is charge per ride</p>
        </div>
      </div>
      <div id="Main-Container">
        <!--2nd Section is the top trending Cars-->
        <div id="Main-Title">
          Top Trending Cars
        </div>
        <div id="Trending-Cars-wrapper">
          <?php foreach($data['HotelAirportServiceCars'] as $HotelAirportServiceCars): ?>
          <div class="Car-Details-Container">
            <div class="Car-Infos-Container">
              <div class="Car-Image-Container">
                <img src="<?= $HotelAirportServiceCars['Car_Picture'];?>">
              </div>
              <div class="Car-Info-Container">
                <span class="Car-Info-Name"><?= $HotelAirportServiceCars['Car_Name'];?></span>
                <span class="Car-Info-Price">RM <?= $HotelAirportServiceCars['PricePerRide'];?> <p class="total">Price Per Ride</p></span>
              </div>
              <div class="Book-Button-Container">
                <form action="<?= BASEURL;  ?>/Book/GetHABookingCarDetails" method="post">
                  <input class="Book-Button" type="submit" name="action" value="Book">
                  <input type="hidden" name="availableid" value="<?= $HotelAirportServiceCars['Available_Id'];?>"/>
                  <?php $_SESSION['Period_Of_Booking'] = "Charges Per Ride" ?>
                </form>
              </div>
            </div>
          </div>
          <?php endforeach;?>
        </div>

        <br>
        <br>

        <!--3rd Section is the most popular cars-->
        <div id="Main-Title">
          Most Popular Cars
        </div>
        <div id="Popular-Cars-wrapper">
          <?php foreach($data['Most_Popular_Cars'] as $Cars): ?>
            <div class="Horizontal-Cars-Container">
            <div class="Horizontal-Cars-Left">
              <span class="Horizontal-Cars-Name"><?= $Cars['Car_Name'];?></span>
              <span class="Horizontal-Cars-Details">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/gender-neutral-user.png"/>  <?= $Cars['Car_Passengers'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/red-purse.png"/>  <?= $Cars['Car_Bag_Quantity'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/car-door.png"/>  <?= $Cars['Car_Number_Of_Door'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/automatic.png"/>  <?= $Cars['Car_System'];?></li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/winter.png"/>  <?php if($Cars['Car_Cooling_System'] == "True"){echo "Aircon";}else{echo "Non-Aircon";}?></li>
                </ol>
              </span>
              <span class="Horizontal-Cars-Location">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/building.png"/>  <?= $Cars['Current_Location'];?></li>
                  <li><img src="https://img.icons8.com/ios/18/000000/map-pin.png"/>  <?= $Cars['Destinastion'];?></li>
                </ol>
              </span>
              <span class="Horizontal-Cars-Services">
                <ol>
                  <li><?php if($Cars['Car_Fuel_Policy'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/18/000000/gas-station.png"/>  Fuel Policy: same-to-same';}else{}?></li>
                  <li><?php if($Cars['Car_Unlimited_Mileage'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/18/000000/road.png"/>  Unlimited mileage included';}else{}?></li>
                  <li><?php if($Cars['Car_Collision_Damage_Waiver'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/18/000000/crashed-car.png"/>  Collision damage waiver';}else{}?></li>
                  <li><?php if($Cars['Car_Theft_Protection_Waiver'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/18/000000/private-lock.png"/>  Theft protection waiver';}else{}?></li>
                </ol>
              </span>
            </div>
            <!--This is where the price and the book button-->
            <div class="Horizontal-Cars-Right">
              <span class="Horizontal-Cars-Promotion-Price"> RM <?= $Cars['PricePerRide'];?> <p class="total">Per Ride</p></span>
              <form action="<?= BASEURL;  ?>/Book/GetHABookingCarDetails" method="post">
                <input class="Horizontal-Cars-Book-Button" type="submit" name="action" value="Book">
                <input type="hidden" name="availableid" value="<?= $Cars['Available_Id'];?>"/>
                <?php $_SESSION['Period_Of_Booking'] = "Charges Per Ride" ?>
              </form>
            </div>
            <!--This is where the car picture located-->
            <div class="Horizontal-Cars-Middle">
              <img src="<?= $Cars['Car_Picture'];?>">
            </div>
          </div>
          <?php endforeach;?>
        </div>

        <br>
        <br>

      </div>
    </div>

  </body>
</html>
<script>
      $('.select2').select2();
</script>
