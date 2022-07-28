<!DOCTYPE html>

<html dir="ltr" lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://www.wrappixel.com/templates/niceadmin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
    <link href="<?php echo base_url("assets/css/style.min.css"); ?>" rel="stylesheet">
<head>
  
    <title>CLIO</title>
    <nav  class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
        
        <div class="container d-flex justify-content-end">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-12">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"> Log out </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                Are you sure you want to log out?
                                </div>
                                <div class="modal-footer">
                                <a class="btn btn-primary btn-sm" href="<?php echo site_url('Login/logout');?>" role="button">Yes</a>
                                    
                                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">No</button>
                                </div>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
    </nav>

</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full"
        data-boxed-layout="full">
          
         
                
        <div class="row">
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>index.php/Admin"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard" viewBox="0 0 16 16">
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                </svg>
                                <span class="hide-menu">  &nbsp; Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>index.php/Master_list"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                                </svg>
                                <span class="hide-menu"> &nbsp; Master List</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>index.php/Ojt"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                                <span class="hide-menu"> &nbsp; Student's OJT Info</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>index.php/Calendar"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
                                <span class="hide-menu">&nbsp; Calendar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>index.php/Announcement"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-megaphone" viewBox="0 0 16 16">
                                <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-.214c-2.162-1.241-4.49-1.843-6.912-2.083l.405 2.712A1 1 0 0 1 5.51 15.1h-.548a1 1 0 0 1-.916-.599l-1.85-3.49a68.14 68.14 0 0 0-.202-.003A2.014 2.014 0 0 1 0 9V7a2.02 2.02 0 0 1 1.992-2.013 74.663 74.663 0 0 0 2.483-.075c3.043-.154 6.148-.849 8.525-2.199V2.5zm1 0v11a.5.5 0 0 0 1 0v-11a.5.5 0 0 0-1 0zm-1 1.35c-2.344 1.205-5.209 1.842-8 2.033v4.233c.18.01.359.022.537.036 2.568.189 5.093.744 7.463 1.993V3.85zm-9 6.215v-4.13a95.09 95.09 0 0 1-1.992.052A1.02 1.02 0 0 0 1 7v2c0 .55.448 1.002 1.006 1.009A60.49 60.49 0 0 1 4 10.065zm-.657.975 1.609 3.037.01.024h.548l-.002-.014-.443-2.966a68.019 68.019 0 0 0-1.722-.082z"/>
                                </svg>
                                <span class="hide-menu">&nbsp; Announcement</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>index.php/Grading"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16">
                                <path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/>
                                <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                                </svg>
                                <span class="hide-menu">&nbsp; Grading System</span>
                            </a>
                        </li>
                        <?php if (  $this->session->userdata('level') === '2' ) : ?>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>index.php/Docs"
                                aria-expanded="false">
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
  <path d="M4.603 14.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.697 19.697 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.712 5.712 0 0 1-.911-.95 11.651 11.651 0 0 0-1.997.406 11.307 11.307 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.266.266 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.71 12.71 0 0 1 1.01-.193 11.744 11.744 0 0 1-.51-.858 20.801 20.801 0 0 1-.5 1.05zm2.446.45c.15.163.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.876 3.876 0 0 0-.612-.053zM8.078 7.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"/>
</svg>
                                <span class="hide-menu">&nbsp; PDF Docs</span>
                            </a>
                        </li>
