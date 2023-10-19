<?php

class Payment_Model extends Dbh{

  private $CardNumber;
  private $MMNumber;
  private $YYNumber;
  private $CVVNumber;
  private $FKBookId;
  //In the details to book database
  public function SetPaymentDetails($data ,$bookId){
    $CardNumber = $this->CardNumber = $data['CARD_NUMBER'];
    $MMNumber = $this->MMNumber = $data['CARD_MM_NUMBER'];
    $YYNumber = $this->YYNumber = $data['CARD_YY_NUMBER'];
    $CVVNumber = $this->CVVNumber = $data['CARD_CVV_NUMBER'];
    $FKBookId = $this->FKBookId = $bookId;

    $sql = "INSERT INTO payment(Card_Number,MM_Number,YY_Number,CVV_Number,Book_Id) VALUES (?,?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$CardNumber,$MMNumber,$YYNumber,$CVVNumber,$FKBookId]);
    $results = $stmt->rowCount();
    return $results;
  }



}
