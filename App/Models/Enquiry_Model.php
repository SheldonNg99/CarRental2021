<?php

class Enquiry_Model extends Dbh{

  private $EnquiryContent;
  private $UserId;
  Private $AvailableId;
  private $EnquiryDateTime;
  private $EnquiryId;
  private $ReplyContent;
  private $ReplyDateTime;
  private $Reply_Id;
  private $Enquiry_Reply_Id;

  public function SetEnquiry($data){
    $EnquiryContent = $this->EnquiryContent = $data['Enquiry'];
    $AvailableId = $this->AvailableId = $data['availableid'];
    $UserId = $this->UserId = $_SESSION['id'];
    // delete space of the rating content
    $EnquiryContent = ltrim($EnquiryContent);
    $EnquiryContent = rtrim($EnquiryContent);
    $EnquiryDateTime = $this->EnquiryDateTime = date("Y-m-d H:i:s");


    $sql = "INSERT INTO enquiry(Enquiry_Content,Enquiry_Date_Time,User_Id,Available_Id ) VALUES (?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$EnquiryContent,$EnquiryDateTime,$UserId,$AvailableId]);
    $results = $stmt->rowCount();
    return $results;
  }

  public function GetEnquiryId(){
    $sql = "SELECT Enquiry_Id FROM enquiry ORDER BY Enquiry_Id DESC LIMIT 1";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if($results > 0){
      foreach($results as $result){
        $results = $result['Enquiry_Id'];
      }
    }
    else{
      $results = 0;
    }
    return $results;
  }

  public function SetEnquiryReplyJunctionFunction($EnquiryId){
    $EnquiryId = $this->EnquiryId = $EnquiryId;
    $sql = "INSERT INTO enquiry_reply(Enquiry_Id) VALUES (?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$EnquiryId]);
    $results = $stmt->rowCount();
    return $results;
  }

  public function SetReply($data){
    $ReplyContent = $this->ReplyContent = $data['ReplyEnquiry'];
    $UserId = $this->UserId = $_SESSION['id'];
    // delete space of the rating content
    $ReplyContent = ltrim($ReplyContent);
    $ReplyContent = rtrim($ReplyContent);
    $ReplyDateTime = $this->ReplyDateTime = date("Y-m-d H:i:s");


    $sql = "INSERT INTO reply(Reply_Content,Reply_Date_Time,User_Id) VALUES (?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$ReplyContent,$ReplyDateTime,$UserId]);
    $results = $stmt->rowCount();
    return $results;
  }

  public function GetReplyId(){
    $sql = "SELECT Reply_Id FROM reply ORDER BY Reply_Id DESC LIMIT 1";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if($results > 0){
      foreach($results as $result){
        $results = $result['Reply_Id'];
      }
    }
    else{
      $results = 0;
    }
    return $results;
  }

  public function GetEnquiry_Reply_Id($data){
    $EnquiryId = $this->EnquiryId = $data['EnquiryID'];
    $sql = "SELECT Enquiry_Reply_Id FROM enquiry_reply WHERE Enquiry_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$EnquiryId]);
    $results = $stmt->fetchAll();
    if($results > 0){
      foreach($results as $result){
        $results = $result['Enquiry_Reply_Id'];
      }
    }
    else{
      $results = 0;
    }
    return $results;
  }

  public function SetEnquiryReply_IdJunctionFunction($Reply_Id,$Enquiry_Reply_Id){
    $Enquiry_Reply_Id = $this->Enquiry_Reply_Id = $Enquiry_Reply_Id;
    $Reply_Id = $this->Reply_Id = $Reply_Id;
    $sql = "UPDATE enquiry_reply
            SET Reply_Id = ?
            WHERE Enquiry_Reply_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$Reply_Id,$Enquiry_Reply_Id]);
    $results = $stmt->rowCount();
    return $results;
  }

  public function GetPreviousEnquiryDetails(){
    $UserId = $this->UserId = $_SESSION['id'];
    $sql = "SELECT *
            FROM enquiry
            INNER JOIN availability ON availability.Available_Id = enquiry.Available_Id
            INNER JOIN cars ON cars.Car_Id = availability.Car_Id
            INNER JOIN users ON users.User_Id = enquiry.User_Id
            INNER JOIN enquiry_reply ON enquiry_reply.Enquiry_Id = enquiry.Enquiry_Id
            INNER JOIN reply ON reply.Reply_Id = enquiry_reply.Reply_Id
            WHERE enquiry.User_Id = $UserId";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  public function GetAllPreviousEnquiryDetails(){
    $sql = "SELECT *
            FROM enquiry
            INNER JOIN availability ON availability.Available_Id = enquiry.Available_Id
            INNER JOIN cars ON cars.Car_Id = availability.Car_Id
            INNER JOIN users ON users.User_Id = enquiry.User_Id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

}
