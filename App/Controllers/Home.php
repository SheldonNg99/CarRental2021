<?php

class Home extends Controller{
  public function index(){
    //Send the data from the url
    $data['title'] = 'Home';
    //By Default
    $ServiceId = $_SESSION['ServiceId'] = 2;
    //Get the Most popular cars
    $data['Most_Popular_Cars'] = $this->model('Home_Model')->GetMostPopularCarBasedOnServiceTwo();
    $data['Current_Location_Cars'] = $this->model('Home_Model')->GetAvailabilityCurrentLocationBasedOnService($ServiceId);
    $data['Destination_Cars'] = $this->model('Home_Model')->GetDestinationLocationBasedOnService($ServiceId);
    $data['LongShortDistanceServiceCars'] = $this->model('Home_Model')->GetTheCarBasedOnServiceIdOf2();
    $data['Category_Car'] = $this->model('Home_Model')->GettheCategoryOfCars();
    //Send the data by using model
    //Flasher::setFlash($ServiceId, ' Success', 'primary');
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('HomeViews/Home_index',$data);
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
