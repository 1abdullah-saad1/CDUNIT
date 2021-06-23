<?php
/*
Author : Sunil Bhatt
*/
require_once("dbclass.php");
require_once("pagination.class.php");
$dbConnection  = new Connection();
$perPage       = new sbpagination();

$sqlquery       = "SELECT * from studentforma ";

$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query   =  $sqlquery . " limit " . $start . "," . $perPage->perpage; 
$getData = $dbConnection->runQuery($query);

$rowcount      = $dbConnection->numRows($sqlquery);
$showpagination = $perPage->getAllPageLinks($rowcount);	

$output = '';
$output .= ' <table class="table table-bordered">
<thead>                  
<tr class="bg-dark">
<th class="text-center" >الكلية</th>
<th class="text-center" >اسم الطالب</th>
<th class="text-center" >المشرف</th>
<th class="text-center" >عنوان الاطروحة</th>
<th class="text-center" style="width:5%;" >العمليات</th>
</tr>
</thead>';
    $output .= '<tbody>';
    if(isset($getData)){
        foreach ($getData as $data)
        {
            $output .= "<tr><td>".$data['collegeId']."</td>
            <td>".$data['SName1']." ".$data['SName2']." ".$data['SName3']." ".$data['SName4']." ".$data['SName5']."</td>
            <td>".$data['VName1']." ".$data['VName2']." ".$data['VName3']." ".$data['VName4']." ".$data['VName5']."</td>
            <td>".$data['RTitel']."</td>
            <td>
            <a class='btn btn-info' href=".$data['Researchurl']." >تنزيل ملف الاطروحة</a>
            </td>
            <tr>
            ";
        }
            if (isset($_GET['file'])) {
            $file = $_GET['file'];
            if (file_exists($file) && is_readable($file) && preg_match('/\.pdf$/',$file)) {
            header('Content-Type: application/pdf');
            header("Content-Disposition: attachment; filename=\"$file\"");
            readfile($file);
             }
         }
        }
        ?>
    $output .= '</tbody>';
$output .= '</table>';
if(!empty($showpagination))
{
	$output .= '<ul class="pagination">'.$showpagination.'</ul>';
}
echo $output;
die();
?>
