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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav mr-auto-navbav">
    <a class="nav-link" href="../logout.php">تسجيل الخروج</a>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image ml-2">
          <img src="../dist/img/favicon.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="text-center h5 text-light">
        جامعة الموصل
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                UI Elements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/sliders.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/modals.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/navbar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/timeline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/ribbons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ribbons</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark"><?php echo $_SESSION['username']; ?></h5>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                            <select id="College" name="College" type="text" class="form-control" >
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
                            <input id="RTitel" name="RTitel" type="text" class="form-control"  placeholder="العنوان">
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
                            <input id="ResearchNature" name="ResearchNature" type="text" class="form-control" placeholder="طبيعة اللبحث" >
                                
                        </div> 
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="ResearchBenifit">الجهة المستفيدة</label> 
                        <input id="ResearchBenifit" name="ResearchBenifit" type="text" class="form-control" placeholder="الجهة المستفيدة" >  
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
                            <input id="SNAme1" name="SNAme1" type="text" class="form-control"  placeholder="الاسم الاول">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SName2">اسم الاب</label> 
                            <input id="SName2" name="SNAme2" type="text" class="form-control"  placeholder="اسم الاب">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SName3">اسم الجد</label> 
                            <input id="SName3" name="SNAme3" type="text" class="form-control"  placeholder="اسم الجد">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SName4">اسم اب الجد</label> 
                            <input id="SName4" name="SNAme4" type="text" class="form-control"  placeholder="اسم اب الجد">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SName5">اللقب</label> 
                            <input id="SName5" name="SNAme5" type="text" class="form-control"  placeholder="اللقب">
                        </div> 
                    </div>
                </div>
                <div class="col-sm-1"></div>

                <div class="row">
                  <div class="col-sm-1"></div>
                   <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SAge">العمر</label> 
                            <input id="SAge" name="SAge" type="number" class="form-control"  placeholder="العمر">
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
                            <input id="SworkPlace" name="SworkPlace" type="text" class="form-control" placeholder="جهة الانتساب">
                                  
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SAcceptanceDate">تاريخ القبول</label> 
                            <input id="SAcceptanceDate" name="SAcceptanceDate" type="date" class="form-control" placeholder="تاريخ القبول">
                                  
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
                            <input id="SGSpitialty" name="SGSpitialty" type="text" class="form-control" placeholder="الاختصاص العام">
                                  
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="SSubSpitialty">الاختصاص الدقيق</label> 
                            <input id="SSubSpitialty" name="SSubSpitialty" type="text" class="form-control" placeholder="الاختصاص الدقيق">
                                  
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
                            <input id="VNAme1" name="VNAme1" type="text" class="form-control"  placeholder="الاسم الاول">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VName2">اسم الاب</label> 
                            <input id="VName2" name="VNAme2" type="text" class="form-control"  placeholder="اسم الاب">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VName3">اسم الجد</label> 
                            <input id="VName3" name="VNAme3" type="text" class="form-control"  placeholder="اسم الجد">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VName4">اسم اب الجد</label> 
                            <input id="VName4" name="VNAme4" type="text" class="form-control"  placeholder="اسم اب الجد">
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VName5">اللقب</label> 
                            <input id="VName5" name="VNAme5" type="text" class="form-control"  placeholder="اللقب">
                        </div> 
                    </div>
                </div>
                <div class="col-sm-1"></div>

                <div class="row">
                  <div class="col-sm-1"></div>
                   <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VAge">العمر</label> 
                            <input id="VAge" name="VAge" type="number" class="form-control"  placeholder="العمر">
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
                            <input id="VworkPlace" name="VworkPlace" type="text" class="form-control" placeholder="جهة الانتساب">
                                  
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VCertSourc">الجهة المانحة للشهادة </label> 
                            <input id="VCertSourc" name="VCertSourc" type="text" class="form-control" placeholder="الجهة المانحة للشهادة">
                                  
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VcertDate">تاريخ الشهادة</label> 
                            <input id="VcertDate" name="VcertDate" type="date" class="form-control" placeholder="تاريخ القبول">
                                  
                        </div> 
                    </div>
                    
                    
                  <div class="col-sm-1"></div>                  
                </div>
                <div class="row">
                 <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="VPromotionDate">تاريخ اخر ترقية</label> 
                            <input id="VPromotionDate" name="VPromotionDate" type="date" class="form-control" placeholder="تاريخ القبول">
                                  
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
                            <textarea id="abstract" cols="30" rows="10" name="abstract" type="date" class="form-control" placeholder="تاريخ القبول">
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
               </form>
            </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
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
