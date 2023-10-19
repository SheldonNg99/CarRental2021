<?php

class History_Model extends Dbh{

  private $UserId;
  public function GetPreviousBookingDetails(){
    $UserId = $this->UserId = $_SESSION['id'];
    $sql = "SELECT *
            FROM book
            INNER JOIN book_car ON book_car.Book_Id = book.Book_Id
            INNER JOIN cars ON cars.Car_Id = book_car.Car_Id
            INNER JOIN invoice ON invoice.Book_Id = book.Book_Id
            WHERE book.User_Id = $UserId";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }
}
