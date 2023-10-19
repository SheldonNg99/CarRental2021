<?php

class Admin extends Controller{
  public function index(){
    //Send the data from the url
    $data['title'] = "Dashboard";
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('AdminViews/Admin_Index',$data);
    $this->view('Templates/Footer');
  }
  //Car
  public function Car(){
    $data['title'] = "Dashboard Upload";
    //$data['categories'] = $this->model('CategoryModel')->GetCategory();
    $data['Get_All_Cars'] = $this->model('Admin_Model')->GetAllCars();
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('AdminViews/Admin_Car',$data);
    $this->view('Templates/Footer');
  }

  public function Upload_Car(){
    $data['title'] = "Dashboard Upload";
    //$data['categories'] = $this->model('CategoryModel')->GetCategory();
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('AdminViews/Admin_Upload_Car',$data);
    $this->view('Templates/Footer');
  }
  // Upload Car
  public function UploadCar(){
      //pass to to validate the data
      $results = $this->model('Car_Model')->ValidateUploadCarData($_POST);
      $result = $results['DataError']['message'];

      if($result == "Success"){
        //Go through the Create new car process
        $results = $this->model('Car_Model')->UploadCar($_POST);
        $result = $results['DataError']['message'];
        if ($results > 0 ) {
          //Flasher::setFlash('Data Inserted ', ' Success', 'primary');
          header('Location: '. BASEURL.'/Admin/Car');
        }
        else{
          Flasher::setFlash('Error: '. $result, ' Success', 'primary');
          header('Location: '. BASEURL.'/Admin/Upload_Car');
        }
      }
      else{
        Flasher::setFlash('Error: '.$result, ' Success', 'primary');
        header('Location: '. BASEURL.'/Admin/Upload_Car');
      }

  }
  // Driver
  public function Upload_Driver(){
    $data['title'] = "Dashboard Upload";
    //$data['categories'] = $this->model('CategoryModel')->GetCategory();
    $data['CarIdAndName'] = $this->model('Admin_Model')->GetCarIdAndName();
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('AdminViews/Admin_Upload_Driver',$data);
    $this->view('Templates/Footer');
  }

  // Upload the Driver
  public function UploadDriver(){
      //Go through the Create new car process
      $results = $this->model('Driver_Model')->UploadDriver($_POST);
      $result = $results['DataError']['message'];
      if ($results > 0 ) {
        Flasher::setFlash('Driver Inserted', ' Success', 'primary');
        header('Location: '. BASEURL.'/Admin/Upload_Driver');
      }
      else{
        Flasher::setFlash('Error: '. $result, ' Success', 'primary');
        header('Location: '. BASEURL.'/Admin/Upload_Driver');
      }
  }
  // Dashboard Category
  public function Availibity(){
    $data['title'] = "Dashboard Category";
    $data['Get_All_Availibility'] = $this->model('Admin_Model')->GetAllAvaibility();
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('AdminViews/Admin_Car_Availibity',$data);
    $this->view('Templates/Footer');
  }
  // Upload Availibity
  public function Upload_Availibity(){
    $data['title'] = "Availibity";
    $data['CarIdAndName'] = $this->model('Admin_Model')->GetCarIdAndName();
    $data['ServiceIdAndName'] = $this->model('Admin_Model')->GetServiceIdAndName();
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('AdminViews/Admin_Upload_Availibity',$data);
    $this->view('Templates/Footer');
  }

  // Upload Availibity
  public function UploadAvailibity(){
      //pass to to validate the data
      $results = $this->model('Availability_Model')->ValidateUploadAvailabilityData($_POST);
      $result = $results['DataError']['message'];

      if($result == "Success"){
        //Go through the Create new car process
        $results = $this->model('Availability_Model')->UploadAvailibity($_POST);
        if ($results > 0 ) {
          //Flasher::setFlash('Data Inserted ', ' Success', 'primary');
          header('Location: '. BASEURL.'/Admin/Availibity');
        }
        else{
          $result = $results['DataError']['message'];
          Flasher::setFlash('Error: '. $result, ' Success', 'primary');
          header('Location: '. BASEURL.'/Admin/Upload_Availibity');
        }
      }
      else{
        Flasher::setFlash('Error: '.$result, ' Success', 'primary');
        header('Location: '. BASEURL.'/Admin/Upload_Availibity');
      }

  }
  //Dashboard Product
  public function Driver(){
    $data['title'] = "Dashboard Product";
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('AdminViews/Dashboard_Product',$data);
    $this->view('Templates/Footer');
  }
  //Dashboard Revenue
  public function Reply(){
    $data['title'] = "Dashboard Revenue";
    $data['GetPreviousEnquiryDetails'] = $this->model('Enquiry_Model')->GetAllPreviousEnquiryDetails();
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('AdminViews/Admin_Enquiry',$data);
    $this->view('Templates/Footer');
  }
  // Reply Enquiry
  public function ReplyEnquiry(){
    $data['title'] = "Dashboard Revenue";
    $data['GetPreviousEnquiryDetails'] = $this->model('Enquiry_Model')->GetAllPreviousEnquiryDetails();
    // set enquiry
    $result = $this->model('Enquiry_Model')->SetReply($_POST);
    // Get the latest enquiry id
    $Enquiry_Reply_Id = $this->model('Enquiry_Model')->GetEnquiry_Reply_Id($_POST);
    // Get the latest reply id
    $Reply_Id = $this->model('Enquiry_Model')->GetReplyId();
    // Set into the junction table
    $this->model('Enquiry_Model')->SetEnquiryReply_IdJunctionFunction($Reply_Id,$Enquiry_Reply_Id);
    //Flasher::setFlash($EnquiryId, ' Success', 'primary');
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('AdminViews/Admin_Enquiry',$data);
    $this->view('Templates/Footer');
  }

}
