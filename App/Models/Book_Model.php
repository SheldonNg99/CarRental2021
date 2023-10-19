<?php

class Book_Model extends Dbh{
  private $AvailableId;
  private $BookingStatus;
  private $CarId;
  private $UserId;
  private $BookStatus;
  private $TotalPrice;
  private $CarDeposit;
  private $PeriodOfBooking;
  private $InitialPrice;
  private $Departure;
  private $Destination;
  private $Tax;
  public function GetAvailibiltyDetails($data){
    $AvailableId = $this->AvailableId = $data['availableid'];
    $sql = "SELECT * FROM availability,cars
            where availability.Car_Id = cars.Car_Id
            AND availability.Available_Id = $AvailableId";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    return $results;
  }

  public function GetPricePerHour($data){
    $AvailableId = $this->AvailableId = $data['availableid'];
    $sql = "SELECT PricePerHour FROM availability,cars
            where availability.Car_Id = cars.Car_Id
            AND availability.Available_Id = $AvailableId";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    if($results > 0){
      foreach($results as $result){
        $results = $result['PricePerHour'];
      }
    }
    else{
      $results = 0;
    }
    return $results;
  }

  public function GetTaxPerRide($data){
    $AvailableId = $this->AvailableId = $data['availableid'];
    $sql = "SELECT TaxPerRide FROM availability,cars
            where availability.Car_Id = cars.Car_Id
            AND availability.Available_Id = $AvailableId";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    if($results > 0){
      foreach($results as $result){
        $results = $result['TaxPerRide'];
      }
    }
    else{
      $results = 0;
    }
    return $results;
  }

  public function GetPricePerRide($data){
    $AvailableId = $this->AvailableId = $data['availableid'];
    $sql = "SELECT PricePerRide FROM availability,cars
            where availability.Car_Id = cars.Car_Id
            AND availability.Available_Id = $AvailableId";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    if($results > 0){
      foreach($results as $result){
        $results = $result['PricePerRide'];
      }
    }
    else{
      $results = 0;
    }
    return $results;
  }

  public function GetCarIdBasedOnAvailableId($data){
    $AvailableId = $this->AvailableId = $data['availableid'];
    $sql = "SELECT Car_Id FROM availability
            where Available_Id = $AvailableId";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $results = $stmt->fetchAll();
    if($results > 0){
      foreach($results as $result){
        $results = $result['Car_Id'];
      }
    }
    else{
      $results = 0;
    }
    return $results;
  }

  public function SetBooking($data){
    $BookStatus = $this->BookStatus = "Booked";
    $CarId = $this->CarId = $data['carid'];
    $UserId = $this->UserId = $_SESSION['id'];
    $TotalPrice = $this->TotalPrice = $data['TotalPrice'];
    $CarDeposit = $this->CarDeposit = $data['CarDeposit'];
    $PeriodOfBooking = $this->PeriodOfBooking = $data['PeriodOfBooking'];
    $InitialPrice = $this->InitialPrice = $data['InitialPrice'];
    $Departure = $this->Departure = $data['Departure'];
    $Destination = $this->Destination = $data['Destination'];
    $Tax = $this->Tax = $data['Tax'];
    //$UserId = $this->$UserId = $data['psw'];
    $sql = "INSERT INTO book(User_Id,Book_Status,Total_Price,Car_Deposit,Period_Of_Book,Initial_Price,Departure,Destination,Tax) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$UserId,$BookStatus,$TotalPrice,$CarDeposit,$PeriodOfBooking,$InitialPrice,$Departure,$Destination,$Tax]);
    $results = $stmt->rowCount();
    return $results;
  }

  public function GetBookingId(){
    $sql = "SELECT Book_Id FROM book ORDER BY Book_Id DESC LIMIT 1";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    if($results > 0){
      foreach($results as $result){
        $results = $result['Book_Id'];
      }
    }
    else{
      $results = 0;
    }
    return $results;
  }

  public function SetBookCarJunctionFunction($data,$BookingId){
    $CarId = $this->CarId = $data['carid'];
    $sql = "INSERT INTO book_car(Car_Id,Book_Id) VALUES (?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$CarId,$BookingId]);
    $results = $stmt->rowCount();
    return $results;
  }

  public function UpdateBookingStatusAfterPaid($BookId){
    $BookStatus = $this->BookStatus = "Paid";
    $sql = "UPDATE book
            SET Book_Status = ?
            WHERE Book_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$BookStatus,$BookId]);
    $results = $stmt->rowCount();
    return $results;
  }

  public function UpdateBookingStatusAfterRide($BookId){
    $BookStatus = $this->BookStatus = "Completed";
    $sql = "UPDATE book
            SET Book_Status = ?
            WHERE Book_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$BookStatus,$BookId]);
    $results = $stmt->rowCount();
    return $results;
  }

  public function GetCarIdBasedOnBookingId($BookId){
    $sql = "SELECT Car_Id FROM book_car WHERE Book_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$BookId]);
    $results = $stmt->fetchAll();
    if($results > 0){
      foreach($results as $result){
        $results = $result['Car_Id'];
      }
    }
    else{
      $results = 0;
    }
    return $results;
  }

  public function GetTotalPriceBasedOnBookingId($BookId){
    $sql = "SELECT Total_Price FROM book WHERE Book_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$BookId]);
    $results = $stmt->fetchAll();
    if($results > 0){
      foreach($results as $result){
        $results = $result['Total_Price'];
      }
    }
    else{
      $results = 0;
    }
    return $results;
  }

}
