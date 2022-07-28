<?php $this->load->view('includes/header');?>
    <div class="container">
    <br>
    <br>
    <div class="row justify-content-md-center">
    
        <div class="col-md-6 col-md-offset-6">
        <form method="post" action="<?php echo site_url('Ojt/updateTotalHoursToRender')?>/<?php echo $student->studentNumber; ?>/<?php echo $student->sectionID; ?>">

            <div class="form-group">
            <span style="font-weight:bold">Student Name: </span>
            <span ><?php echo $student->firstName; ?><?php echo $student->middleName; ?> <?php echo $student->lastName; ?><?php echo $student->suffix; ?></span>
            </div>
            <div class="form-group">
            <span style="font-weight:bold"> Section: </span>
            <span ><?php echo $student->section; ?></span>
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Batch: </span>
            <span ><?php echo $student->batchName; ?></span>
            </div>


            <div class="form-group">
            
            <input type="text" class="form-control" name="totalHoursToRender" value="<?php echo $student->totalHoursToRender; ?>" aria-describedby="emailHelp" placeholder="Enter total hours to render">
             </div>
           
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('Ojt/studentTime')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>  
        </div>
        </div>
    </div>
   
    </div>


  </body>
</html>