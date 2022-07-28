<?php $this->load->view('includes/header');?>
    <div class="container">
    <br>
    <br>
    <div class="row justify-content-md-center">
    
        <div class="col-md-6 col-md-offset-6">
        <form method="post" action="<?php echo site_url('Ojt/comment_insert')?>/<?php echo $report->weeklyReportID; ?>/<?php echo $student->studentNumber; ?>/<?php echo $student->sectionID; ?>">

            <div class="form-group">
            <span style="font-weight:bold">Student Name: </span>
            <span ><?php echo $student->firstName; ?><?php echo $student->middleName; ?> <?php echo $student->lastName; ?><?php echo $student->suffix; ?></span>
            </div>
            
             <div class="form-group">
            <span style="font-weight:bold">DTR Image: </span>
                <img src="<?php echo 'http://clio-rms.com/backendstudent/uploads/'.$report->dtrImage;?>" alt="DTR Image" class="img-thumbnail">
           
            </div>
            
            <div class="form-group">
            <span style="font-weight:bold">Task: </span>
            <span ><?php echo $report->tasks; ?></span>
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Lesson: </span>
            <span ><?php echo $report->lesson; ?></span>
            </div>

            <div class="form-group">
            <span style="font-weight:bold">Date: </span>
            <span ><?php echo $report->date; ?></span>
            </div>

           
            <div class="form-group">
             <span style="font-weight:bold">Comment:</span>
            <textarea class="form-control" name="comment" value="<?php echo $report->comment; ?>" placeholder="Enter comment" rows="5"><?php echo $report->comment; ?></textarea>
             </div>
           
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('Ojt/weeklyReport2')?>/<?php echo $student->studentNumber; ?>//<?php echo $student->sectionID; ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>  
        </div>
        </div>
    </div>
   
    </div>


  </body>
</html>