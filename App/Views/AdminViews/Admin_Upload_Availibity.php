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
        <a href="<?= BASEURL; ?>/Admin/Availibity"><button id="Add-New-Car-Button" class="Outline-None" type="button" ><img src="https://img.icons8.com/wired/24/000000/circled-left-2.png"/> &nbsp;Back</button></a>
      </div>
      <div id="Car-Table-Container">
        <div id="Add_New_Available_Wrapper">
            <form action="<?= BASEURL;  ?>/Admin/UploadAvailibity" method="post" >
              <div class="form-group">
                <label for="CurrentLocation">Current Location</label>
                <input type="text" class="form-control" name="CurrentLocation" required>
              </div>

              <div class="form-group">
                <label for="Destination">Destination</label>
                <input type="text" class="form-control" name="Destination" required>
              </div>

              <div class="form-group">
                <label for="PricePerHour">Price Per Hour</label>
                <input type="text" class="form-control" name="PricePerHour" required>
              </div>

              <div class="form-group">
                <label for="TaxPerRide">Tax Per Ride</label>
                <input type="text" class="form-control" name="TaxPerRide" required>
              </div>

              <div class="form-group">
                <label for="PricePerRide">Price Per Ride</label>
                <input type="text" class="form-control" name="PricePerRide" required>
              </div>

              <div class="form-group">
                <label for="CarName">Car Name</label>
                <select name="CarId" id="cars">
                  <?php foreach ($data['CarIdAndName'] as $CarIdAndName): ?>
                    <option value="<?= $CarIdAndName['Car_Id']; ?>"><?= $CarIdAndName['Car_Name']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label for="ServiceType">Service Type</label>
                <select name="ServiceId" id="cars">
                  <?php foreach ($data['ServiceIdAndName'] as $ServiceIdAndName): ?>
                    <option value="<?= $ServiceIdAndName['Service_Id']; ?>"><?= $ServiceIdAndName['Service_Name']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <button class="Submit-Button" type="submit" name="button">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
