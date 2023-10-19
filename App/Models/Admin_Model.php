<?php

class Admin_Model extends Dbh{

  //Select all cars return it
  public function GetAllCars(){
    $sql = "SELECT * FROM cars LIMIT 5";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  // Get all available
  public function GetAllAvaibility(){
    $sql = "SELECT * FROM
            availability
            INNER JOIN cars ON cars.Car_Id = availability.Car_Id
            INNER JOIN services ON services.Service_Id = availability.Service_Id
            ORDER BY availability.Available_Id DESC
            LIMIT 5";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  // Get Car Id and Car Name
  public function GetCarIdAndName(){
    $sql = "SELECT Car_Id,Car_Name FROM cars ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  // Get Service Id and Service Name
  public function GetServiceIdAndName(){
    $sql = "SELECT Service_Id,Service_Name FROM services";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }




}
