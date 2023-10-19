<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <nav id="Side-Navigation-Bar">
    <ul>
      <a href="<?= BASEURL; ?>/HotelAirport"><li><img src="https://img.icons8.com/ios/64/000000/4-star-hotel--v2.png"/><span class="Side-Navigation-Bar-Details">Hotel & Airport Transfer</span></li></a>
      <a href="<?= BASEURL; ?>/Home"><li><img src="https://img.icons8.com/wired/64/000000/car.png"/><span class="Side-Navigation-Bar-Details">Local/Long Distance </span></li></a>
      <a href="<?= BASEURL; ?>/Airport"><li><img src="https://img.icons8.com/wired/64/000000/airplane-mode-on.png"/><span class="Side-Navigation-Bar-Details">Meet & Greet at airport</span></li></a>
      <a href="<?= BASEURL; ?>/Driver"><li><img src="https://img.icons8.com/wired/64/000000/driver.png"/><span class="Side-Navigation-Bar-Details">Driver & Car Daily Hire</span></li></a>
    </ul>

    <hr class="Side-Navigation-Bar-Hr">
    <ul>
      <a href="<?= BASEURL; ?>/Enquiry"><li class=""><img src="https://img.icons8.com/ios/64/000000/questions.png"/><span class="Side-Navigation-Bar-Details">Enquiry</span></li></a>
      <a href="<?= BASEURL; ?>/History"><li><img src="https://img.icons8.com/wired/64/000000/feedback.png"/><span class="Side-Navigation-Bar-Details">History</span></li></a>
    </ul>
    <?php if (isset($_SESSION['id'])) {
      if ($_SESSION['id'] == 1) {
        echo
        ' <hr class="Side-Navigation-Bar-Hr">
              <ul>
                <a href="'.BASEURL.'/Admin/Car"><li><img src="https://img.icons8.com/ios/55/000000/upload.png"/><span class="Side-Navigation-Bar-Details">Upload</span></li></a>
                <a href="'.BASEURL.'/Admin/Availibity"><li><img src="https://img.icons8.com/ios/55/000000/available-updates.png"/><span class="Side-Navigation-Bar-Details">Available</span></li></a>
                <a href="'.BASEURL.'/Admin/Upload_Driver"><li><img src="https://img.icons8.com/wired/55/000000/driver.png"/><span class="Side-Navigation-Bar-Details">Driver</span></li></a>
                <a href="'.BASEURL.'/Admin/Reply"><li><img src="https://img.icons8.com/dotty/55/000000/map-editing.png"/><span class="Side-Navigation-Bar-Details">Reply</span></li></a>
              </ul>';
      }
      else{
        // Do nothing
      }
    }
    else{
      // Do nothing
    } ?>
  </nav>
</html>
<footer>


</footer>
