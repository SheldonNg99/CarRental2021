<?php

class Car_Model extends Dbh{

  private $CarName;
  private $CarType;
  private $CarImage;
  private $CarPlate;
  private $CarCoolingSystem;
  private $NumberOfDoors;
  private $NumberOfPassengers;
  private $NumberOfBags;
  private $CarSystem;
  private $CarFuelPolicy;
  private $CarUnlimitedMilleage;
  private $CarCollisionDamageWaiver;
  private $CarTheftProtectionWaiver;
  private $CarCategory;

  public function ValidateUploadCarData($data){

    $CarName = $this->CarName = $data['Car-Name'];
    $CarType = $this->CarType = $data['Car-Type'];
    $CarPlate = $this->CarPlate = $data['Car-Plate-Number'];
    $CarCoolingSystem = $this->CarCoolingSystem = $data['Car-Cooling-System'];
    $NumberOfDoors = $this->NumberOfDoors = $data['Number-of-Doors'];
    $NumberOfPassengers = $this->NumberOfPassengers = $data['Number-of-Passengers'];
    $NumberOfBags = $this->NumberOfDoors = $data['Number-of-Bags'];

    //1. Define the pattern
    $Pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';

    if(preg_match($Pattern,$CarName)){
      //If special symbol is not allowed in the car name
      $results['DataError'] = array(
        'message' => "Car Name must not has Special Character",
      );
      return $results;
    }
    else if(preg_match("#[a-z]+#",$CarPlate)){
      $results['DataError'] = array(
        'message' => "Plate Number must be in Capital Letter and Number Only",
      );
      return $results;
    }
    else if(preg_match($Pattern,$CarPlate)){
      $results['DataError'] = array(
        'message' => "Plate Number must be in Capital Letter and Number Only",
      );
      return $results;
    }
    else if(!(is_numeric($NumberOfDoors))){
      $results['DataError'] = array(
        'message' => "Number of Doors must be in Number Only",
      );
      return $results;
    }
    else if(!($NumberOfDoors >= 4 && $NumberOfDoors<= 6)){
      $results['DataError'] = array(
        'message' => "Number of Doors must be more or equal to 4 and less than 6",
      );
      return $results;
    }
    else if(!(is_numeric($NumberOfPassengers))){
      $results['DataError'] = array(
        'message' => "Number of Passengers must be in Number Only",
      );
      return $results;
    }
    else if(!($NumberOfPassengers >= 1 && $NumberOfPassengers <= 10)){
      $results['DataError'] = array(
        'message' => "Number of Passengers must be more or equal to 1 and less than 10",
      );
      return $results;
    }
    else if(!(is_numeric($NumberOfBags))){
      $results['DataError'] = array(
        'message' => "Number of Bags must be in Number Only",
      );
      return $results;
    }
    else if(!($NumberOfBags >= 1 && $NumberOfBags<= 6)){
      $results['DataError'] = array(
        'message' => "Number of Bags must be more or equal to 1 and less than 6",
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

  public function UploadCar($data){
    $target_dir ="../Public/img/";
    $target_file = $target_dir . basename($_FILES["Car-Image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $CarName = $this->CarName = $data['Car-Name'];
    $CarType = $this->CarType = $data['Car-Type'];
    $CarPlate = $this->CarPlate = $data['Car-Plate-Number'];
    $CarCoolingSystem = $this->CarCoolingSystem = $data['Car-Cooling-System'];
    $NumberOfDoors = $this->NumberOfDoors = $data['Number-of-Doors'];
    $NumberOfPassengers = $this->NumberOfPassengers = $data['Number-of-Passengers'];
    $NumberOfBags = $this->NumberOfDoors = $data['Number-of-Bags'];
    $CarSystem = $this->CarSystem = $data['Car-System'];
    $CarFuelPolicy = $this->CarFuelPolicy = $data['Car-Fuel-Policy'];
    $CarUnlimitedMilleage = $this->CarUnlimitedMilleage = $data['Car-Unlimited-Milleage'];
    $CarCollisionDamageWaiver = $this->CarCollisionDamageWaiver = $data['Car-Collision-Damage-Waiver'];
    $CarTheftProtectionWaiver = $this->CarTheftProtectionWaiver = $data['Car-Theft-Protection-Waiver'];
    $CarCategory = $this->CarCategory = $data['Car-Category'];
    // Check if image file is a actual image or fake image
    // Check if file already exists
    if (file_exists($target_file)) {
      $results['DataError'] = array(
          'message' => "Sorry, file already exists.",
      );
      $uploadOk = 0;
    }
    else{
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
        $results['DataError'] = array(
            'message' => "Sorry, your file is too large.",
        );
        $uploadOk = 0;
      }
      else{
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
          $results['DataError'] = array(
              'message' => "Sorry, only JPG, JPEG, PNG & GIF files are allowed.",
          );
          $uploadOk = 0;
        }
        else{
          move_uploaded_file($_FILES["Car-Image"]["tmp_name"], $target_file);
          $sql = "INSERT INTO cars(Car_Name,Car_Type,Car_Picture,Car_Plat_Number,Car_Cooling_System,Car_Number_Of_Door,Car_Passengers,Car_Bag_Quantity,Car_System,Car_Fuel_Policy,Car_Unlimited_Mileage,Car_Collision_Damage_Waiver,Car_Theft_Protection_Waiver,Car_Category) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          $stmt = $this->connect()->prepare($sql);
          $stmt->execute([$CarName,$CarType,$target_file,$CarPlate,$CarCoolingSystem,$NumberOfDoors,$NumberOfPassengers,$NumberOfBags,$CarSystem,$CarFuelPolicy,$CarUnlimitedMilleage,$CarCollisionDamageWaiver,$CarTheftProtectionWaiver,$CarCategory]);
          //Row count to count the row
          $results = $stmt->rowCount();
          }
        }
      }
    return $results;
  }


  public function GetCarAverageReview($CarId){
    // Select feedback based on the Car Id
    $sql = "SELECT Car_Average_Review FROM cars where Car_Id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$CarId]);

    $results = $stmt->fetchAll();
    return $results;
  }

}
