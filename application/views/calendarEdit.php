<?php $this->load->view('includes/header');?>
    <div class="container">
    <br>
    <br>
    <div class="row justify-content-md-center">
    
        <div class="col-md-6 col-md-offset-6">
        
        <form method="post" action="<?php echo site_url('Calendar/update')?>/<?php echo $row->calendarID; ?>">
            <div class="form-group">
            <span style="font-weight:bold">Activity</span>
                <input type="text" class="form-control" name="activity" value="<?php echo $row->activity; ?>" aria-describedby="emailHelp" placeholder="Enter activity">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Expected Outcome</span>
                <input type="text" class="form-control" name="expectation" value="<?php echo $row->expectation; ?>" aria-describedby="emailHelp" placeholder="Enter expected outcome">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Date</span>
                        <input type="date" class="form-control" name="date" aria-describedby="emailHelp" placeholder="Enter date" value="<?php echo $row->calendarDateTime; ?>">
                    </div>
            <div class="form-group">
            <span style="font-weight:bold">Batch:</span>
                    <select class="form-select" aria-label="Default select example"  name="batch" >
                    <option value="<?php echo $row->batchID;?>" selected><?php echo $row->batchName;?></option>
                    <?php foreach($result2 as $row2) {?>
                        <option value="<?php echo $row2->batchID;?>"><?php echo $row2->batchName;?></option>
                        <?php } ?>
                    </select>
                    </div>
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('Calendar')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>   
        </div>
        </div>
    
   
    </div>


  </body>
</html>