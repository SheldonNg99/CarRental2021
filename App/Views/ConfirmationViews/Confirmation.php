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
          <hr class="Book-Top-Filter-Line Book-Top-Filter-Line-Done">
          <img class="Book-Top-Filter-Icons" src="<?=  BASEURL;  ?>/../Public/img/Icons/icons8-money-bag-100(2).png" >
          <hr class="Book-Top-Filter-Line Book-Top-Filter-Line-Done">
          <img class="Book-Top-Filter-Icons" src="<?=  BASEURL;  ?>/../Public/img/Icons/icons8-received-100(1).png" >
        </div>
      </div>
      <div id="Pay-Car-Section">
        <div id="Pay-Car-Header">
          Pending...
        </div>
        <div class="Confirmation-Car-Row Confirmation-Image-Container">
          <?php foreach($data['Car_Details'] as $Car_Detail): ?>
          <div class="">
            <!--Car Image-->
            <img src="<?= $Car_Detail['Car_Picture'];  ?>">
          </div>
          <?php endforeach;?>
        </div>
        <br>
        <div class="Confirmation-Car-Row">
          <!--Car Name-->
          <p>Car Name: <?= $Car_Detail['Car_Name']; ?></p>
          <!--Plate Number-->
          <p>Plate Number: <?= $Car_Detail['Car_Plat_Number']; ?></p>
        </div>
        <div class="Confirmation-Car-Row">
          Time Remaining: <p id="demo"></p>
        </div>
        <div class="Confirmation-Car-Row">
          <span id="Special-Remark">Message: Confirmation Letter has been send to your email</span>
        </div>
        <div id="Pay-Car-Bottom">
          <a href="<?= BASEURL; ?>/Confirmation/Transfering"><button type="button" id="Hop-In-Button" name="button">Hop In The Car</button></a>
        </div>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">
  var d = new Date();
  // Get Random number
  var RanNumeber = Math.floor(Math.random() * 2) + 1;
  // Get Time
  var countDownDate = d.setMinutes(d.getMinutes() + RanNumeber);
  // Update the count down every 1 second
  var x = setInterval(function() {
    // Get today's date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s ";

  // If the count down is over, write some text
  if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "Driver Has Reached";
      document.getElementById("Hop-In-Button").style.display = "block";
    }
  }, 1000);
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
