<!DOCTYPE html>
<html>

<head>
    <!-- Load file CSS Bootstrap -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h2>Login multi user dengan PHP</h2><br>
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

        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" class="form-control" name="username" placeholder="Masukan Username">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Masukan Password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
</body>

</html>