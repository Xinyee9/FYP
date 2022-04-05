<?php  
require_once('./php/dbconnect.php');
session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1)
{ //check login
	$userid = $_SESSION['id'];
}

function fetch_data()  
{  
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1)
    { //check login
        $userid = $_SESSION['id'];
    }

    $output = '';  
    $con= mysqli_connect("localhost","root","","aurora");  
    $sql = "SELECT * FROM real_cart, food WHERE real_cart.food_id = food.food_id and food.active = 'Yes'";
    // $sql1 = mysqli_query($con, "SELECT * FROM Buynow, Product, Stock WHERE Buynow.UserID = $userid AND Product.ProductID = Buynow.ProductID AND Stock.StockID = Buynow.StockID AND Buynow.ActiveStatus = 1");  
    $result = mysqli_query($con, $sql) or die( mysqli_error($con));
    $count = 0;
    $total = 0;

    if($sql->num_rows > 0)
    {
        while($row = $sql->fetch_assoc()) 	  
        {       
            $oriprice = $row["ori_price"];
            $subtotal = $row["subtotal"];
            $total += $subtotal;
            $output .= '<tr> 
                        <td>'.++$count.'</td>
                        <td>'.$row["food_name"].'</td>  
                        <td>'.$row["food_description"].'</td> 
                        <td style="text-align:center">'.$row["cart_qty"].'</td>   
                        <td style="text-align: right">RM '.$subtotal.'</td>
                        </tr>';  
        }  
    }
      
    return $output;
}  

function getdate()
{
    $output = '';  
    $con = mysqli_connect("localhost","root","","aurora");

    if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1)
    { //check login
        $userid = $_SESSION['id'];
    }

    $date = mysqli_query($con, "SELECT transaction_date FROM trans where userid = $userid");
    while($row = $date->fetch_assoc())
    {
        $output .= '<td>'.implode(" ",$date).'</td>';
    }
    return $output;
}

function gettransactionID()
{
    $output = '';  
    $con = mysqli_connect("localhost","root","","aurora");
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1)
    { //check login
        $userid = $_SESSION['id'];
    }
    // date_default_timezone_set('Asia/Kuala_Lumpur');
    // // $datenow = date('d-m-y h:i:s');
    // $datenow = date('Y-m-d');
    // $timenow = date('h:i:s');

    // $datesql = mysqli_query($connect, "SELECT * FROM Users, Payment, Orders WHERE Payment.PaymentDate = '$datenow' AND Payment.OrderID = Orders.OrderID AND Users.UserID = 1");
    $sql = mysqli_query($con, "SELECT * from trans");
    while($row = $sql->fetch_assoc())
    {
        $output .= '<td>'.$row["transaction_id"].'</td>';
    }
    return $output;
}

function getname()
{
    $output = '';  
    $con = mysqli_connect("localhost","root","","aurora");
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1)
    { //check login
        $userid = $_SESSION['id'];
    }

    $name = mysqli_query($con, "SELECT * FROM user WHERE userid = $userid");
    while($row = $name->fetch_assoc())
    {
        $output .= '<td>'.$row["username"].'</td>';
    }
    return $output;
}

// function getstockstatus()
// {
//     $output = '';  
//     $connect= mysqli_connect("localhost","root","","mobicity");
//     // if(isset($_POST["checkout"]))
//     // {
//         $userid = $_POST["userid"];
//     // }

//     date_default_timezone_set('Asia/Kuala_Lumpur');
//     // $datenow = date('d-m-y h:i:s');
//     $datenow = date('Y-m-d');
//     $timenow = date('h:i:s');
    
//     $datesql = mysqli_query($connect, "SELECT * FROM Users, Payment, Orders, StockStatus WHERE Payment.StockStatusID = StockStatus.StockStatusID AND Payment.PaymentTime = '$timenow' AND  Payment.PaymentDate = '$datenow' AND Payment.OrderID = Orders.OrderID AND Users.UserID = $userid GROUP BY Payment.PaymentTime, Payment.PaymentDate");
//     // $datesql = mysqli_query($connect, "SELECT * FROM Users, Payment, Orders, StockStatus WHERE Payment.StockStatusID = StockStatus.StockStatusID AND Payment.OrderID = Orders.OrderID AND Payment.OrderID = 1 AND Users.UserID = $userid");
//     while($date = $datesql->fetch_assoc())
//     {
//         $output .= '<td>'.$date["StockStatusDescription"].'</td>';
//     }
//     return $output;
// }

