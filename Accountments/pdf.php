<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if ($_SESSION["userrole"] != 3) {
  header("location: ../");
  exit;
}
 require_once('library/tcpdf.php');  
 
 $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
 $pdf->SetCreator(PDF_CREATOR);  
 $pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
 $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
 $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
 $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
 $pdf->SetDefaultMonospacedFont('helvetica');  
 $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
 $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
 $pdf->setPrintHeader(false);  
 $pdf->setPrintFooter(false);  
 $pdf->SetAutoPageBreak(TRUE, 10);  
 //$pdf->SetFont('freeserif','',14); 
 $pdf->SetFont('almohanad','',14); 
 /////////////////////////////////////////تحويل لى اتجاه اللغة العربية//////////////////////////////////////
 $lg = Array();
 $lg['a_meta_charset'] = 'UTF-8';
 $lg['a_meta_dir'] = 'rtl';
 $lg['a_meta_language'] = 'fa';
 $lg['w_page'] = 'page';
 $pdf->setLanguageArray($lg);
/////////////////////////////ضافة صفحة /////////////////////////////////////////////////// 
 $pdf->AddPage(); 
//$pdf->Ln();
///////////////////////////////////ADD IMAGE LOGO TO PDF///////////////////////////////////
$pdf->setImageScale ( 8.5 );
$pdf->setJPEGQuality ( 90 );
$pdf->Image ("logo/logo.jpg",122,14,0,0);
////////////////////////////////////////////////////
$pdf->SetFont('xnazanin','',14);
////////////////////////////////////////////////////
$text="حسابات مركز الحاسبة";
$pdf->SetTextColor(0,75,150);
$pdf->MultiCell(150, 4, $text, 0, 'C', 0, 0,30,42,0);
////////////////////////////////////////////////////////////
$pdf->SetFont('almohanad','',12);
///////////////////////////////////////////////////
$tbl = <<<EOD
<br><br><br><br><br>
<h5><span>رابط النظام</span> http://127.0.0.1/cdunit/</h5>
<table border="0.9" cellpadding="1.5" cellspacing="2" align="center" >
 <tr style="background-color:#ffff99;" nobr="true">
  <td>اسم المستخدم</td>
  <td>كلمة المرور</td>
  <td>رقم الوصل</td>
  <td>تاريخ الوصل</td>
 </tr>
 <tr nobr="true">
  <td>{$_GET["username"]}</td>
  <td>{$_GET["username"]}</td>
  <td>{$_GET["id"]}</td>
  <td>{$_GET["date"]}</td>
  
 </tr>
</table>

EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->Output( '1.pdf', 'D');
?>