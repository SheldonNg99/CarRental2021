<?php

class Search_Model extends Dbh{

  private $CurrentLocation;
  private $ServiceId;
  // Get all car based on current location and with service
  public function SearchCarBasedOnCurrentLocationAndService($data){
    $CurrentLocation = $this->CurrentLocation = $data['CurrentLocation'];
    $ServiceId = $this->ServiceId = $_SESSION['ServiceId'];
    $sql = "SELECT * FROM availability,cars
            where availability.Car_Id = cars.Car_Id
            AND availability.Status_Of_Car = 'Waiting'
            AND availability.Service_Id = ?
            AND availability.Current_Location = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$ServiceId,$CurrentLocation]);

    $results = $stmt->fetchAll();
    return $results;
  }

  public function SearchCarAgainBasedOnCurrentLocationAndServicetwo($data){
    $CurrentLocation = $this->CurrentLocation = $data['CurrentLocation'];
    $ServiceId = $this->ServiceId = $_SESSION['ServiceId'];
    $sql = "SELECT * FROM availability,cars
            where availability.Car_Id = cars.Car_Id
            AND availability.Status_Of_Car = 'Waiting'
            AND availability.Service_Id = ?
            AND availability.Current_Location = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$CurrentLocation]);

    $results = $stmt->fetchAll();
    return $results;
  }
}
