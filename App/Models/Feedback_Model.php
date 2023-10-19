<?php

class Feedback_Model extends Dbh{

  private $RatingContent;
  private $RatingStar;
  private $UserId;
  Private $CarId;
  private $CommendDateTime;

  public function SetFeedback($data, $CarId){
    $RatingContent = $this->RatingContent = $data['feedback'];
    // delete space of the rating content
    $RatingContent = ltrim($RatingContent);
    $RatingContent = rtrim($RatingContent);
    $CommendDateTime = $this->CommendDateTime = date("Y-m-d H:i:s");
    $RatingStar = $this->RatingStar = $data['phprating'];
    $CarId = $this->CarId = $CarId;
    $UserId = $this->UserId = $_SESSION['id'];

    $sql = "INSERT INTO rating(Rating_Content,Rating_Star,User_Id,Car_Id,Rate_Date_Time ) VALUES (?,?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$RatingContent,$RatingStar,$UserId,$CarId,$CommendDateTime]);
    $results = $stmt->rowCount();
    return $results;
  }

  public function GetFeedback($CarId){
    // Select feedback based on the Car Id
    $sql = "SELECT * FROM
            rating
            INNER JOIN users ON users.User_Id = rating.User_Id
            WHERE Car_Id = $CarId
            LIMIT 5";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

}
