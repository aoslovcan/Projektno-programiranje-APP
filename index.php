<!DOCTYPE html>
<html>
<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 20%;
	height: 20%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

div.red {
	border: 10px solid #F05D5E;
	color: #301212;
}

</style>
<body>

<?php

			if(isset($_POST["log"])){
				
				$KorisnickoIme = $_POST["KorisnickoIme"];
				$Lozinka = $_POST["Lozinka"];
				$Login = 0;

				$Korisnici = simplexml_load_file("korisnici.xml");

				foreach ($Korisnici->Korisnik as $Korisnik){
					if($Korisnik->KorisnickoIme == $KorisnickoIme && $KorisnickoIme == "profesor"){
						$Login = 1;
						header('Location: pocetna_profesor.html');
					}
				}
				
				foreach ($Korisnici->Korisnik as $Korisnik){
					if($Korisnik->KorisnickoIme == $KorisnickoIme && $KorisnickoIme == "student"){
						$Login = 1;
						header('Location: pocetna.html');
					}
				}

				if($Login == 0) {
					echo "<div class='red'>Unijeli ste pogrešno korisničko ime i/ili lozinku.</div>";
				}

			}

?>

<h2>Prijava</h2>

<form action="index.php" method="POST">
  <div class="imgcontainer">
    <img src="img/header-logo.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Korisničko ime</b></label>
    <input type="text" placeholder="Korisnicko ime" name="KorisnickoIme" required>

    <label><b>Lozinka</b></label>
    <input type="password" placeholder="Lozinka" name="Lozinka" required>
        
    <button type="submit" name="log">Prijavi se!</button>
    <input type="checkbox" checked="checked"> Zapamti me
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Odustani</button>
    <span class="psw">Zaboravio si <a href="#">lozinku?</a></span><br/>
	 <span class="psw"><a href="registracija.php">Registracija</a></span>
  </div>
</form>

</body>
</html>
