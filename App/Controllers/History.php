<?php
class History extends Controller{
  private $_pdf;
  public function index(){
    //Send the data from the url
    $data['title'] = 'Yorkshire';
    //Send the data by using model
    if (isset($_SESSION['id'])) {
      // Get The Details of Previous Booking
      $data['GetPreviousBookingDetails'] = $this->model('History_Model')->GetPreviousBookingDetails();
      $this->view('Templates/Header',$data);
      $this->view('Templates/SideNav');
      $this->view('HistoryViews/History_index',$data);
      $this->view('Templates/Footer');
    }
    else{
      Flasher::setFlash('Error: Please Log In To View History Page', ' Success', 'primary');
      header('Location: '. BASEURL .'/Home');
    }
  }

  public function print(){
    $data['title'] = 'Yorkshire';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $this->library('fpdf');
      $con=mysqli_connect('localhost','root','');
      mysqli_select_db($con,'sdp');

      $query=mysqli_query($con,"select * from invoice
      	inner join book ON book.Book_Id = invoice.Book_Id
      	inner join users ON users.User_Id = book.User_Id
      	where
      	Invoice_Id = '".$_POST['invoiceID']."'");
      $invoice=mysqli_fetch_array($query);


      //A4 width : 219mm
      //default margin : 10mm each side
      //writable horizontal : 219-(10*2)=189mm

      $pdf = new FPDF('P','mm','A4');

      $pdf->AddPage();

      //set font to arial, bold, 14pt
      $pdf->SetFont('Arial','B',14);

      //Cell(width , height , text , border , end line , [align] )

      $pdf->Cell(130	,5,'Yorkshire Car Co',0,0);
      $pdf->Cell(59	,5,'INVOICE',0,1);//end of line

      //set font to arial, regular, 12pt
      $pdf->SetFont('Arial','',12);

      $pdf->Cell(130	,5,'Jalan Sultan Azlan Shah,',0,0);
      $pdf->Cell(59	,5,'',0,1);//end of line

      $pdf->Cell(130	,5,'Kawasan Perindustrian Bayan Lepas,',0,0);
      $pdf->Cell(59	,5,'',0,1);//end of line

      $pdf->Cell(130	,5,'Bayan Lepas, Pulau Pinang, 11900',0,0);
      $pdf->Cell(25	,5,'Date',0,0);
      $TodayDate = date(" d/ m / Y");
      $pdf->Cell(34	,5,$TodayDate,0,1);//end of line

      $pdf->Cell(130	,5,'Phone +60195899093',0,0);
      $pdf->Cell(25	,5,'Invoice #',0,0);
      $pdf->Cell(34	,5,$invoice['Invoice_Id'],0,1);//end of line

      $pdf->Cell(130	,5,'Fax +600362017000',0,0);
      $pdf->Cell(25	,5,'Customer ID',0,0);
      $pdf->Cell(34	,5,$invoice['User_Id'],0,1);//end of line

      //make a dummy empty cell as a vertical spacer
      $pdf->Cell(189	,10,'',0,1);//end of line

      //billing address
      $pdf->Cell(100	,5,'Bill to',0,1);//end of line

      //add dummy cell at beginning of each line for indentation
      $pdf->Cell(10	,5,'',0,0);
      $pdf->Cell(90	,5,$invoice['User_Name'],0,1);

      $pdf->Cell(10	,5,'',0,0);
      $pdf->Cell(90	,5,$invoice['User_Email'],0,1);

      //$pdf->Cell(10	,5,'',0,0);
      //$pdf->Cell(90	,5,$invoice['address'],0,1);

      //$pdf->Cell(10	,5,'',0,0);
      //$pdf->Cell(90	,5,$invoice['phone'],0,1);

      //make a dummy empty cell as a vertical spacer
      $pdf->Cell(189	,10,'',0,1);//end of line

      //invoice contents
      $pdf->SetFont('Arial','B',12);

      $pdf->Cell(130	,5,'Description',1,0);
      $pdf->Cell(25	,5,'Taxable',1,0);
      $pdf->Cell(34	,5,'Amount',1,1);//end of line

      $pdf->SetFont('Arial','',12);

      //Numbers are right-aligned so we give 'R' after new line parameter

      //items
      $query=mysqli_query($con,"select * from invoice
      	INNER JOIN book ON book.Book_Id = invoice.Book_Id
      	INNER JOIN users ON users.User_Id = book.User_Id
        INNER JOIN book_car ON book_car.Book_Id = book.Book_Id
      	where
      	Invoice_Id = '".$_POST['invoiceID']."'");
      $tax=0;
      $amount=0;
      while($item=mysqli_fetch_array($query)){
      	$pdf->Cell(130	,5,"Rental Car Charges",1,0);
      	$pdf->Cell(25	,5,"-",1,0);
      	$pdf->Cell(34	,5,number_format($item['Initial_Price']),1,1,'R');//end of line
        $pdf->Cell(130	,5,"Car Taxation",1,0);
        $pdf->Cell(25	,5,"-",1,0);
        $pdf->Cell(34	,5,$item['Tax'],1,1,'R');//end of line
        $pdf->Cell(130	,5,"Car Deposit",1,0);
        $pdf->Cell(25	,5,"-",1,0);
        $pdf->Cell(34	,5,$item['Car_Deposit'],1,1,'R');//end of line
      	$tax = $item['Tax'];
      	$amount = $item['Total_Price'];
      }

      //summary
      $pdf->Cell(130	,5,'',0,0);
      $pdf->Cell(25	,5,'Subtotal',0,0);
      $pdf->Cell(4	,5,'$',1,0);
      $pdf->Cell(30	,5,$amount,1,1,'R');//end of line

      $pdf->Cell(130	,5,'',0,0);
      $pdf->Cell(25	,5,'Taxable',0,0);
      $pdf->Cell(4	,5,'$',1,0);
      $pdf->Cell(30	,5,$tax,1,1,'R');//end of line

      $pdf->Cell(130	,5,'',0,0);
      $pdf->Cell(25	,5,'Tax Rate',0,0);
      $pdf->Cell(4	,5,'$',1,0);
      $pdf->Cell(30	,5,'10%',1,1,'R');//end of line

      $pdf->Cell(130	,5,'',0,0);
      $pdf->Cell(25	,5,'Total Due',0,0);
      $pdf->Cell(4	,5,'$',1,0);
      $pdf->Cell(30	,5,$amount,1,1,'R');//end of line


      $pdf->Output();
      //$this->view('Templates/Header',$data);
      //$this->view('Templates/SideNav');
      //$this->view('HistoryViews/invoice-db',$_pdf);
      //$this->view('Templates/Footer');
    }
    else{
      Flasher::setFlash('Error: Invalid Post', ' Success', 'primary');
      header('Location: '. BASEURL .'/History');
    }
  }
}
