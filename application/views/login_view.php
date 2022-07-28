<?php $this->load->view('includes/header');?>
<!DOCTYPE html>
<html>
<head>
	<title>CLIO</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<br> <br> <br> <br> 
		
		<div class="row justify-content-md-center">
		
		    <div class="col-md-4 col-md-offset-4">
				<form action="<?php echo site_url('Login/auth'); ?>" method="POST">
				  <h2 class="text-center" >Log in to CLIO</h2>
				  <br> <br> <br> 
				  <div class="form-group">
				    <label for="exampleInputUsername">Username</label>
				    <input required type="username" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Username">
				    </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input required type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
				  </div>
				  <button type="submit" class="btn btn-secondary">Sign In</button>
				</form>
		    </div>
	 	</div>
	</div>
</body>
</html>