<?php $this->load->view('includes/header');?>
    <div class="container">
    <br>
    <br>
    <div style="color:red">
	<?php echo validation_errors(); ?>
     <?php if(isset($error)){print $error;}?>
    </div>
    <div class="row justify-content-md-center">
    
        <div class="col-md-6 col-md-offset-6">
        <form method="post" action="<?php echo site_url('Admin/update')?>/<?php echo $row->username; ?>/<?php echo $row->contactNumber; ?>" enctype="multipart/form-data">
            <div class="form-group">
            <span style="font-weight:bold">ID</span>
                <input type="text" class="form-control" name="id" value="<?php echo $row->id; ?>" aria-describedby="emailHelp" placeholder="Enter ID">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">First Name</span>
                
                <input required type="text" class="form-control" name="firstName" value="<?php echo $row->firstName; ?>" aria-describedby="emailHelp" placeholder="Enter first name">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Middle Name</span>
                <input   type="text" class="form-control" name="middleName" value="<?php echo $row->middleName; ?>" aria-describedby="emailHelp" placeholder="Enter middle name">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Last Name</span>
                <input required type="text" class="form-control" name="lastName" value="<?php echo $row->lastName; ?>" aria-describedby="emailHelp" placeholder="Enter last name">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Suffix</span>
                <input type="text" class="form-control" name="suffix" value="<?php echo $row->suffix; ?>" aria-describedby="emailHelp" placeholder="Enter suffix">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Email</span>
                <input type="text" class="form-control" name="email" value="<?php echo $row->email; ?>" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Password</span>
                <input type="password" class="form-control" name="password" value="" aria-describedby="emailHelp" placeholder="Enter password">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Contact Number</span>
                <input required type="number" class="form-control" name="contactNumber" value="<?php echo $row->contactNumber; ?>" aria-describedby="emailHelp" placeholder="Enter contact number">
            </div>
            <div class="form-group">
            <span style="font-weight:bold">Display Picture</span>
                <input type="hidden" class="form-control" name="old_image" value="<?php echo $row->image; ?>">
                <input type="file" class="form-control" name="image" >
            </div>

            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('Admin')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>  
        </div>
        </div>
    </div>
   
    </div>


  </body>
</html>