<?php else : ?>
                                 
                        <?php endif; ?>
                        
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>index.php/Inbox"
                                aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-inbox" viewBox="0 0 16 16">
                                <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4H4.98zm9.954 5H10.45a2.5 2.5 0 0 1-4.9 0H1.066l.32 2.562a.5.5 0 0 0 .497.438h12.234a.5.5 0 0 0 .496-.438L14.933 9zM3.809 3.563A1.5 1.5 0 0 1 4.981 3h6.038a1.5 1.5 0 0 1 1.172.563l3.7 4.625a.5.5 0 0 1 .105.374l-.39 3.124A1.5 1.5 0 0 1 14.117 13H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .106-.374l3.7-4.625z"/>
                                </svg>
                                <span class="hide-menu">&nbsp;Inbox</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        </div>
        
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        
           
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    
    <div class="container">
     <div class="row">
     <div class="row">
        <div class="col-2"> </div>
        <div class="col-6">
        <h1> Student's OJT Info</h1>
            

        </div>
        <div class="col-2"> </div>
         <div class="col-2">
               
            <label for="exampleInputEmail1">Week Number:</label>
                    <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $weekNumber->weekNumber;?>
                    </button>
                    <ul class="dropdown-menu">
                    
                    <?php foreach($weekNumber2 as $row2) {?>
                        <li><a class="dropdown-item" href="<?php echo site_url('Ojt/timeRecordWeekPick');?>/<?php echo $row2->studentNumber;?>/<?php echo $row->sectionID;?>/<?php echo $row2->weekNumber;?>"><?php echo $row2->weekNumber;?></a></li>
                        <?php } ?>
                    
                    </ul>
                    </div>
            </div>
        
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-5">
                <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">OJT Adviser: </span>
                <input type="text" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $row->firstName;?> <?php echo $row->lastName;?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-5">
                <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Contact  No.: </span>
                <input type="text"  readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $row->contactNumber;?> ">
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-5">
                <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">E-mail: </span>
                <input type="text" readonly class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $row->email;?> ">
                </div>
            </div>
        </div>
        
        <div class="row">
        <div class="col-2">
            </div>
            <div class="col-10">
                
                <?php if ($this->session->flashdata('error') == TRUE): ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
            <?php endif; ?>
            <div class="table-responsive text-center">
            
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Student No.</th>
                    <th scope="col">Student Name</th>
                  
                    <th scope="col">Date</th>
                    <th scope="col">Time In</th>
                    <th scope="col">Time Out</th>   
                    <th scope="col">Hours Earned</th>  
                    <th scope="col">Total Hours Rendered</th>  
                     <th scope="col">Date Started Rendering Hours</th>  
                    <th scope="col">Remaining Hours</th>
                    <th scope="col">Approved</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
               
                <tbody>
                
                <?php foreach ($addressbook as $row): ?>
                            <tr>
                            <td><?php echo $row->studentNumber; ?></td>
                                <td><?php echo $row->firstName; ?> &nbsp; <?php echo $row->lastName; ?></td>
                            
                                <td><?php echo $row->date; ?></td>
                                <td><?php echo $row->timeIn; ?></td>
                                <td><?php echo $row->timeOut; ?></td>
                                <td><?php echo $row->timeDiff; ?></td>
                                <td><?php echo $row->totalHours; ?></td>
                                <td><?php echo $start->date; ?></td>
                                <td><?php echo $row->totalHoursToRender-$row->totalHours; ?></td>
                                 <?php if (  $row->isApproved === '1' ) : ?>
                                     <td>Yes</td>
             <?php else : ?>
                     <td>No</td>
             <?php endif; ?>
                                <td> <a href="<?php echo site_url('Ojt/getStudentTime');?>/<?php echo $row->studentNumber;?>/<?php echo $row->weeklyReportID;?>/<?php echo $weekNumber->weekNumber;?>" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                <?php endforeach; ?>
                </tbody>
        </table></div>
                    
            </div>
        </div>

      </div>
      
  
      
      <div class="d-flex justify-content-end">
          
            <div class="col-2">
                </div>
                
                <div class="col-4">
                    
                    <label for="exampleInputEmail1">Download PDF Week Report: </label>
                <a href="<?php echo site_url('Ojt/downloadWeekReport');?>/<?php echo $weekNumber->weekNumber;?>/<?php echo $row->studentNumber;?>/<?php echo $row->sectionID;?>" class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
</svg></a>
                </div>
            </div>
    </div>

    <script src="<?php echo base_url("assets/libs/jquery/dist/jquery.min.js"); ?>"></script>
    
    <script src="<?php echo base_url("assets/libs/jquery/dist/jquery.min.js"); ?>"></script>
    
    <script src="<?php echo base_url("assets/extra-libs/sparkline/sparkline.js"); ?>"></script>
    
    <script src="<?php echo base_url("assets/js/waves.js"); ?>"></script>
    
    <script src="<?php echo base_url("assets/js/sidebarmenu.js"); ?>"></script>
    
    <script src="<?php echo base_url("assets/js/custom.min.js"); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>