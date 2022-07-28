<?php $this->load->view('includes/header');?>
    <div class="container">
    <br>
    <br>
    <div class="row justify-content-md-center">
    
        <div class="col-md-6 col-md-offset-6">
        <form method="post" action="<?php echo site_url('Master_list/update')?>/<?php echo $row->studentNumber; ?>/<?php echo $row->contactNumber; ?>">
            <div class="form-group">
            <span style="font-weight:bold">First Name</span>
                <input required type="text" class="form-control" name="firstName" value="<?php echo $row->firstName; ?>" aria-describedby="emailHelp" placeholder="Enter first name">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Middle Name</span>
                <input type="text" class="form-control" name="middleName" value="<?php echo $row->middleName; ?>" aria-describedby="emailHelp" placeholder="Enter middle name ">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Last Name</span>
                <input required type="text" class="form-control" name="lastName" value="<?php echo $row->lastName; ?>" aria-describedby="emailHelp" placeholder="Enter last name">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Suffix</span>
                <input type="text" class="form-control" name="suffix" value="<?php echo $row->suffix; ?>" aria-describedby="emailHelp" placeholder="Enter suffix name">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Contact Number</span>
                <input required type="number" class="form-control" name="contactNumber" value="<?php echo $row->contactNumber; ?>" aria-describedby="emailHelp" placeholder="Enter contact number">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Section:</span>
                    <select class="form-select" aria-label="Default select example"  name="sectionID" >
                    <option value="<?php echo $row->sectionID;?>" selected><?php echo $row->section;?></option>
                    <?php foreach($sections as $row2) {?>
                        <option value="<?php echo $row2->sectionID;?>"><?php echo $row2->section;?></option>
                        <?php } ?>
                    </select>
                    </div>
            <div class="form-group">
            <span style="font-weight:bold">Batch:</span>
                    <select class="form-select" aria-label="Default select example"  name="batchID" >
                    <option value="<?php echo $row->batchID;?>" selected><?php echo $row->batchName;?></option>
                    <?php foreach($batches as $row3) {?>
                        <option value="<?php echo $row3->batchID;?>"><?php echo $row3->batchName;?></option>
                        <?php } ?>
                    </select>
                 </div>
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('Master_list')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>  
        </div>
        </div>
    </div>
   
    </div>


  </body>
</html>