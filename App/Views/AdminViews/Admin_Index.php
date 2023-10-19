<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $data['title']  ?></title>
  </head>
  <body>
    <div id="Main-Section">
      <?php Flasher::flash(); ?>
      <!--1st Section is where User Search-->
      <div id="Top-Container">
        <div id="Search-Wrapper">
          <div id="Search-Title-Wrapper">
            Hello world
          </div>
          <div id="DateTime-Range-Wrapper">
            <input id="DateTime-Range" type="text" name="datetimes" />
          </div>
          <div id="Location-Wrapper">
            <select class="form-control select2">
               <option>Pick Up</option>
               <option>Car</option>
               <option>Bike</option>
               <option>Scooter</option>
               <option>Cycle</option>
               <option>Horse</option>
            </select>
          </div>
          <div id="Location-Wrapper">
            <select class="form-control select2">
               <option>Return</option>
               <option>Car</option>
               <option>Bike</option>
               <option>Scooter</option>
               <option>Cycle</option>
               <option>Horse</option>
            </select>
          </div>
          <div id="Search-Button-Wrapper">
            <a href="<?= BASEURL; ?>/Home/Search_Cars"><button id="Search-Button" type="submit"><img id="Search-Button-Icon" src="https://img.icons8.com/pastel-glyph/25/000000/search--v2.png"/>  Search</button></a>
          </div>
        </div>
      </div>
      <div id="Main-Container">
        <!--2nd Section is the top trending Cars-->
        <div id="Main-Title">
          Top Trending Cars
        </div>
        <div id="Trending-Cars-wrapper">
          <div class="Car-Details-Container">
            <div class="Car-Image-Container">
              <img src="../Public/img/download4.jpg">
            </div>
            <div class="Car-Infos-Container">
              <div class="Car-Info-Container">
                <span class="Car-Info-Name">Proton Saga  (Premium)</span>
                <p class="Car-Info-Original-Price">Rm299</p>
                <span class="Car-Info-Price">Rm199  <p class="total"> Total</p></span>
              </div>
              <div class="Book-Button-Container">
                <button class="Book-Button" type="button" name="button">Book</button>
              </div>
            </div>
          </div>
          <div class="Car-Details-Container">
            <div class="Car-Image-Container">
              <img src="../Public/img/download2.jpg">
            </div>
            <div class="Car-Infos-Container">
              <div class="Car-Info-Container">
                <span class="Car-Info-Name">Proton Saga  (Premium)</span>
                <p class="Car-Info-Original-Price">Rm299</p>
                <span class="Car-Info-Price">Rm199  <p class="total"> Total</p></span>
              </div>
              <div class="Book-Button-Container">
                <button class="Book-Button" type="button" name="button">Book</button>
              </div>
            </div>
          </div>
          <div class="Car-Details-Container">
            <div class="Car-Image-Container">
              <img src="../Public/img/download1.jpg">
            </div>
            <div class="Car-Infos-Container">
              <div class="Car-Info-Container">
                <span class="Car-Info-Name">Proton Saga  (Premium)</span>
                <p class="Car-Info-Original-Price">Rm299</p>
                <span class="Car-Info-Price">Rm199  <p class="total"> Total</p></span>
              </div>
              <div class="Book-Button-Container">
                <button class="Book-Button" type="button" name="button">Book</button>
              </div>
            </div>
          </div>
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
                    <li><img src="https://img.icons8.com/ios-glyphs/18/000000/winter.png"/>  <?php if($Cars['Car_Passengers'] == "True"){echo "Aircon";}else{echo "Non-Aircon";}?></li>
                  </ol>
                </span>
                <span class="Horizontal-Cars-Location">
                  <ol>
                    <li><img src="https://img.icons8.com/ios-glyphs/18/000000/building.png"/>  G Floor, Wisma Paradise, Kuala Lumpur</li>
                    <li><img src="https://img.icons8.com/ios-glyphs/18/000000/cancel.png"/>  Non-Airport</li>
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
                <span class="Horizontal-Cars-Original-Price"> Rm399</span>
                <span class="Horizontal-Cars-Promotion-Price"> Rm309 <p class="total">Total</p></span>
                <span><button class="Horizontal-Cars-Book-Button"type="button" name="button">Book</button></span>
              </div>
              <!--This is where the car picture located-->
              <div class="Horizontal-Cars-Middle">
                <img src="<?= $Cars['Car_Picture'];?>">
              </div>
            </div>
          <?php endforeach;?>
          <div class="Horizontal-Cars-Container">
            <div class="Horizontal-Cars-Left">
              <span class="Horizontal-Cars-Name">Proton Saga</span>
              <span class="Horizontal-Cars-Details">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/gender-neutral-user.png"/>  5</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/red-purse.png"/>  2</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/car-door.png"/>  4</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/automatic.png"/>  Auto</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/winter.png"/>  Aircon</li>
                </ol>
              </span>
              <span class="Horizontal-Cars-Location">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/building.png"/>  G Floor, Wisma Paradise, Kuala Lumpur</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/cancel.png"/>  Non-Airport</li>
                </ol>
              </span>
              <span class="Horizontal-Cars-Services">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/gas-station.png"/> Fuel Policy: same-to-same</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/road.png"/>  Unlimited mileage included</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/crashed-car.png"/>  Collision damage waiver</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/private-lock.png"/>  Theft protection waiver</li>
                </ol>
              </span>
            </div>
            <!--This is where the price and the book button-->
            <div class="Horizontal-Cars-Right">
              <span class="Horizontal-Cars-Original-Price"> Rm399</span>
              <span class="Horizontal-Cars-Promotion-Price"> Rm309 <p class="total">Total</p></span>
              <span><button class="Horizontal-Cars-Book-Button"type="button" name="button">Book</button></span>
            </div>
            <!--This is where the car picture located-->
            <div class="Horizontal-Cars-Middle">
              <img src="../Public/img/Car1.jpg">
            </div>
          </div>
          <div class="Horizontal-Cars-Container">
            <div class="Horizontal-Cars-Left">
              <span class="Horizontal-Cars-Name">Proton Saga</span>
              <span class="Horizontal-Cars-Details">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/gender-neutral-user.png"/>  5</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/red-purse.png"/>  2</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/car-door.png"/>  4</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/automatic.png"/>  Auto</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/winter.png"/>  Aircon</li>
                </ol>
              </span>
              <span class="Horizontal-Cars-Location">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/building.png"/>  G Floor, Wisma Paradise, Kuala Lumpur</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/cancel.png"/>  Non-Airport</li>
                </ol>
              </span>
              <span class="Horizontal-Cars-Services">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/gas-station.png"/> Fuel Policy: same-to-same</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/road.png"/>  Unlimited mileage included</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/crashed-car.png"/>  Collision damage waiver</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/private-lock.png"/>  Theft protection waiver</li>
                </ol>
              </span>
            </div>
            <!--This is where the price and the book button-->
            <div class="Horizontal-Cars-Right">
              <span class="Horizontal-Cars-Original-Price"> Rm399</span>
              <span class="Horizontal-Cars-Promotion-Price"> Rm309 <p class="total">Total</p></span>
              <span><button class="Horizontal-Cars-Book-Button"type="button" name="button">Book</button></span>
            </div>
            <!--This is where the car picture located-->
            <div class="Horizontal-Cars-Middle">
              <img src="../Public/img/Car1.jpg">
            </div>
          </div>
          <div class="Horizontal-Cars-Container">
            <div class="Horizontal-Cars-Left">
              <span class="Horizontal-Cars-Name">Proton Saga</span>
              <span class="Horizontal-Cars-Details">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/gender-neutral-user.png"/>  5</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/red-purse.png"/>  2</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/car-door.png"/>  4</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/automatic.png"/>  Auto</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/winter.png"/>  Aircon</li>
                </ol>
              </span>
              <span class="Horizontal-Cars-Location">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/building.png"/>  G Floor, Wisma Paradise, Kuala Lumpur</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/cancel.png"/>  Non-Airport</li>
                </ol>
              </span>
              <span class="Horizontal-Cars-Services">
                <ol>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/gas-station.png"/> Fuel Policy: same-to-same</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/road.png"/>  Unlimited mileage included</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/crashed-car.png"/>  Collision damage waiver</li>
                  <li><img src="https://img.icons8.com/ios-glyphs/18/000000/private-lock.png"/>  Theft protection waiver</li>
                </ol>
              </span>
            </div>
            <!--This is where the price and the book button-->
            <div class="Horizontal-Cars-Right">
              <span class="Horizontal-Cars-Original-Price"> Rm399</span>
              <span class="Horizontal-Cars-Promotion-Price"> Rm309 <p class="total">Total</p></span>
              <span><button class="Horizontal-Cars-Book-Button"type="button" name="button">Book</button></span>
            </div>
            <!--This is where the car picture located-->
            <div class="Horizontal-Cars-Middle">
              <img src="../Public/img/Car2.jpg">
            </div>
          </div>
        </div>

        <br>
        <br>
        <div id="Main-Title">
          Select Car by Categories
        </div>
        <div id="Cars-Categories-wrapper">
          <div id="Cars-Categories-Container">
            <div id="Cars-Categories-Title-Container">
              Categories
            </div>
            <div id="Car-Category-Container">
              <ol>
                <a class="Car-Category-Link" href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
                <a href="#"><li><img class="Car-Category-Image" src="https://img.icons8.com/color/50/000000/bmw.png"/><span class="Car-Category-Wrapper"><span class="Car-Category-Details">BMW</span><span class="Car-Category-Details Details-Extra-Small">108435</span></span></li></a>
              </ol>
            </div>
          </div>
          <div id="Our-Company-Properties">
            <div id="Cars-Categories-Title-Container">
              Anoucement
            </div>
            <div class="Our-Campony-Property-Container">
              <ol>
                <a href="#"><li><img class="Our-Campony-Property-Image-Wrapper" src="../Public/img/Restriction.jpg"/><span class="Our-Campony-Property-Details-Wrapper">Read current restrictions for every country during pandemic</span></li></a>
              </ol>

            </div>

          </div>

        </div>

      </div>

    </div>
  </body>
  <br>
  <br>

</html>
<script>
      $('.select2').select2();
</script>
