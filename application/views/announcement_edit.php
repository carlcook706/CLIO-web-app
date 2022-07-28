<?php $this->load->view('includes/header');?>
    <div class="container">
    <br>
    <br>
    <div class="row justify-content-md-center">
    
        <div class="col-md-6 col-md-offset-6">
        <form method="post" action="<?php echo site_url('Announcement/update')?>/<?php echo $row->announcementID; ?>">
            <div class="form-group">
            <span style="font-weight:bold">Feature</span>
                <input type="text" class="form-control" name="feature" value="<?php echo $row->announcementFeature; ?>" aria-describedby="emailHelp" placeholder="Enter activity">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Topic</span>
                <input type="text" class="form-control" name="topic" value="<?php echo $row->announcementTopic; ?>" aria-describedby="emailHelp" placeholder="Enter expected outcome">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Announcement</span>
                <input type="text" class="form-control" name="announcement" value="<?php echo $row->announcement; ?>" aria-describedby="emailHelp" placeholder="Enter batch">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Section:</span>
                   
                    <select class="form-select" aria-label="Default select example"  name="section"  >
                    <option value="<?php echo $row->sectionID;?>" selected><?php echo $row->section;?></option>
                    <?php foreach($result2 as $row2) {?>
                        <option value="<?php echo $row2->sectionID;?>"><?php echo $row2->section;?></option>
                        <?php } ?>
                    </select>
                 
                    </div>
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('Announcement')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>  
        </div>
        </div>
    </div>
   
    </div>


  </body>
</html>