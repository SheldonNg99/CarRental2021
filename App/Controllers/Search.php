<?php

class Search extends Controller{
  public function index(){
    //Send the data from the url
    $data['title'] = 'Yorkshire';
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

  public function SearchResult(){
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $_SESSION['Period_Of_Booking'] = 0;
      $_SESSION['Period_Of_Booking'] = $_POST['PeriodOfBooking'];
      $ServiceId = $_SESSION['ServiceId'];
      //Send the data from the url
      $data['title'] = 'Yorkshire';
      // Get Current Location
      $data['Current_Location_Cars'] = $this->model('Home_Model')->GetAvailabilityCurrentLocationBasedOnService($ServiceId);
      // Get Destination
      $data['Destination_Cars'] = $this->model('Home_Model')->GetDestinationLocationBasedOnService($ServiceId);
      // Get all car based on current location and with service 2
      $data['SearchCarResult'] = $this->model('Search_Model')->SearchCarBasedOnCurrentLocationAndService($_POST);
      //Send the data by using model
      $this->view('Templates/Header',$data);
      $this->view('Templates/SideNav');
      $this->view('SearchViews/Cars_Result',$data);
      $this->view('Templates/Footer');
    }
    else
    {
      Flasher::setFlash('Error: POST Invalid', ' Success', 'primary');
      header('Location: '. BASEURL);
    }

  }

  public function SearchAgain(){
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $_SESSION['Period_Of_Booking'] = 0;
      $_SESSION['Period_Of_Booking'] = $_POST['PeriodOfBooking'];
      $ServiceId = $_SESSION['ServiceId'];
      //Send the data from the url
      $data['title'] = 'Yorkshire';
      // Get Current Location
      $data['Current_Location_Cars'] = $this->model('Home_Model')->GetAvailabilityCurrentLocationBasedOnService($ServiceId);
      // Get Destination
      $data['Destination_Cars'] = $this->model('Home_Model')->GetDestinationLocationBasedOnService($ServiceId);
      // Get all car based on current location and with service 2
      $data['SearchCarResult'] = $this->model('Search_Model')->SearchCarBasedOnCurrentLocationAndService($_POST);
      //Send the data by using model
      $this->view('Templates/Header',$data);
      $this->view('Templates/SideNav');
      $this->view('SearchViews/Cars_Result',$data);
      $this->view('Templates/Footer');
    }
    else
    {
      Flasher::setFlash('Error: POST Invalid', ' Success', 'primary');
      header('Location: '. BASEURL);
    }

  }

}
