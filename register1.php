<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $address = $salary615 = $username = $password ="";
$name_err = $address_err = $salary615_err = $username_err =$password_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Validate salary615
    $input_salary615 = trim($_POST["salary615"]);
    if(empty($input_salary615)){
        $salary615_err = "Please enter the salary615 amount.";     
    } elseif(!ctype_digit($input_salary615)){
        $salary615_err = "Please enter a positive integer value.";
    } else{
        $salary615 = $input_salary615;
    }

    // Validate username
if(empty(trim($_POST["username"]))){
    $username_err = "Please enter a username.";
} elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
    $username_err = "Username can only contain letters, numbers, and underscores.";
} else{
    // Prepare a select statement
    $sql = "SELECT id FROM employees WHERE username = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        
        // Set parameters
        $param_username = trim($_POST["username"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                $username_err = "This username is already taken.";
            } else{
                $username = trim($_POST["username"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}

// Validate confirm password
if(empty(trim($_POST["password"]))){
    $password_err = "Please confirm password.";     
} else{
    $password = trim($_POST["password"]);
    if(empty($password_err) && ($password != $password)){
        $password_err = "Password did not match.";
    }
}
 
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($salary615_err)&& empty($username_err)&& empty($password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, address, salary615, username, password) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssiss", $param_name, $param_address, $param_salary615, $param_username, $param_password);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary615 = $salary615;
            $param_username = $username;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: register2.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="style.css" />
	

    <title>Luca's bread</title>
  </head>
  <body>
    
  <nav class="nav">
      <div class="container">
        <img src="product-images/logo.png" width="100",height="50";class="P1";>



        <h5 class="h5"><a href="Vivi.html">Luca'Home</a></h5>
        <ul>
          <li><a href="Vivi.html" >Home</a></li>
          <li><a href="aboutus.html">About Us</a></li>
          <li><a href="upload.html">Careers</a></li>
          <li><a href="orderonline.php">Order Online</a></li>
          <li><a href="contactus.html">Contact Us</a></li>
          <li><a href="register1.php" class="current">Register</a></li>
        </ul>
      </div>
    </nav>
	<a href="index2.php" class="btn btn-warning">Management Page</a>
	<div class="row input-container">
	 <div class="col-md-12">

	    <div class="row">
			<h1 class="H3">Create Record</h1>
	</div>
	
			<h4 style="text-align:center">Please fill this form and submit to add employee record to the database.</h4>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"id="form"syley="align=“center”">


			<div class="col-xs-12">
				<div class="styled-input wide">
					<input type="text" required  name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
					<span class="invalid-feedback"><?php echo $name_err;?></span>
                    <label>Name</label>                           
					
				</div>
			</div>


			<div class="col-md-6 col-sm-12">
				<div class="styled-input">
                <input type="text" required name="address"class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?>
                
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
					<label>Address</label> 
                    
				</div>
			</div>



			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="float:right;">
					<input required type="text" name="salary615" class="form-control <?php echo (!empty($salary615_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary615; ?>">
                            <span class="invalid-feedback"><?php echo $salary615_err;?></span>
					<label>Salary</label> 
				</div>
			</div>


			
			<div class="col-xs-12">
				<div class="styled-input wide1">
				
				<input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
				<span class="invalid-feedback"><?php echo $password_err;?></span>
				<label>Username</label>
			
				</div>
			</div>
			<div class="col-xs-12">
				<div class="styled-input wide">
					<input required type="text" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err;?></span>
					<label>Password</label> 
				</div>
			</div>
			<div class="col-xs-12">
			
				<input type="submit" class="btn-lrg submit-btn" value="Submit">
				
			
                        
                     
		</form>
						<a href="index2.php" class="btn btn-warning" Style="color:white;text-align: center;font-size:50px;margin-left:120px;">Management Page</a>
			</div>
	</div>
	
</div>
<div class="container-fluid" style="padding-top: 40px;background-color: aliceblue;">
          <div class="row clearfix">
              <div class="col-md-12 column">
                  <div class="jumbotron">
                      <div class="container">
                          <center>
      
                              <p>Copyright© 20ITA1 203190615 Vivi(Xu Weiwei) </p>
                              <p>Lucas'bread</p>
                              Adress：36 Garden Ave, Mullumbimby NSW 2482 
                              
                              email：545004 telephone：0772-2046337
                          </center>
      
                      </div>
                  </div>
              </div>
          </div>
      </div>