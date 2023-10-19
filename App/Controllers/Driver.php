<?php

class Driver extends Controller{
  public function index(){
    //Send the data from the url
    $data['title'] = 'Yorkshire';
    $ServiceId = $_SESSION['ServiceId'] = 4;
    //Send the data by using model
    $data['Most_Popular_Cars'] = $this->model('Home_Model')->GetMostPopularCarBasedOnServiceFourth();
    $data['Current_Location_Cars'] = $this->model('Home_Model')->GetAvailabilityCurrentLocationBasedOnService($ServiceId);
    $data['Destination_Cars'] = $this->model('Home_Model')->GetDestinationLocationBasedOnService($ServiceId);
    $data['HotelAirportServiceCars'] = $this->model('Home_Model')->GetTheCarBasedOnServiceFourth();
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('HomeViews/Driver_index',$data);
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
