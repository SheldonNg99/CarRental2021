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
        <a href="<?= BASEURL; ?>/Admin/Car"><button id="Add-New-Car-Button" class="Outline-None" type="button" ><img src="https://img.icons8.com/wired/24/000000/circled-left-2.png"/> &nbsp;Back</button></a>
      </div>
      <div id="Car-Table-Container">
        <div id="Add_New_Car_Wrapper">
            <form class="" action="<?= BASEURL;  ?>/Admin/UploadCar" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="username">Name</label>
                <input type="text" class="form-control" name="Car-Name" required>
              </div>

              <div class="form-group">
                <label for="username">Car Type</label>
                <select name="Car-Type" id="cars">
                  <option value="Normal">Normal</option>
                  <option value="LUXURY">LUXURY</option>
                  <option value="SUV">SUV</option>
                  <option value="SEDAN">SEDAN</option>
                </select>
              </div>
              <div class="form-group">
                <label for="username">Picture</label>
                <img src="..." alt="..." class="img-thumbnail">
                <input type="file" id="myFile" name="Car-Image" >
              </div>

              <div class="form-group">
                <label for="username">Car Plate Number</label>
                <input type="text" class="form-control" name="Car-Plate-Number" required>
              </div>

              <div class="form-group">
                <label for="username">Car Cooling System</label> &nbsp;
                <input type="radio" name="Car-Cooling-System" value="True" required> &nbsp; Yes &nbsp;
                <input type="radio" name="Car-Cooling-System" value="False" required> &nbsp; No
              </div>

              <div class="form-group">
                <label for="username">Number of Door</label>
                <input type="text" class="form-control" name="Number-of-Doors" required>
              </div>

              <div class="form-group">
                <label for="username">Number of Passengers</label>
                <input type="text" class="form-control" name="Number-of-Passengers" required>
              </div>

              <div class="form-group">
                <label for="username">Number of Bags</label>
                <input type="text" class="form-control" name="Number-of-Bags" required>
              </div>

              <div class="form-group">
                <label for="username">Car Category</label>
                <input type="text" class="form-control" name="Car-Category" required>
              </div>

              <div class="form-group">
                <label for="username">Car System</label> &nbsp;
                <input type="radio" name="Car-System" value="Auto" required>  &nbsp; Auto &nbsp;
                <input type="radio" name="Car-System" value="Manual" required>  &nbsp; Manual
              </div>

              <div class="form-group">
                <label for="username">Car Fuel Policy</label> &nbsp;
                <input type="radio" name="Car-Fuel-Policy" value="True" required> &nbsp; Yes &nbsp;
                <input type="radio" name="Car-Fuel-Policy" value="False" required>  &nbsp; No
              </div>

              <div class="form-group">
                <label for="username">Car Unlimited Milleage</label> &nbsp;
                <input type="radio" name="Car-Unlimited-Milleage" value="True" required> &nbsp; Yes &nbsp;
                <input type="radio" name="Car-Unlimited-Milleage" value="False" required> &nbsp; No
              </div>

              <div class="form-group">
                <label for="username">Car Collision damage waiver</label> &nbsp;
                <input type="radio" name="Car-Collision-Damage-Waiver" value="True" required> &nbsp; Yes &nbsp;
                <input type="radio" name="Car-Collision-Damage-Waiver" value="False" required> &nbsp; No
              </div>

              <div class="form-group">
                <label for="username">Car theft protetion waiver</label> &nbsp;
                <input type="radio" name="Car-Theft-Protection-Waiver" value="True" required> &nbsp; Yes &nbsp;
                <input type="radio" name="Car-Theft-Protection-Waiver" value="False" required> &nbsp; No
              </div>
              <button class="Submit-Button" type="submit" name="button">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