function gettotal()
{
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1)
    { //check login
        $userid = $_SESSION['id'];
    }
    $output = '';  
    $con= mysqli_connect("localhost","root","","aurora");

    $sql = "SELECT * FROM real_cart, food WHERE real_cart.food_id = food.food_id and food.active = 'Yes'";
    // $sql1 = mysqli_query($con, "SELECT * FROM Buynow, Product, Stock WHERE Buynow.UserID = $userid AND Product.ProductID = Buynow.ProductID AND Stock.StockID = Buynow.StockID AND Buynow.ActiveStatus = 1");  
    $result = mysqli_query($con, $sql) or die( mysqli_error($con));
    $count = 0;
    $total = 0;

    if($sql->num_rows > 0)
    {
        while($row = $sql->fetch_assoc()) 	  
        {
            $quantity = $row["cart_qty"];
            $oriprice = $row["ori_price"];
            $subtotal = $row["subtotal"];
            $total += $subtotal;
        }
    }
    // $datesql = mysqli_query($connect, "SELECT * FROM ShoppingCart, Product, Stock WHERE ShoppingCart.UserID = $userid AND Product.ProductID = ShoppingCart.ProductID AND Stock.StockID = ShoppingCart.StockID AND ShoppingCart.ActiveStatus = 1");
    // $buynowsql = mysqli_query($connect, "SELECT * FROM Buynow, Product, Stock WHERE Buynow.UserID = $userid AND Product.ProductID = Buynow.ProductID AND Stock.StockID = Buynow.StockID AND Buynow.ActiveStatus = 1");
    // $total = 0;
    // if($buynowsql->num_rows > 0)
    // {
    //     while($date = $buynowsql->fetch_assoc())
    //     {
    //         $grandtotal += ($date["ProductPrice"] * $date["ProductQuantity"]) + ($date["ProductQuantity"] * $date["StockPrice"]);
    //     }
    //     $grandtotal = $grandtotal + 5;
    //     $output .= '<td style="text-align: right">RM '.$grandtotal.'</td>';
    // }
    // else
    // {
    //     while($date = $datesql->fetch_assoc())
    //     {
    //         $grandtotal += ($date["ProductPrice"] * $date["ProductQuantity"]) + ($date["ProductQuantity"] * $date["StockPrice"]);
    //     }
    //     $grandtotal = $grandtotal + 5;
    //     $output .= '<td style="text-align: right">RM '.$grandtotal.'</td>';
    // }
   
    return $output;
}

// //  if(isset($_POST["checkout"]))  
// //  {       
    require_once('tcpdf/tcpdf.php');  
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $obj_pdf->SetCreator(PDF_CREATOR);  
    $obj_pdf->SetTitle("Invoice");  
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $obj_pdf->SetDefaultMonospacedFont('helvetica');  
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $obj_pdf->setPrintHeader(false);  
    $obj_pdf->setPrintFooter(false);  
    $obj_pdf->SetAutoPageBreak(TRUE, 10);  
    $obj_pdf->SetFont('helvetica', '', 11);  
    $obj_pdf->AddPage();  
    $content = '';  
    $content .= '

    <h4 align="center">Invoice</h4><br /> 
    <table border="0" cellspacing="0" cellpadding="3">  
    <tr>  
        <th width="60%"><b>Aurora</b></th>  
        <th width="20%"><b>Invoice</b></th>
    </tr>  
    <tr>
        <td>24, Jalan Ayer Keroh Lama 13,</td>
        <td>Payment Date : </td>';
        $content .= getdate();

    $content .= '</tr>
    <tr>
        <td>75450 Bukit Beruang, Melaka</td>
        <td>Payment ID: </td>
        ';
        $content .= gettransactionID();

    $content .= '
    </tr>
    <tr>
        <td>auroraadmin@gmail.com</td>
        <td>Customer Name: </td> 
        ';
        $content .= getname();

    $content .= '               
    </tr>
    <tr>
        <td>+010-922-0944</td>
        ';

    $content .= '
    </tr>
</table>
    
    ';
    $content .='

    <br/>
    <br/>
    <br/>

    <table border="1" cellspacing="0" cellpadding="3">  
        <tr style="text-align: center;"> 
            <th width="5%">No</th>            
            <th width="35%">Food Name</th>  
            <th width="30%">Food Description</th>  
            <th width="10%">Quantity</th>  
            <th width="20%">Price</th>  
        </tr>  
    
    ';  
    $content .= fetch_data();  
    // $content .= '
    // <tr>
    //     <td colspan="4" style="text-align: right">Shipping Fee : </td>
    //     <td style="text-align: right">RM 5</td>
    // </tr>
    // ';
    $content .= '
        <tr>
            <td colspan="4" style="text-align: right">Grand Total : </td>';
            $content .= gettotal();
    $content.='        
        </tr>
    ';
    
    $content .= '</table>';  
    $obj_pdf->writeHTML($content); 
    ob_end_clean();	  
    $obj_pdf->Output('file.pdf', 'I');

    $getuseremail = mysqli_query($con , "SELECT * FROM user WHERE userid = '$userid' ");
    $email = mysqli_fetch_array($getuseremail);
    $to = $email['useremail'];
    $from = "auroraadmin@gmail.com";
    $subject = "Payment Invoice";

    $separator = md5(time());

    $eol = PHP_EOL;

    $filename = "document.pdf";

    $attachment = chunk_split(base64_encode($obj_pdf->Output('file.pdf', 'S')));

    $headers  = "From: ".$from.$eol;
    $headers .= "MIME-Version: 1.0".$eol; 
    $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";


    $body = "--".$separator.$eol;
    $body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
    $body .= "Good day, your invoice is attached as below. Kindly wait for your delivery.
    
    
    
    
    Thank you!
    Enjoy food from Aurora Restaurant!".$eol;

    $body .= "--".$separator.$eol;
    $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
    $body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
    $body .= $message.$eol;

    $body .= "--".$separator.$eol;
    $body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
    $body .= "Content-Transfer-Encoding: base64".$eol;
    $body .= "Content-Disposition: attachment".$eol.$eol;
    $body .= $attachment.$eol;
    $body .= "--".$separator."--";

    mail($to, $subject, $body, $headers);

    // $buynowitemsql = mysqli_query($connect, "SELECT * FROM Buynow WHERE Buynow.UserID = $userid AND Buynow.ActiveStatus = 1");  
    // if($buynowitemsql->num_rows > 0){}
    // else
    // {
    //     mysqli_query($connect, "UPDATE ShoppingCart SET ActiveStatus = 0 WHERE UserID = $userid");  
    // }
 ?> 
