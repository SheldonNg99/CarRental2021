<?php

class Home_Model extends Dbh{

  //Select top 3 cars return it
  public function GetMostPopularCarBasedOnServiceTwo(){
    $sql = "SELECT * FROM availability,cars
            WHERE availability.Car_Id = cars.Car_Id
            AND availability.Status_Of_Car = 'Waiting'
            AND availability.Service_Id = 2
            ORDER BY cars.Car_Id DESC
            LIMIT 5";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  //Select the Current Location from the Availibility
  public function GetAvailabilityCurrentLocationBasedOnService($ServiceId){
    $sql = "SELECT DISTINCT Current_Location FROM availability
            WHERE Service_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$ServiceId]);

    $results = $stmt->fetchAll();
    return $results;
  }

  //Select the Destination from the Availibility
  public function GetDestinationLocationBasedOnService($ServiceId){
    $sql = "SELECT DISTINCT Destinastion FROM availability
            WHERE Service_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$ServiceId]);

    $results = $stmt->fetchAll();
    return $results;
  }

  //Select Top 3 cars based on the  Car_Average_Review
  public function GetTopRateCar(){
    $sql = "SELECT * FROM cars ORDER BY Car_Average_Review DESC LIMIT 3";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  //get the car category
  public function GettheCategoryOfCars(){
    $sql = "SELECT DISTINCT car_category FROM cars ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  //Select car form the Availibility based on the service id
  public function GetTheCarBasedOnServiceIdOf2(){
    //Join the table because Some datas are invalid in tables

    $sql = "SELECT * FROM availability,cars
            where availability.Car_Id = cars.Car_Id
            AND availability.Service_Id = 2
            AND availability.Status_Of_Car = 'Waiting'
            LIMIT 3";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }

  //Select the Current Location from the Availibility Based on service
  public function GetAvailabilityCurrentLocationBasedOnServiceOne(){
    $sql = "SELECT DISTINCT Current_Location FROM availability
            WHERE Service_Id = 1";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  //Select the Destination from the Availibility
  public function GetDestinationLocationBasedOnServiceOne(){
    $sql = "SELECT DISTINCT Destinastion FROM availability
            WHERE Service_Id = 1";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }
  // Select Car based on service 1
  public function GetMostPopularCarBasedOnServiceOne(){
    $sql = "SELECT * FROM availability,cars
            WHERE availability.Car_Id = cars.Car_Id
            AND availability.Status_Of_Car = 'Waiting'
            AND availability.Service_Id = 1
            ORDER BY cars.Car_Id DESC
            LIMIT 5";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  // Select car form the Availibility based on the service id
  public function GetTheCarBasedOnServiceIdOfOne(){
    // Join the table because Some datas are invalid in tables
    $sql = "SELECT * FROM availability,cars
            where availability.Car_Id = cars.Car_Id
            AND availability.Service_Id = 1
            AND availability.Status_Of_Car = 'Waiting'
            ORDER BY cars.Car_Average_Review DESC
            LIMIT 3";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }

  //Select the Current Location from the Availibility with service id 3
  public function GetCurrentLocationServiceThird(){
    $sql = "SELECT DISTINCT Current_Location FROM availability
            WHERE Service_Id = 3";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  //Select the Destination from the Availibility with service id 3
  public function GetDestinationLocationServiceThird(){
    $sql = "SELECT DISTINCT Destinastion FROM availability
            WHERE Service_Id = 3";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  //Select top 3 cars return it with service id 3
  public function GetMostPopularCarBasedOnServiceThird(){
    $sql = "SELECT * FROM availability,cars
            WHERE availability.Car_Id = cars.Car_Id
            AND availability.Status_Of_Car = 'Waiting'
            AND availability.Service_Id = 3
            ORDER BY cars.Car_Id DESC
            LIMIT 5";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  //Select car form the Availibility based on the service id 3
  public function GetTheCarBasedOnServiceThird(){
    //Join the table because Some datas are invalid in tables
    $sql = "SELECT * FROM availability,cars
            where availability.Car_Id = cars.Car_Id
            AND availability.Service_Id = 3
            AND availability.Status_Of_Car = 'Waiting'
            ORDER BY cars.Car_Average_Review DESC
            LIMIT 3";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }

  //Select top 3 cars return it with service id 4
  public function GetMostPopularCarBasedOnServiceFourth(){
    $sql = "SELECT * FROM availability,cars
            WHERE availability.Car_Id = cars.Car_Id
            AND availability.Status_Of_Car = 'Waiting'
            AND availability.Service_Id = 4
            ORDER BY cars.Car_Id DESC
            LIMIT 5";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }


  //Select car form the Availibility based on the service id 4
  public function GetTheCarBasedOnServiceFourth(){
    //Join the table because Some datas are invalid in tables
    $sql = "SELECT * FROM availability,cars
            where availability.Car_Id = cars.Car_Id
            AND availability.Service_Id = 4
            AND availability.Status_Of_Car = 'Waiting'
            ORDER BY cars.Car_Average_Review DESC
            LIMIT 3";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }

}
