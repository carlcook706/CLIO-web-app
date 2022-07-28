<?php $this->load->view('includes/header');?>
    <div class="container">
    <br>
    <br>
    <div class="row justify-content-md-center">
    
        <div class="col-md-6 col-md-offset-6">
        <form method="post" action="<?php echo site_url('Grading/update_gradingSystem')?>/<?php echo $row->gradingSystemID; ?>">

            <div class="form-group">
            <span style="font-weight:bold">Grading System:</span>
            <input type="text" class="form-control" name="gradingSystem" value="<?php echo $row->gradingSystem; ?>" aria-describedby="emailHelp" placeholder="Enter the grading system">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Criteria:</span>
            <textarea class="form-control"  name="criteria" rows="5"><?php echo $row->criteria; ?></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('Grading')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>  
        </div>
        </div>
    </div>
   
    </div>


  </body>
</html>