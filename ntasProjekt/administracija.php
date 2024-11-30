<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Administracija</title>
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
        <div><a href="destroy.php" class="navigacijaGumb">ODJAVA</a></div>
        </nav>
    </header>
    <main class="cont-main">
        <div class="container">
            <?php
            session_start();
            include 'connect.php';
            $uspjesnaPrijava = false;
            $admin =false;
            $uspjeh=true;
            if(isset($_POST['login'])){   
                $username=$_POST['username'];
                $password=$_POST['password'];
                $sql = "SELECT korisnicko_ime,lozinka,razina FROM korisnik WHERE korisnicko_ime = ?";
                $statement=mysqli_stmt_init($dbc);
                if(mysqli_stmt_prepare($statement,$sql)){
                    mysqli_stmt_bind_param($statement,'s',$username);
                    mysqli_stmt_execute($statement);
                    mysqli_stmt_store_result($statement);
                }    
                mysqli_stmt_bind_result($statement,$user,$hash,$lvl);
                mysqli_stmt_fetch($statement);
                if(password_verify($password,$hash)){
                    $_SESSION['username']=$user;
                    $_SESSION['level']=$lvl;
                    $uspjesnaPrijava=true;
                    $admin=$lvl;
                }
                else{
                    $uspjeh=false;
                }
            };
            if(isset($_POST['delete'])){
                $id = $_POST['id'];
                $query = "DELETE FROM vijesti WHERE id =$id";
                $rezultat = masqli_query($dbc,$query);
            }
            if(isset($_POST['update'])){
                $naslov = $_POST['naslov'];
                $sadrzaj = $_POST['sadrzaj'];
                $sazetak = $_POST['sazetak'];
                $kategorija = $_POST['kategorija'];
                if(isset($_POST['arhiva'])){
                    $arhiva=1;
                }
                else{
                    $arhiva=0;
                }
                $id = $_POST['id'];
                if(!empty($_FILES['photo'])){
                    $slike = $_FILES['photo']['name'];
                    $target = 'img/'.$slike;
                    move_uploaded_file($_FILES['photo']["tmp_name"],$target);
                    $query = "UPDATE vijesti SET naslov='$naslov',sazetak='$sazetak',
                                tekst='$sadrzaj',slika='$slike',kategorija='$kategorija',arhiva='$arhiva' WHERE id=$id;";
                }
                else{
                    $query = "UPDATE vijesti SET naslov='$naslov',sazetak='$sazetak',
                                tekst='$sadrzaj',kategorija='$kategorija',arhiva='$arhiva' WHERE id=$id;";
                }    
                $rezultat = mysqli_query($dbc, $query);
            }
            ?> 
            <?php
            if(($uspjesnaPrijava == true && $admin ==true) || (isset($_SESSION['username'])) && $_SESSION['level'] == 1){      
                $query = "SELECT * FROM vijesti";    
                $rezultat = mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($rezultat)){  
                echo '<div class="sub-container">
                <form enctype="multipart/form-data" action="" method="POST">
                <div class="form-item">
                <label for="nasol">Naslov vjesti:</label>
                <div class="form-field">
                <input type="text" style="width:498px;" name="naslov" class="form-field-textual" value="'.$row['naslov'].'">
                </div> </div>
                <div class="form-item">
                <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova):</label>
                <div class="form-field">
                <textarea name="sazetak" id="" cols="60" rows="15" class="form-field-textual">'.$row['sazetak'].'</textarea>
                </div> </div>
                <div class="form-item">
                <label for="sadrzaj">Sadržaj vijesti:</label>
                <div class="form-field">
                <textarea name="sadrzaj" id="" cols="60" rows="15" class="form-field-textual">'.$row['tekst'].'</textarea>
                </div> </div>
                <div class="form-item">
                <label for="photo">Slika:</label>
                <div class="form-field">
                <input type="file" class="input-text" id="photo" name="photo"/> <br>
                <img src="img/'. $row['slika'] . '" width=200px>
                </div> </div>
                <div class="form-item">
                <label for="category">Kategorija vijesti:</label>
                <div class="form-field">
                <select name="kategorija" id="kategorija" class="form-field-textual" value="'.$row['kategorija'].'">
                    <option value="'.$row['kategorija'].'" >'.$row['kategorija'].'</option>
                    <option value="Znanost">Financije</option>
                </select> 
                </div> </div> 
                <div class="form-item"> 
                <label>Spremiti u arhivu:
                <div class="form-field">'; 
                if($row['arhiva'] == 0) { 
                    echo '<input type="checkbox" name="arhiva" id="arhiva"/> Arhiviraj?'; } 
                else { echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?'; } 
                echo '</div> </label> </div> </div> 
                <div class="form-item"> 
                <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'"> 
                <button type="reset" value="Poništi">Reset</button> 
                <button type="submit" id="update" name="update" value="Prihvati"> Izmjeni</button> 
                </div> 
                </form>
                </div><br>';} 
            }else if($uspjesnaPrijava == true && $admin == false){
                echo '<p>Pozdrav '.$username.'! Uspješno ste prijavljeni, ali niste administrator.</p>';
            }else if(isset($_SESSION['username']) && $_SESSION['level'] == 0){
                echo '<p>Pozdrav '.$_SESSION['username'].'! Uspješno ste prijavljeni, ali niste administrator.</p>';
            }else if($uspjesnaPrijava == false){
                ?><div class="reg-container">
                    <h1>Log in</h1>
                    <form method="POST" action="">
                        <label for="username">Korisničko ime </label><br>
                        <input type="text" id="username" name="username"><br>
                        <span id="porukaKor"></span>
                        <label for="password">Lozinka </label><br>
                        <input type="password" id="password" name="password"><br>
                        <span id="porukaPass"></span>
                        <button type="submit" id="login" name="login">Log in</button><br><br>
                        <?php 
                        if(!$uspjeh){
                            echo "Neuspješna prijava!";
                        }
                        ?>
                    </form>
                    <br><p>Nemate korisnički račun?</p>
                    <a href="registracija.php">Registracija</a>
                </div>
                <script type="text/javascript">
                document.getElementById('login').onclick = function (event){
                var slanje_forme = true;
                var poljeUsername= document.getElementById("username");
                var username= document.getElementById("username").value;
                if(username.length== 0) {
                    slanje_forme= false;
                    poljeUsername.style.border="1px dashed red";
                    document.getElementById("porukaKor").innerHTML="<br>Unesite korisničko ime!<br><br>";
                } else{
                    poljeUsername.style.border="1px solid green";
                    document.getElementById("porukaKor").innerHTML="";
                };
                var poljePass= document.getElementById("password");
                var pass= document.getElementById("password").value;
                if(pass.length== 0) {
                    slanje_forme= false;
                    poljePass.style.border="1px dashed red";
                    document.getElementById("porukaPass").innerHTML="<br>Unesite lozinku!<br><br>";
                } else{
                    poljePass.style.border="1px solid green";
                    document.getElementById("porukaPass").innerHTML="";
                };
                if(slanje_forme!= true) {event.preventDefault();};
                };
            </script>
                <?php  
            }
        ?>
        </div>
    </main>
    <footer><p>Copyright 2024 Vjesnik Nova Sfera</p></footer>
</body>
</html>
<?php
mysqli_close($dbc);
?>