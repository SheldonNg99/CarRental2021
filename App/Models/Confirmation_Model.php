<?php

class Confirmation_Model extends Dbh{

  private $StatusOfCar;
  public function DisplayCarDetailsDuringWaiting($Car_Id){
    $sql = "SELECT * FROM cars
            where Car_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$Car_Id]);
    $results = $stmt->fetchAll();
    return $results;
  }

  // transfering passenger
  public function UpdateStatusOfCarInAvailibility($Car_Id){
    $StatusOfCar = $this->StatusOfCar = "Transfering";
    $sql = "UPDATE availability
            SET Status_Of_Car = ?
            WHERE Car_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$StatusOfCar,$Car_Id]);
    $results = $stmt->rowCount();
    return $results;
  }

}
