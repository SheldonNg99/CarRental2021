<?php

class Driver_Model extends Dbh{
  private $DriverName;
  private $DriverAge;
  private $Car_Id;

  public function UploadDriver($data){
    $DriverName = $this->DriverName = $data['DriverName'];
    $DriverAge = $this->DriverAge = $data['DriverAge'];
    $Car_Id = $this->Car_Id = $data['CarId'];

    $sql = "INSERT INTO driver(Driver_Name,Driver_Age,Car_Id) VALUES (?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$DriverName,$DriverAge,$Car_Id]);
    //Row count to count the row
    $results = $stmt->rowCount();
    return $results;
  }
}
