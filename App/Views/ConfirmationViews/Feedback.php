<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feedback</title>
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
          Love Your Ride?
        </div>
        <div class="Confirmation-Car-Row Confirmation-Image-Container">
            <!--Car Image-->
            <img src="<?=  BASEURL;  ?>/../Public/img/Transfering.gif">
        </div>
        <br>
        <div class="Confirmation-Inline-Block-Car-Row">
          <?php foreach($data['Car_Details'] as $Car_Detail): ?>
          <!--Car Name-->
          <p>Car Name: <?= $Car_Detail['Car_Name']; ?></p>
          <!--Plate Number-->
          <p>Plate Number: <?= $Car_Detail['Car_Plat_Number']; ?></p>
          <!--Category Name-->
          <p>Category: <?= $Car_Detail['Car_Category']; ?></p>
          <!--Plate Number-->
          <p>System : <?= $Car_Detail['Car_System']; ?></p>
          <?php endforeach;?>
        </div>
        <div class="Confirmation-Inline-Block-Car-Row">
          <?php foreach($data['Car_Details'] as $Car_Detail): ?>
            <p class="Confirmation-Cars-Icon"><?php if($Car_Detail['Car_Fuel_Policy'] == "True"){echo '<img src="https://img.icons8.com/ios-glyphs/25/000000/gas-station.png"/>  Fuel Policy: same-to-same';}else{}?></p>
            <p class="Confirmation-Cars-Icon"><?php if($Car_Detail['Car_Unlimited_Mileage'] == "True"){echo '<img class="Confirmation-Cars-Icon" src="https://img.icons8.com/ios-glyphs/18/000000/road.png"/>  Unlimited mileage included';}else{}?></p>
            <p class="Confirmation-Cars-Icon"><?php if($Car_Detail['Car_Collision_Damage_Waiver'] == "True"){echo '<img class="Confirmation-Cars-Icon" src="https://img.icons8.com/ios-glyphs/18/000000/crashed-car.png"/>  Collision damage waiver';}else{}?></p>
            <p class="Confirmation-Cars-Icon"><?php if($Car_Detail['Car_Theft_Protection_Waiver'] == "True"){echo '<img class="Confirmation-Cars-Icon" src="https://img.icons8.com/ios-glyphs/18/000000/private-lock.png"/>  Theft protection waiver';}else{}?></p>
          <?php endforeach;?>
        </div>
        <form action="<?= BASEURL;  ?>/Feedback/SubmitFeedback" method="post">
        <div class="Confirmation-Car-Row">
          <span id="Special-Remark">Leave a us message or feedback!</span>
          <div class="ratingstar">
            <input type="hidden" id="php1_hidden" value="1">
            <img src="<?=  BASEURL;  ?>/../Public/img/star1.png" onmouseover="change(this.id);" id="php1" class="php">
            <input type="hidden" id="php2_hidden" value="2">
            <img src="<?=  BASEURL;  ?>/../Public/img/star1.png" onmouseover="change(this.id);" id="php2" class="php">
            <input type="hidden" id="php3_hidden" value="3">
            <img src="<?=  BASEURL;  ?>/../Public/img/star1.png" onmouseover="change(this.id);" id="php3" class="php">
            <input type="hidden" id="php4_hidden" value="4">
            <img src="<?=  BASEURL;  ?>/../Public/img/star1.png" onmouseover="change(this.id);" id="php4" class="php">
            <input type="hidden" id="php5_hidden" value="5">
            <img src="<?=  BASEURL;  ?>/../Public/img/star1.png" onmouseover="change(this.id);" id="php5" class="php">
          </div>
          <br>
          <input type="hidden" name="phprating" id="phprating" value="0">
            <textarea id="userfeedbacktextarea" name="feedback" rows="4" cols="63">

            </textarea>
        </div>
        <div id="Pay-Car-Bottom">
            <button type="submit" id="Submit-Feedback-Button">Submit</button>
        </div>
      </form>
      </div>
    </div>
  </body>
</html>
<script type="text/javascript">
  /* Star rating*/
  function change(id)
  {
    var cname=document.getElementById(id).className;
    var ab=document.getElementById(id+"_hidden").value;
    document.getElementById(cname+"rating").value=ab;

    for(var i=ab;i>=1;i--)
    {
      document.getElementById(cname+i).src="<?=  BASEURL;  ?>/../Public/img/star2.png";
    }
    var id=parseInt(ab)+1;
    for(var j=id;j<=5;j++)
    {
      document.getElementById(cname+j).src="<?=  BASEURL;  ?>/../Public/img/star1.png";
    }
  }
  /* End of star rating*/
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
