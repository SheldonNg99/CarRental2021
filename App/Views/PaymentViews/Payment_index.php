<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
            <img class="Book-Top-Filter-Icons" src="<?=  BASEURL;  ?>/../Public/img/Icons/icons8-money-bag-100(1).png" >
            <hr class="Book-Top-Filter-Line">
            <img class="Book-Top-Filter-Icons" src="<?=  BASEURL;  ?>/../Public/img/Icons/icons8-received-100.png" >
          </div>
        </div>
        <div id="Pay-Car-Section">
          <form class="" action="<?= BASEURL;  ?>/Payment/MakePayment" method="post">
            <div id="Pay-Car-Header">
            Payment Details
          </div>
            <div class="Pay-Car-Row">
            Card Number
            <input class="Card_Number_Input "type="number" min="111111111111" max="999999999999" onkeyup="if(parseInt(this.value)>999999999999){ this.value =999999999999; return false; }" name="CARD_NUMBER" maxlength="12" placeholder="VALID CARD NUMBER"><span id="Lock_Icon"><img src="https://img.icons8.com/ios/25/000000/lock-2.png"/></span>
          </div>
            <div class="Pay-Car-Second-Row">
            <div class="Pay-Car-Left-Second-Container">
              Expired Date
              <div class="">
                <input class="MMYY_Input" type="number" min="1" max="12" onkeyup="if(parseInt(this.value)>12){ this.value =12; return false; }" name="CARD_MM_NUMBER" maxlength="2" placeholder="MM">
                <input class="MMYY_Input" type="number" min="20" max="24" onkeyup="if(parseInt(this.value)>24){ this.value =24; return false; }"name="CARD_YY_NUMBER" placeholder="YY">
              </div>
            </div>
            <div class="Pay-Car-Right-Second-Container">
              CV Code
              <input class="CVV_Input" type="number" min="111" max="999" onkeyup="if(parseInt(this.value)>999){ this.value =999; return false; }" name="CARD_CVV_NUMBER" placeholder="CVV">
            </div>
          </div>
            <div id="Pay-Car-Bottom">
            <div class="Pay-Car-Left-Second-Container">
              <span class="Total_Amount">Total: </span><span class="Total_Amount"><?= $data['TotalAmount'];  ?></span>
            </div>
            <div class="Pay-Car-Right-Second-Container">
              <button type="submit" class="Payment_Button" name="button">Pay</button>
            </div>
          </div>
          </form>
        </div>
      </div>
  </body>
</html>
