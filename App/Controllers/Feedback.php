<?php
class Feedback extends Controller{
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
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('ConfirmationViews/Confirmation',$data);
    $this->view('Templates/Footer');
  }

  public function SubmitFeedback(){
    //Check whether the user is login or not
    if (isset($_SESSION['id'])) {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get Booking Id
        $Booking_Id = $this->model('Book_Model')->GetBookingId();
        // Get Car Id based on Booking Id
        $Car_Id = $this->model('Book_Model')->GetCarIdBasedOnBookingId($Booking_Id);
        // Update the status of booking to completed
        $this->model('Book_Model')->UpdateBookingStatusAfterRide($Booking_Id);
        // Update the status of car to waiting
        $this->model('Availability_Model')->UpdataAvailabilityAfterRide($Car_Id);
        // Insert into database
        $result = $this->model('Feedback_Model')->SetFeedback($_POST, $Car_Id);
        // Update the average review of car
        

        //Flasher::setFlash($Car_Id.$_SESSION['id'].$result, ' Success', 'primary');
        header('Location: '. BASEURL .'/Home');
        }
        else{
          Flasher::setFlash('Error: Invalid Post', ' Success', 'primary');
          header('Location: '. BASEURL);
        }
      }
    else{
    Flasher::setFlash('Error: Please Login Before Leaving Feedback', ' Success', 'primary');
    header('Location: '. BASEURL);
    }
  }
}
