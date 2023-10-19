<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $data['title']?></title>
  </head>
  <body>
    <div id="Main-Section">
      <a id="Back-To-Top-Button"></a>
      <div id="Top-Filter-Section" class="TopButtonWrapper">
        <a href="<?= BASEURL;  ?>/Admin/Upload_Car"class="text-decoration-none"><button id="Add-New-Car-Button" type="button" name="button">New</button></a>
      </div>
      <div id="Main-Container">
        <div id="Popular-Cars-wrapper">
        <?php foreach($data['Get_All_Cars'] as $Cars): ?>
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
            <!--This is where the car picture located-->
            <div class="Horizontal-Add-Cars-Middle">
              <img src="<?= BASEURL;  ?>/<?= $Cars['Car_Picture'];?>">
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
