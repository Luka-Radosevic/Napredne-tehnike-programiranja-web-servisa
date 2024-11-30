<?php
    $unique = true;
    $registriranKorisnik = "";
    if(isset($_POST['registracija'])){
            if(!empty($_POST['korisnik']) && !empty($_POST['ime']) && !empty($_POST['prezime']) && !empty($_POST['lozinka']) && !empty($_POST['ponovi']) 
            && ($_POST['lozinka'] == $_POST['ponovi'])){    
            include 'connect.php';
            $korisnik = $_POST['korisnik'];
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $lozinka = $_POST['lozinka'];
            $hash_lozinka = password_hash($lozinka,CRYPT_BLOWFISH);
            $razina=0;          
            $query = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
            $stmti = mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmti, $query)){
                mysqli_stmt_bind_param($stmti,'s',$korisnik);
                mysqli_stmt_execute($stmti);
                mysqli_stmt_store_result($stmti);
            }

            if(mysqli_stmt_num_rows($stmti) > 0){
                $unique = false;
            }else{
                session_start();
                $_SESSION['username'] = $korisnik;
                $_SESSION['level'] = $razina;
                $query = "INSERT INTO korisnik (ime,prezime,korisnicko_ime,lozinka,razina) VALUES (?,?,?,?,?)";
                $stmt=mysqli_stmt_init($dbc);
                if(mysqli_stmt_prepare($stmt,$query)){
                    mysqli_stmt_bind_param($stmt,'ssssd',$ime,$prezime,$korisnik,$hash_lozinka,$razina);
                    mysqli_stmt_execute($stmt);
                    $registriranKorisnik = true;
                }
                
            };
            mysqli_close($dbc);
        };
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Registracija</title>
</head>
<body>
<div class="naslov">
    <p> VJESNIK </p>
    <h1> NOVA SFERA </h1>
    </div>
    <header>
        <nav class="navigacija">
        <div></div>
        <div><a href="index.php" class="navigacijaGumb">HOME</a></div>
        <div><a href="kategorija.php?id=putovanje" class="navigacijaGumb">PUTOVANJE</a></div>
        <div><a href="kategorija.php?id=financije" class="navigacijaGumb">FINANCIJE</a></div>
        <div><a href="unos.php" class="navigacijaGumb">UNOS VIJESTI</a></div>
        <div><a href="administracija.php" class="navigacijaGumb">PRIJAVA</a></div>
        <div><a href="registracija.php" class="navigacijaGumb">REGISTRACIJA</a></div>
        </nav>
    </header>
    <main class="cont-main">
        <div class="registracija-container"> 
            <h1>Registracija</h1><br>
            <form enctype="multipart/form-data" method="POST" action="">
                <label for="korisnik">Korisničko ime: </label><br>
                <input type="text" id="korisnik" name="korisnik" ><br>
                <span id='PorukaKorisnik' class='BojaPoruke'></span>
                <?php if(isset($_POST['registracija'])){
                    if(!$unique){
                        echo"<br><span id='PorukaKorisnik' class='BojaPoruke'>Korisničko ime se već koristi!</span>";
                    };
                };?><br>
                <label for="ime">Ime: </label><br>
                <input type="text" id="ime" name="ime" ><br>
                <span id="porukaIme" class="BojaPoruke"></span><br>
                <label for="prezime">Prezime: </label><br>
                <input type="text" id="prezime" name="prezime" ><br>
                <span id="porukaPrezime" class="BojaPoruke"></span><br>
                <label for="lozinka">Lozinka: </label><br>
                <input type="password" id="lozinka" name="lozinka" ><br>
                <span id="PorukaLozinka" class="BojaPoruke"></span><br>
                <label for="ponovi">Ponovite lozinku: </label><br>
                <input type="password" id="ponovi" name="ponovi" ><br>
                <span id="PorukaPonovi" class="BojaPoruke"></span><br>
                <button type="submit" class="reg_form" id="registracija" name="registracija">Registriraj</button>
            </form>
            <?php if(isset($_POST['registracija'])){
                if($registriranKorisnik == true){
                echo'<br><p>Korisnik je uspješno registriran!</p>';
            };
            };?>
            <br><p>Već imate korisnički račun?</p>
            <a href="administracija.php">Login</a>

            <script type="text/javascript">
document.getElementById('registracija').onclick = function(event){
                var slanjeForme= true;
                var poljeIme= document.getElementById("ime");
                var ime= document.getElementById("ime").value;
                if(ime.length == 0) {
                    slanjeForme= false;
                    poljeIme.style.border="1px dashed red";
                    document.getElementById("porukaIme").innerHTML="Unesite ime!<br>";
                } else{
                    poljeIme.style.border="1px solid green";
                    document.getElementById("porukaIme").innerHTML="";
                }
                var poljePrezime= document.getElementById("prezime");
                var prezime= document.getElementById("prezime").value;
                if(prezime.length== 0) {
                    slanjeForme= false;
                    poljePrezime.style.border="1px dashed red";
                    document.getElementById("porukaPrezime").innerHTML="Unesite Prezime!<br>";
                } else{
                    poljePrezime.style.border="1px solid green";
                    document.getElementById("porukaPrezime").innerHTML="";
                };
                var poljeUsername= document.getElementById("korisnik");
                var username= document.getElementById("korisnik").value;
                if(username.length== 0) {
                    slanjeForme= false;
                    poljeUsername.style.border="1px dashed red";
                    document.getElementById("PorukaKorisnik").innerHTML="Unesite korisničko ime!<br>";
                } else{
                    poljeUsername.style.border="1px solid green";
                    document.getElementById("PorukaKorisnik").innerHTML="";
                };
                var poljePass= document.getElementById("lozinka");
                var pass= document.getElementById("lozinka").value;
                var poljePassRep= document.getElementById("ponovi");
                var passRep= document.getElementById("ponovi").value;
                if(pass.length== 0|| passRep.length== 0|| pass!= passRep) {
                    slanjeForme= false;
                    poljePass.style.border="1px dashed red";
                    poljePassRep.style.border="1px dashed red";
                    document.getElementById("PorukaLozinka").innerHTML="Lozinke nisu iste!<br>";
                    document.getElementById("PorukaPonovi").innerHTML="Lozinke nisu iste!<br>";
                } else{
                    poljePass.style.border="1px solid green";
                    poljePassRep.style.border="1px solid green";
                    document.getElementById("PorukaLozinka").innerHTML="";
                    document.getElementById("PorukaPonovi").innerHTML="";
                };
                if(slanjeForme!= true) {event.preventDefault();}
            };
        </script>            
        </div>
    </main>
    <footer><p>Copyright 2024 Vjesnik Nova Sfera</p></footer>
</html>