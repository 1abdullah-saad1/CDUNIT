<?php
// Initialize the session
require_once "../config.php";

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if($_SESSION["userrole"]!=1)
{
    header("location: ../");
    exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $qury="select `CollageCode` from `college` where `college_id`=".$_POST["College"].";";
  if($stmt = mysqli_prepare($link, $qury))
  {
    if(mysqli_stmt_execute($stmt))
    {
      mysqli_stmt_bind_result($stmt,$collegeCode);
    }
    mysqli_stmt_close($stmt);

    $qury="SELECT ifnull(max(`id`),'".($collegeCode."0000000")."')as ID FROM `users` where `id`<'".($collegeCode."9999999")."' And `id`>'".($collegeCode."0000000")."';";
    if($stmt = mysqli_prepare($link, $qury))
      {
        if(mysqli_stmt_execute($stmt))
        { 
           mysqli_stmt_bind_result($stmt,$ID);
        } 
      }
      $ID=((int)$ID)+1;
      $_FILEURL="hibone";
      mysqli_stmt_close($stmt);
      $sql = "INSERT INTO `studentforma`(`id`,    `user_id`,`collegeId`,`DeptId`,                 `RTitel`, `RRegisterDate`, `ResearchNature`, `ResearchBenifit`, `SName1`, `SName2`, `SName3`, `SName4`, `SName5`, `SAge`, `Sgender`, `SworkPlace`, `SAcceptanceDate`, `SUniDate`, `SCert`, `SGSpitialty`, `SSubSpitialty`, `VName1`, `VName2`, `VName3`, `VName4`, `VName5`, `VAge`, `Vgender`, `VworkPlace`, `VCertSourc`, `VcertDate`, `VPromotionDate`, `abstract`, `Researchurl`, `status`) 
                VALUES ('".$ID."','"
                .$_SESSION["id"]."','"
                .$_POST["College"]."','"
                .$_POST["Department"]."','"
                .$_POST["RTitel"]."','"
                .$_POST["RRegisterDate"]."','"
                .$_POST["ResearchNature"]."','"
                .$_POST["ResearchBenifit"]."','"
                .$_POST["SName1"]."','"
                .$_POST["SNAme2"]."','"
                .$_POST["SName3"]."','"
                .$_POST["SName4"]."','"
                .$_POST["SName5"]."','"
                .$_POST["SAge"]."','"
                .$_POST["Sgender"]."','"
                .$_POST["SworkPlace"]."','"
                .$_POST["SAcceptanceDate"]."','"
                .$_POST["SUniDate"]."','"
                .$_POST["SCert"]."','"
                .$_POST["SGSpitialty"]."','"
                .$_POST["SSubSpitialty"]."','"
                .$_POST["VName1"]."','"
                .$_POST["VName2"]."','"
                .$_POST["VName3"]."','"
                .$_POST["VName4"]."','"
                .$_POST["VName5"]."','"
                .$_POST["VAge"]."','"
                .$_POST["Vgender"]."','"
                .$_POST["VworkPlace"]."','"
                .$_POST["VCertSourc"]."','"
                .$_POST["VcertDate"]."','"
                .$_POST["VcertDate"]."','"
                .$_POST["VCertSourc"]."','"
                .$_POST["VPromotionDate"]."','"
                .$_POST["abstract"]."','"
                .$_FILEURL."')";
      if($stmt = mysqli_prepare($link, $sql)){
      if(mysqli_stmt_execute($stmt)){
        // Redirect to login page
        echo"ok";

    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }}

  }
  mysqli_close($link);

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
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light  bg-dark mx-0">
    <ul class="navbar-nav">
     
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link  text-light">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link  text-light">Contact</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link  text-light"><?php echo $_SESSION['username']; ?></a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto-navbav">
    <a class="nav-link  text-light" href="../logout.php">تسجيل الخروج</a>
    </ul>
  </nav>

  <div class="content-wrapper mx-0">
    <section class="content m-0 p-0">
      <div class="container-fluid bg-light px-4 pt-4 pb-2">
        <div class="card">
            <div class="card-body">
            <form name="studentform" onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h5 class="m-0 text-dark">معلومات البحث</h5> 
            <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="University">الجامعة</label> 
                            <input id="University" name="University" type="text" class="form-control" disabled value="جامعة الموصل">
                        </div> 
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="College">الكلية</label> 
                            <select id="College" name="College" type="text" class="form-control" min="1" >
                                <option value="0" hidden> اختر </option>
                                <?php
                                      $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                                      $query = 'SELECT * FROM `college`;';
                                       if($result = mysqli_query($link, $query))
                                          {
                                              while($row = mysqli_fetch_array($result))
                                              {
                                                  echo "<option value=\"".$row['college_id']."\" >".$row['college_name']."</option>";
                                              }
                                              mysqli_free_result($result);
                                              mysqli_close($link);                                            
                                          }
                                      ?>
                            </select>
                        </div> 
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="Department">القسم</label> 
                            <select id="Department" name="Department" type="text" class="form-control" >
                                <option value="0" hidden> اختر </option>
                                
                            </select>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="RTitel">عنوان الاطروحة /الرسالة /البحث</label> 
                            <input id="RTitel" name="RTitel" type="text" class="form-control"  placeholder ="العنوان">
                        </div> 
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="RRegisterDate">تاريخ التسجيل</label> 
                            <input id="RRegisterDate" name="RRegisterDate" type="date" class="form-control" >
                        </div> 
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="ResearchNature">طبيعة البحث</label> 
                            <input id="ResearchNature" name="ResearchNature" type="text" class="form-control" placeholder ="طبيعة اللبحث" >
                                
                        </div> 
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="ResearchBenifit">الجهة المستفيدة</label> 
                        <input id="ResearchBenifit" name="ResearchBenifit" type="text" class="form-control" placeholder ="الجهة المستفيدة" >  
                      </div> 
                    </div>
                </div>
            <br>
            <br>
            <h5 class="m-0 text-dark">معلومات الطالب</h5> 
              <hr>
                <div class="row">
                <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SName1">الاسم الاول</label> 
                            <input id="SName1" name="SName1" type="text" class="form-control"  placeholder ="الاسم الاول">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SName2">اسم الاب</label> 
                            <input id="SName2" name="SNAme2" type="text" class="form-control"  placeholder ="اسم الاب">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SName3">اسم الجد</label> 
                            <input id="SName3" name="SName3" type="text" class="form-control"  placeholder ="اسم الجد">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SName4">اسم اب الجد</label> 
                            <input id="SName4" name="SName4" type="text" class="form-control"  placeholder ="اسم اب الجد">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SName5">اللقب</label> 
                            <input id="SName5" name="SName5" type="text" class="form-control"  placeholder ="اللقب">
                        </div> 
                    </div>
                </div>
                <div class="col-sm-1"></div>

                <div class="row">
                  <div class="col-sm-1"></div>
                   <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SAge">العمر</label> 
                            <input id="SAge" name="SAge" type="number" class="form-control"  placeholder ="العمر">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="Sgender">الجنس</label> 
                            <select id="Sgender" name="Sgender" type="number" class="form-control">
                                  <option value="0" hidden>اختر</option>
                                  <option value="1">ذكر</option>
                                  <option value="2">انثى</option>
                            </select>
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SworkPlace">جهة الانتساب</label> 
                            <input id="SworkPlace" name="SworkPlace" type="text" class="form-control" placeholder ="جهة الانتساب">
                                  
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SAcceptanceDate">تاريخ القبول</label> 
                            <input id="SAcceptanceDate" name="SAcceptanceDate" type="date" class="form-control" placeholder ="تاريخ القبول">
                                  
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SAcceptanceChanel">قناة القبول</label> 
                            <select id="SAcceptanceChanel" name="SAcceptanceDate"  class="form-control">
                                <option value="0" hidden>اختر</option>
                            </select>  
                        </div> 
                    </div>
                  <div class="col-sm-1"></div>                  
                </div>
                <div class="row">
                 <div class="col-sm-1"></div>
         
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SUniDate">تاريخ الامر الجامعي</label> 
                            <input id="SUniDate" name="SUniDate" type="date" class="form-control"  >
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SCert">الشهادة</label> 
                            <select id="SCert" name="SCert" type="number" class="form-control">
                                  <option value="0" hidden>اختر</option>
                                  <option value="1">ماجستير</option>
                                  <option value="2">دكتوراة</option>
                            </select>
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SGSpitialty">الاختصاص العام</label> 
                            <input id="SGSpitialty" name="SGSpitialty" type="text" class="form-control" placeholder ="الاختصاص العام">
                                  
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SSubSpitialty">الاختصاص الدقيق</label> 
                            <input id="SSubSpitialty" name="SSubSpitialty" type="text" class="form-control" placeholder ="الاختصاص الدقيق">
                                  
                        </div> 
                    </div>
                    
                    <div class="col-sm-1"></div>

                  
                </div>
            <br>
            <br>
            <h5 class="m-0 text-dark">معلومات المشرف</h5> 
            <hr>
            <div class="row">
                <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VName1">الاسم الاول</label> 
                            <input id="VName1" name="VName1" type="text" class="form-control"  placeholder ="الاسم الاول">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VName2">اسم الاب</label> 
                            <input id="VName2" name="VName2" type="text" class="form-control"  placeholder ="اسم الاب">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VName3">اسم الجد</label> 
                            <input id="VName3" name="VName3" type="text" class="form-control"  placeholder ="اسم الجد">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VName4">اسم اب الجد</label> 
                            <input id="VName4" name="VName4" type="text" class="form-control"  placeholder ="اسم اب الجد">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VName5">اللقب</label> 
                            <input id="VName5" name="VName5" type="text" class="form-control"  placeholder ="اللقب">
                        </div> 
                    </div>
                </div>
                <div class="col-sm-1"></div>

                <div class="row">
                  <div class="col-sm-1"></div>
                   <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VAge">العمر</label> 
                            <input id="VAge" name="VAge" type="number" class="form-control"  placeholder ="العمر">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="Vgender">الجنس</label> 
                            <select id="Vgender" name="Vgender" type="number" class="form-control">
                                  <option value="0" hidden>اختر</option>
                                  <option value="1">ذكر</option>
                                  <option value="2">انثى</option>
                            </select>
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VworkPlace">جهة الانتساب</label> 
                            <input id="VworkPlace" name="VworkPlace" type="text" class="form-control" placeholder ="جهة الانتساب">
                                  
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VCertSourc">الجهة المانحة للشهادة </label> 
                            <input id="VCertSourc" name="VCertSourc" type="text" class="form-control" placeholder ="الجهة المانحة للشهادة">
                                  
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VcertDate">تاريخ الشهادة</label> 
                            <input id="VcertDate" name="VcertDate" type="date" class="form-control" placeholder ="تاريخ القبول">
                                  
                        </div> 
                    </div>
                    
                    
                  <div class="col-sm-1"></div>                  
                </div>
                <div class="row">
                 <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VPromotionDate">تاريخ اخر ترقية</label> 
                            <input id="VPromotionDate" name="VPromotionDate" type="date" class="form-control" placeholder ="تاريخ القبول">
                                  
                        </div> 
                    </div>
                                      
                    <div class="col-sm-1"></div>

                  
                </div>
                <br>
            <br>
            <h5 class="m-0 text-dark">الملخص</h5> 
            <hr>
            <div class="row">
                 <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <textarea id="abstract" cols="30" rows="10" name="abstract" type="date" class="form-control" placeholder ="تاريخ القبول">
                            </textarea> 
                        </div> 
                    </div>
                                      
                    <div class="col-sm-1"></div>

                  
                </div>
                <br><br>
                <h5 class="m-0 text-dark">نسخة من الاطروحة</h5> 
            <hr>
            <div class="row">
                 <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <div class="form-group">
                          <input type="file" name="Research" id="Research">
                        </div> 
                    </div>
                                      
                    <div class="col-sm-1"></div>

                  
                </div>
                <button type="submit" onsubmit="return validateForm()" class="btn btn-primary">ارسال المعلومات</button>
               </form>
            </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer mx-0">
  <b>Version</b> 1.0
    <div class="float-right d-none d-sm-inline-block">
    <strong>Copyright &copy; 2020-2021 <a href="https://uomosul.edu.iq">University of Mosul</a></strong>
    All rights reserved
    </div>
  </footer>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
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
<script>
  function validateForm() {
     let flag=false;
     let x = document.forms["studentform"]["SName1"];
     if(x="")
     {
      x.classList.add('is-invalid');
     }
    console.log(x);
     
  return true;
}

</script>
</body>
</html>
