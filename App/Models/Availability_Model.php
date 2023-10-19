<?php

class Availability_Model extends Dbh{

  private $StatusOfCar;
  private $CurrentLocation;
  private $Destination;
  private $PricePerHour;
  private $TaxPerRide;
  private $PricePerRide;
  private $CarId;
  private $ServiceId;

  public function UpdataAvailabilityAfterPaid($Car_Id){
    $StatusOfCar = $this->StatusOfCar = "Sending";
    $sql = "UPDATE availability
            SET Status_Of_Car = ?
            WHERE Car_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$StatusOfCar,$Car_Id]);
    $results = $stmt->rowCount();
    return $results;
  }

  public function UpdataAvailabilityAfterRide($Car_Id){
    $StatusOfCar = $this->StatusOfCar = "Waiting";
    $sql = "UPDATE availability
            SET Status_Of_Car = ?
            WHERE Car_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$StatusOfCar,$Car_Id]);
    $results = $stmt->rowCount();
    return $results;
  }


  public function ValidateUploadAvailabilityData($data){
    $CurrentLocation = $this->CurrentLocation = $data['CurrentLocation'];
    $Destination = $this->Destination = $data['Destination'];
    $PricePerHour = $this->PricePerHour = $data['PricePerHour'];
    $TaxPerRide = $this->TaxPerRide = $data['TaxPerRide'];
    $PricePerRide = $this->PricePerRide = $data['PricePerRide'];
    $CarId = $this->CarId = $data['CarId'];
    $ServiceId = $this->ServiceId = $data['ServiceId'];

    //1. Define the pattern
    $Pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

    if(preg_match($Pattern,$CurrentLocation)){
      //If special symbol is not allowed in the car name
      $results['DataError'] = array(
        'message' => "Location must not has Special Character",
      );
      return $results;
    }
    else if(preg_match($Pattern,$Destination)){
      $results['DataError'] = array(
        'message' => "Destination must not has Special Character",
      );
      return $results;
    }
    else if($PricePerHour < 0 && $PricePerHour < 100){
      $results['DataError'] = array(
        'message' => "Price Per Hour must more than 0 and less than 100",
      );
      return $results;
    }

    else if($TaxPerRide < 0 && $TaxPerRide < 100){
      $results['DataError'] = array(
        'message' => "Tax Per Ride must more than 0 and less than 100",
      );
      return $results;
    }
    else if($PricePerRide < 0 && $PricePerRide < 100){
      $results['DataError'] = array(
        'message' => "Price Per Ride must more than 0 and less than 100",
      );
      return $results;
    }
    else{
      //return success when nothing wrong
      $results['DataError'] = array(
          'message' => "Success",
      );
      return $results;
    }
  }
  public function UploadAvailibity($data){
    $CurrentLocation = $this->CurrentLocation = $data['CurrentLocation'];
    $Destination = $this->Destination = $data['Destination'];
    $PricePerHour = $this->PricePerHour = $data['PricePerHour'];
    $TaxPerRide = $this->TaxPerRide = $data['TaxPerRide'];
    $PricePerRide = $this->PricePerRide = $data['PricePerRide'];
    $CarId = $this->CarId = $data['CarId'];
    $ServiceId = $this->ServiceId = $data['ServiceId'];
    $StatusOfCar = "Waiting";

    $sql = "INSERT INTO availability(Current_Location,Destinastion,PricePerHour,TaxPerRide,Car_Id,Status_Of_Car,Service_Id,PricePerRide) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$CurrentLocation,$Destination,$PricePerHour,$TaxPerRide,$CarId,$StatusOfCar,$ServiceId,$PricePerRide]);
    //Row count to count the row
    $results = $stmt->rowCount();
    return $results;
  }

}
