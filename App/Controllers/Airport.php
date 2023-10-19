<?php

class Airport extends Controller{
  public function index(){
    //Send the data from the url
    $data['title'] = 'Yorkshire';
    //Send the data by using model
    $ServiceId = $_SESSION['ServiceId'] = 3;
    $data['Most_Popular_Cars'] = $this->model('Home_Model')->GetMostPopularCarBasedOnServiceThird();
    $data['Current_Location_Cars'] = $this->model('Home_Model')->GetAvailabilityCurrentLocationBasedOnService($ServiceId);
    $data['Destination_Cars'] = $this->model('Home_Model')->GetDestinationLocationBasedOnService($ServiceId);
    $data['LongShortDistanceServiceCars'] = $this->model('Home_Model')->GetTheCarBasedOnServiceThird();
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('HomeViews/Airport_index',$data);
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
