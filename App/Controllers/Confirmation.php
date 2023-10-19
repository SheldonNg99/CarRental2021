<?php

class Confirmation extends Controller{
  public function index(){
    //Send the data from the url
    $data['title'] = 'Yorkshire';
    //Send the data by using model
    // Get Booking Id
    $Booking_Id = $this->model('Book_Model')->GetBookingId();
    // Get Car Id based on Booking Id
    $Car_Id = $this->model('Book_Model')->GetCarIdBasedOnBookingId($Booking_Id);
    // Get Car Details
    $data['Car_Details'] = $this->model('Confirmation_Model')->DisplayCarDetailsDuringWaiting($Car_Id);
    // Check return
    //Flasher::setFlash($Car_Id, ' Success', 'primary');
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('ConfirmationViews/Confirmation',$data);
    $this->view('Templates/Footer');
  }
  public function Transfering(){
    //Send the data from the url
    $data['title'] = 'Yorkshire';
    //Send the data by using model
    // Get Booking Id
    $Booking_Id = $this->model('Book_Model')->GetBookingId();
    // Get Car Id based on Booking Id
    $Car_Id = $this->model('Book_Model')->GetCarIdBasedOnBookingId($Booking_Id);
    // Update the StatusOfCar
    $this->model('Confirmation_Model')->UpdateStatusOfCarInAvailibility($Car_Id);
    // Get Car Details
    $data['Car_Details'] = $this->model('Confirmation_Model')->DisplayCarDetailsDuringWaiting($Car_Id);
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('ConfirmationViews/Feedback',$data);
    $this->view('Templates/Footer');
  }
  public function Search_Cars(){
    //Send the data from the url
    $data['title'] = 'Results';
    //Send the data by using model
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('SearchViews/Cars_Result',$data);
    $this->view('Templates/Footer');
  }
  public function error(){
    if(isset($_SESSION['loggedin'])){
      echo '<a class="nav-link" href="'. BASEURL .'/Login/LogoutUser">Log out</a>';
    }
    else{
      echo '<button type="button" class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#staticBackdrop">
                Login In
              </button>';
    }

  }
}
