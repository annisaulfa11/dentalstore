<!DOCTYPE html>
<html>

<head>
    <!-- Load file CSS Bootstrap -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css" />
</head>

<body>
    <div class="d-lg-flex half">
        <div class="contents order-2 order-md-1 bg " style="background-image:url(img/image.png)">
        </div>
        <div class="contents con order-1 order-md-2">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Welcome to <strong>Xenon</strong></h3>
                        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                            <div class="form-group first">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" placeholder="Masukan Username" id="username"
                                    name="username">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Masukan Password" id="password">
                            </div>
                            <div class="d-flex mb-5 align-items-center">
                            </div>
                            <input type="submit" value="Login" class="but">
                        </form>
                        <?php
		 //Fungsi untuk mencegah inputan karakter yang tidak sesuai
		 function input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		//Cek apakah ada kiriman form dari method post
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			session_start();
			include "config.php";
			$username = input($_POST["username"]);
			$p = input(md5($_POST["password"]));

			$sql = "select * from users where username='".$username."' and password='".$p."' limit 1";
			$hasil = pg_query($conn,$sql);
			$jumlah = pg_num_rows($hasil);

			if ($jumlah>0) {
				$row = pg_fetch_assoc($hasil);
				$_SESSION["id"]=$row["id"];
				$_SESSION["username"]=$row["username"];
				$_SESSION["level"]=$row["level"];
		
		
				if ($_SESSION["level"]=$row["level"]==3)
				{
					header("Location:admin.php");
				} else if ($_SESSION["level"]=$row["level"]==2)
				{
					header("Location:owner.php");
				}else if ($_SESSION["level"]=$row["level"]==1){
					header("Location:kasir.php");
				}
		
				
			}else {
				echo "<div class='alert alert-danger'>
				<strong>Error!</strong> Username dan password salah. 
			  </div>";
			}

		}
	
	?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>