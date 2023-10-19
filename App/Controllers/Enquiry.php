<?php

class Enquiry extends Controller{
  public function index(){
    //Send the data from the url
    $data['title'] = 'Yorkshire';
    //Send the data by using model
    if (isset($_SESSION['id'])) {
      // Get The Details of Previous Booking
      $data['GetPreviousEnquiryDetails'] = $this->model('Enquiry_Model')->GetPreviousEnquiryDetails();
      $this->view('Templates/Header',$data);
      $this->view('Templates/SideNav');
      $this->view('EnquiryViews/Enquiry_index',$data);
      $this->view('Templates/Footer');
    }
    else{
      Flasher::setFlash('Error: Please log in to view enquiry page', ' Success', 'primary');
      header('Location: '. BASEURL .'/Home');
    }
  }
  public function SetEnquiry(){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $data['title'] = 'Yorkshire';
      // set enquiry
      $result = $this->model('Enquiry_Model')->SetEnquiry($_POST);
      // Get the latest enquiry id
      $EnquiryId = $this->model('Enquiry_Model')->GetEnquiryId();
      // Set into the junction table
      $this->model('Enquiry_Model')->SetEnquiryReplyJunctionFunction($EnquiryId);


      $data['CarAvailibilityDetails'] = $this->model('Book_Model')->GetAvailibiltyDetails($_POST);
      $data['PricePerHour'] =  $this->model('Book_Model')->GetPricePerHour($_POST);
      // Get the car id
      $CarId = $this->model('Book_Model')->GetCarIdBasedOnAvailableId($_POST);
      // Get Average Review in star with car id
      $data['CarAverageReview'] = $this->model('Car_Model')->GetCarAverageReview($CarId);
      // Get the feedback based on the car id
      $data['FeedBackDetails'] = $this->model('Feedback_Model')->GetFeedback($CarId);
      // Get the tax oer ride
      $data['TaxPerRide'] =  $this->model('Book_Model')->GetTaxPerRide($_POST);
      // Get the initial price without the tax
      $data['InitialPrice'] = ($data['PricePerHour'] * ($_SESSION['Period_Of_Booking'] * 24));
      // Deposit is 10% of Final Price
      $data['CarDeposit'] = $data['InitialPrice'] * 10 / 100;
      //Calculate the the final price
      $data['TotalPrice'] = $data['InitialPrice'] + $data['CarDeposit'] + $data['TaxPerRide'];
      //Flasher::setFlash($EnquiryId, ' Success', 'primary');
      $this->view('Templates/Header',$data);
      $this->view('Templates/SideNav');
      $this->view('BookingViews/Book_index',$data);
      $this->view('Templates/Footer');
    }
    else{
      Flasher::setFlash('Error: Invalid Post', ' Success', 'primary');
      header('Location: '. BASEURL);
    }
  }


  public function ViewReply(){

    //Send the data from the url
    $data['title'] = 'Yorkshire';
    //Send the data by using model
    if (isset($_SESSION['id'])) {
      // Get The Details of Previous Booking
      $data['GetPreviousEnquiryDetails'] = $this->model('Enquiry_Model')->GetPreviousEnquiryDetails();
      $this->view('Templates/Header',$data);
      $this->view('Templates/SideNav');
      $this->view('EnquiryViews/Reply_index',$data);
      $this->view('Templates/Footer');
    }
    else{
      Flasher::setFlash('Error: Please log in to view enquiry page', ' Success', 'primary');
      header('Location: '. BASEURL .'/Home');
    }

  }

}
