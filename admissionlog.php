<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"/>
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	  <link rel="stylesheet" href="/resources/demos/style.css">
	  <style>
	  fieldset {
		  border: 0;
	  }
	  lable {
		  display: block;
		  margin: 30px 0 0 0;
	  }
	  </style>
	  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	  <script>
	  $( "#type" ).selectmenu();
	  });
	  </script>
	  
</head>
<body>

<?php
      $dbh=new PDO('mysql:host=localhost;dbname=firstdb','root','');
       if(isset($_REQUEST["login"]))
      {
	       $id=$_REQUEST["ID"];
	       $pswd=$_REQUEST["PSWD"];
	       $type=$_REQUEST["type"];
	
	$sql= "select * from adm_login where id='$id'";
	$link = $dbh->prepare($sql);
    $link->execute();
	$data = $link->fetch();
	
	            if($id==$data['id'] && $pswd==$data['pswd'])
	            {
		           session_start();
		           $_SESSION['login']=$data['id'];
		           header("Location:admission.php");
		           die("");
	             }
	
	                else
		                echo "Invalid Login Provided. Please re-login";
	
	        if(isset($_SESSION['login']))
		       unset($_SESSION['login']);
	  }
?>
</br>
<section class="vh-1000" style="background-color: #233067;">

  <div class="container py-5 h-500">
    <div class="row justify-content-center align-items-center h-500">
      <div class="col-12 col-lg-15 col-xl-10">
	  <div class="p-3 mb-2 bg-info text-dark">
        <div class="card shadow-2-strong card-registration" >
          <div class="card-body p-4 p-md-5">
<div class="container bg-pink border rounded border-pink shadow-sm main"></br></br></br></br></br>
<h2 class="text-center"><u>AIWC ACADEMY OF EXCELLENCE  </b></u></h2></br></br>
<form action="admissionlog.php" method="POST" class="text-dark" data-bss-recipient="12223ac1d072c3a5614f27bf1e1">
<center><div  class="form-group"><input class="form-control" type="text" name="ID" placeholder="ENTER ID" style="width:500px;" required /></div></br>
<div class="form-group"><input class="form-control" type="password" name="PSWD" placeholder="ENTER PSWD"  style="width:500px;" required /></div>
</center></br></br>
<center>
<select name="type" id="type">
<option disabled selected>choose</option>
 <option value="admin"> Admin </option>
 <option value="others"> Others </option> </select>
 </center></br></br>
           <div class="form-group text-center"><button class="btn btn-primary" type="submit" name="login">LogIn</button></br></br>
		   Create a new login id. SignUp here...</br></br>
		   <div class="form-group text-center"><button class="btn btn-primary" type="submit" ><a href="admsignup.php"><font color="white">SignUp</font></a></button></div>
</div>
	</form></div></body>
</html>