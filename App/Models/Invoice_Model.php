<?php

class Invoice_Model extends Dbh{

  private $TodayDateTime;
  private $TodayDate;
  private $User_Id;
  private $Book_Id;
  private $Invoice_Id;
  public function SetInvoiceAfterRide($Book_Id){
    $TodayDateTime = $this->TodayDateTime = date("Y-m-d H:i:s");
    $TodayDate = $this->TodayDate = date("Ymd");
    // Current User with Yaf_Session
    $User_Id = $this->User_Id = $_SESSION['id'];
    // Invoice id = today date + User Id + Book Id
    $Invoice_Id = $TodayDate.$User_Id.$Book_Id;
    $sql = "INSERT INTO invoice(Invoice_Id,User_Id,Book_Id,Date_Time_Of_Invoice) VALUES (?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$Invoice_Id,$User_Id,$Book_Id,$TodayDateTime]);
    $results = $stmt->rowCount();
    return $Invoice_Id.$results;

  }
}
