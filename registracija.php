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

	<head>
		<meta charset="UTF-8">
		<title>Registracija</title>
	</head>

	<body>

		

		<?php

			if(isset($_POST["reg"])){
				
				$Korisnici = simplexml_load_file("korisnici.xml");

				$Korisnik = $Korisnici->addChild("Korisnik");

				$Korisnik->addChild("Ime", $_POST["Ime"]);
				$Korisnik->addChild("Prezime", $_POST["Prezime"]);
				$Korisnik->addChild("KorisnickoIme", $_POST["KorisnickoIme"]);
				$Korisnik->addChild("Lozinka", $_POST["Lozinka"]);

				$Korisnici->asXML("korisnici.xml");

				echo "<div class='red'>Registracija uspješna!</div>";

			}

		?>

		<main>

			<h2>Registracija</h2>

			<form name="registracija" action="registracija.php" method="POST">
				<input type="text" name="Ime" placeholder="Ime" autofocus required>
				<input type="text" name="Prezime" placeholder="Prezime" required>
				<input type="text" name="KorisnickoIme" placeholder="Korisničko ime" required>
				<input type="password" name="Lozinka" placeholder="Lozinka" required>
				<input type="submit" name="reg" value="Registriraj se">
			</form>

			<a href="index.php">Prijava s postojećim korisničkim računom</a>

		</main>

	</body>

</html>