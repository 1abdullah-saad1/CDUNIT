<?php
require_once "../config.php";
// Initialize the session
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

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $sql = "INSERT INTO accountments (student_name, list_date, list_cost)
    VALUES ('".$_POST["student_name"]."','"
              .$_POST["list_date"]."','"
              .$_POST["list_cost"]."')";
    if ($link->query($sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>جامعة الموصل</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../dist/css/custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css">
    #overlay {background-color: rgba(0, 0, 0, 0.6);z-index: 999;position: absolute;left: 0;top: 0;width: 100%;height: 100%;display: none;}
    #overlay div {position:absolute;left:50%;top:50%;margin-top:-32px;margin-left:-32px;}
    .nav-link{font-size: 16px;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on("click", ".page", function(){
                $.ajax({
                        url: "getresult.php",
                        type: "GET",
                        data:  {page:$(this).attr("data-page")},
                        beforeSend: function(){$("#overlay").show();},
                        success: function(data)
                        {
                            $("#pagination-result").html(data);
                            setInterval(function() {$("#overlay").hide(); },500);
                        },
                        error: function() 
                        {}          
                   });
            });
        });
    </script>
</head>
<body >
<div class="wrapper">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark mb-0 " style="border-radius:0px;" >
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link text-white">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link text-white">Contact</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link text-white">
      <?php echo $_SESSION['username']; ?>
      </a></li>
    </ul>
    <ul class="navbar-nav mr-auto-navbav">
    <a class="nav-link text-white" href="../logout.php">تسجيل الخروج</a>
    </ul>
  </nav>
  <div class="content-wrapper mx-0">
    <section class="content m-0 p-0">
      <div class="container-fluid bg-light px-4 pt-4 pb-2">
      <form name="accountments"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="card">
            <div class="card-body px-0">
            <div class="col-sm-3"></div>
           <div class="col-sm-6">
           <div class="card bg-dark p-4">
           
           <div class="row">
          
           <div class="col-sm-6"><div class="form-group">
                    <label for="exampleInputEmail1"> الأسم الكامل :</label>
                    <input type="text" class="form-control" name="student_name" id="student_name"  placeholder="الأسم الكامل">
                  </div></div>
           <div class="col-sm-3"><div class="form-group">
                    <label for="exampleInputEmail1">تاريخ الوصل : </label>
                    <input type="date" class="form-control" name="list_date" id="list_date" value="<?php echo date('Y-m-d');?>"  placeholder="تاريخ الوصل">
                  </div></div>
           <div class="col-sm-3">
           <div class="form-group">
                    <label for="exampleInputEmail1">المبلغ : </label>
                    <input type="number" class="form-control" name="list_cost" id="list_cost" value="3000" placeholder="المبلغ">
                  </div>
                  </div>
          </div>
          <div class="col-sm-3"></div>

          <div class="card-footer">
          <div class="row">
          <div class="col-sm-4"></div>
          <div class="col-sm-4"><button type="submit" class="btn btn-secondary btn-block">أضـــافة الوصـــل</button></div>
          <div class="col-sm-4"></div>
          </div>
          </div>
           </div>
           </div>
            </div>
        </div>
        </form>
      </div>
      <div class="container-fluid">
      <div class="card  my-4">
      <br>
        <div class="card mx-4">
              <div class="card-header" >
                <div class=" row align-items-start mr-2">
               <div  class="card-title"><h4>جدول الوصولات</h4></div> 
                </div>
              </div>
              <!-- /.card-header -->
              <?php
    require_once("dbclass.php");
    require_once("pagination.class.php");
    $dbConnection  = new Connection();
    $perPage       = new sbpagination();
    $sqlquery      = "SELECT * from accountments ";
    $query         = $sqlquery."limit 0," . $perPage->perpage; 
    $getData       = $dbConnection->runQuery($query);
    $rowcount      = $dbConnection->numRows($sqlquery);
    $showpagination = $perPage->getAllPageLinks($rowcount);
    ?>
 <div class="card-body mx-4">
            <div id="pagination-result">
            <table class="table table-bordered">
                  <thead>                  
                    <tr class='bg-dark'>
                      <th class='text-center' style="width:10%;" >رقم الوصل</th>
                      <th class='text-center' >الأسم الكامل</th>
                      <th class='text-center' >تاريخ الوصل</th>
                      <th class='text-center' >المبلغ</th>
                      <th class='text-center' style="width:5%;" >العمليات</th>
                    </tr>
                  </thead>
                    <tbody>
                        <?php
                        foreach ($getData as $data)
                        {
                            echo "<tr>
                            <td class='text-center' >".$data["id"]."</td>
                            <td class='text-center' >".$data["student_name"]."</td>
                            <td class='text-center' >".$data["list_date"]."</td>
                            <td class='text-center' >".$data["list_cost"]."</td>
                            <td>
                            <button type='submit' class='btn btn-info btn-block'>حذف</button>
                            </td>
                            <tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                if(!empty($showpagination))
                {
                    ?>
                    <ul class="pagination">
                        <?php echo $showpagination; ?>
                    </ul>
                    <?php
                }
                ?>
            </div>
        </div>
        </div>
        <br>
        </div>
        </div>
    </section>
  </div>
  



  <footer class="main-footer mx-0 px-4">
  <b>Version</b> 1.0
    <div class="float-right d-none d-sm-inline-block">
    <strong>Copyright &copy; 2020-2021 <a href="https://uomosul.edu.iq">University of Mosul</a></strong>
    All rights reserved
    </div>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../plugins/sparklines/sparkline.js"></script>
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>
