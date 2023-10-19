<?php

class Book extends Controller{
  public function Search_Cars(){
    //Send the data from the url
    $data['title'] = 'Yorkshire';
    //Send the data by using model
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('SearchViews/Cars_Result',$data);
    $this->view('Templates/Footer');
  }
  //Get the details of the car based on the car id
  public function GetBookingCarDetailsbook(){
    $data['title'] = 'Yorkshire';
    //Check whether the user is login or not
    if (isset($_SESSION['id'])) {
      if ($_POST['action'] && $_POST['availableid']) {
        if ($_POST['action'] == 'Book') {
          if (isset($_SESSION['Period_Of_Booking'])) {
          }
          else{
            $_SESSION['Period_Of_Booking'] = 1;
          }
          $data['availableid'] = $_POST['availableid'];

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
          //Flasher::setFlash($CarId, ' Success', 'primary');
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
    }
    else{
    Flasher::setFlash('Error: Please Login Before Book', ' Success', 'primary');
    header('Location: '. BASEURL);
    }
  }

  // Different calculate for hotel & Airport
  public function GetHABookingCarDetails(){
    $data['title'] = 'Yorkshire';
    //Check whether the user is login or not
    if (isset($_SESSION['id'])) {
      if ($_POST['action'] && $_POST['availableid']) {
        if ($_POST['action'] == 'Book') {
          if (isset($_SESSION['Period_Of_Booking'])) {
          }
          else{
            $_SESSION['Period_Of_Booking'] = "Charges Per Ride";
          }
          $data['availableid'] = $_POST['availableid'];

          $data['CarAvailibilityDetails'] = $this->model('Book_Model')->GetAvailibiltyDetails($_POST);
          $data['PricePerRide'] =  $this->model('Book_Model')->GetPricePerRide($_POST);
          // Get the car id
          $CarId = $this->model('Book_Model')->GetCarIdBasedOnAvailableId($_POST);
          // Get Average Review in star with car id
          $data['CarAverageReview'] = $this->model('Car_Model')->GetCarAverageReview($CarId);
          // Get the feedback based on the car id
          $data['FeedBackDetails'] = $this->model('Feedback_Model')->GetFeedback($CarId);
          // Get the tax oer ride
          $data['TaxPerRide'] =  $this->model('Book_Model')->GetTaxPerRide($_POST);
          // Get the initial price without the tax
          $data['InitialPrice'] = $data['PricePerRide'];
          // Deposit is 10% of Final Price
          $data['CarDeposit'] = $data['InitialPrice'] * 10 / 100;
          //Calculate the the final price
          $data['TotalPrice'] = $data['InitialPrice'] + $data['CarDeposit'] + $data['TaxPerRide'];
          //Flasher::setFlash($CarId, ' Success', 'primary');
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
    }
    else{
    Flasher::setFlash('Error: Please Login Before Book', ' Success', 'primary');
    header('Location: '. BASEURL);
    }
  }

  public function BookTheCar(){
    //Change the status of the car
    if ($_POST['action'] && $_POST['carid']) {
      if ($_POST['action'] == 'Pay Now') {
        $data['title'] = 'Pay';
        $CarId = $_POST['carid'];
        // edit the post with $_POST['id']
        //Calculate the the final price
        $this->model('Book_Model')->SetBooking($_POST);
        $BookingId = $this->model('Book_Model')->GetBookingId();
        $this->model('Book_Model')->SetBookCarJunctionFunction($_POST,$BookingId);
        header('Location: '. BASEURL. '/Payment');
      }
      else{
        Flasher::setFlash('Error: This Car has been Booked', ' Success', 'primary');
        header('Location: '. BASEURL);
      }
    }
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
