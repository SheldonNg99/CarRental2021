<?php

class Payment extends Controller{
  public function index(){
    //Send the data from the url
    $data['title'] = 'Yorkshire';
    // Get Booking Id
    $BookingId = $this->model('Book_Model')->GetBookingId();
    // Get the Amount to Pay
    $data['TotalAmount'] = $this->model('Book_Model')->GetTotalPriceBasedOnBookingId($BookingId);
    //Send the data by using model
    $this->view('Templates/Header',$data);
    $this->view('Templates/SideNav');
    $this->view('PaymentViews/Payment_index',$data);
    $this->view('Templates/Footer');
  }

  public function MakePayment(){
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      //Get Booking Id
      $result = $this->model('Book_Model')->GetBookingId();
      //Set the payment details
      $result = $this->model('Payment_Model')->SetPaymentDetails($_POST, $result);
      if($result > 0)
      {
        //Get Booking Id
        $Booking_Id = $this->model('Book_Model')->GetBookingId();
        //Update the booking status
        $this->model('Book_Model')->UpdateBookingStatusAfterPaid($Booking_Id);
        //Get Car Id based on Booking Id
        $Car_Id = $this->model('Book_Model')->GetCarIdBasedOnBookingId($Booking_Id);
        //Update the availability of the Car
        $result = $this->model('Availability_Model')->UpdataAvailabilityAfterPaid($Car_Id);
        // After Make Payment set the invoice
        $result = $this->model('Invoice_Model')->SetInvoiceAfterRide($Booking_Id);
        //Flasher::setFlash('Error: ' . $result, ' Success', 'primary');
        header('Location: '. BASEURL. '/Confirmation');
      }
      else {
        Flasher::setFlash('Error:' . $result, ' Success', 'primary');
        header('Location: '. BASEURL. '/Payment');
      }
    }
  }

}
