<?php $this->load->view('includes/header');?>
    <div class="container">
    <br>
    <br>
    <div class="row justify-content-md-center">
    
        <div class="col-md-6 col-md-offset-6">
            
          
        <form method="post" action="<?php echo site_url('Ojt/update_studentTime')?>/<?php echo $report->weeklyReportID; ?>/<?php echo $student->studentNumber; ?>/<?php echo $student->totalHours; ?>/<?php echo $report->dtrImage; ?>/<?php echo $report->timeDiff; ?>/<?php echo $report->isApproved; ?>/<?php echo $student->sectionID; ?>/<?php echo $weekNumber->weekNumber; ?>">

            <div class="form-group">
            <span style="font-weight:bold">Student Name: </span>
            <span ><?php echo $student->firstName; ?><?php echo $student->middleName; ?> <?php echo $student->lastName; ?><?php echo $student->suffix; ?></span>
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Date: </span>
            <span ><?php echo $report->date; ?></span>
            </div>

            <div class="form-group">
            <span style="font-weight:bold">DTR Image: </span>
                <img src="<?php echo 'http://clio-rms.com/backendstudent/uploads/'.$report->dtrImage;?>" alt="DTR Image" class="img-thumbnail">
           
            </div>
            <div class="form-group">
                <span style="font-weight:bold">Task:</span>
                
                <span ><?php echo $report->tasks; ?></span>
            </div>
            <div class="form-group">
                <span style="font-weight:bold">Learnings:</span>
                
                <textarea readonly class="form-control"  row="5" ><?php echo $report->lesson; ?></textarea>
            </div>
            
            <div class="form-group">
                <span style="font-weight:bold">Time In:</span>
                <input type="text" class="form-control" name="timeIn" value="<?php echo $report->timeIn; ?>" aria-describedby="emailHelp" placeholder="Enter time in">
            </div>
            <div class="form-group">
                <span style="font-weight:bold">Time Out:</span>
                <input type="text" class="form-control" name="timeOut" value="<?php echo $report->timeOut; ?>" aria-describedby="emailHelp" placeholder="Enter time out">
            </div>

            <div class="form-group">
                <span style="font-weight:bold">Time Count:</span>
                <span ><?php echo $report->timeDiff; ?></span>
            </div>

           
            <button type="submit" class="btn btn-primary" value="save">Approve</button>
            <a href="<?php echo site_url('Ojt/getStudentTime2')?>/<?php echo $student->studentNumber; ?>/<?php echo $student->sectionID; ?>/<?php echo $weekNumber->weekNumber; ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>  
           
            
      
        </div>
        </div>
    </div>
   
    </div>


  </body>
</html>