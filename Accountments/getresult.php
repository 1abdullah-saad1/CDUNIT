<?php
/*
Author : Sunil Bhatt
*/
require_once("dbclass.php");
require_once("pagination.class.php");
$dbConnection  = new Connection();
$perPage       = new sbpagination();

$sqlquery       = "SELECT * from accountments ORDER BY `id` DESC  ";

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
<th class="text-center" >رقم الوصل</th>
<th class="text-center" >الأسم الكامل</th>
<th class="text-center" >تاريخ الوصل</th>
<th class="text-center" >المبلغ</th>
<th class="text-center" style="width:5%;" >العمليات</th>
</tr>
</thead>';
    $output .= '<tbody>';
    if(isset($getData))
    {
        foreach ($getData as $data)
        {
            $output .= "<tr>
            <td class='text-center' >".$data["id"]."</td>
            <td class='text-center' >".$data["student_name"]."</td>
            <td class='text-center' >".$data["list_date"]."</td>
            <td class='text-center' >".$data["list_cost"]."</td>
            <td>
            <button type='submit' class='btn btn-info btn-block'>حذف</button>
            </td>
            <tr>";
        }
    }
    $output .= '</tbody>';
$output .= '</table>';
if(!empty($showpagination))
{
	$output .= '<ul class="pagination">'.$showpagination.'</ul>';
}
echo $output;
die();
?>
