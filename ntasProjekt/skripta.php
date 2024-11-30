<!DOCTYPE html>
<head>
  <title>Unos vijesti</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="with=device-width, initial-scale=1.0" />
    <style type="text/css">
        <?php include 'style.css'; ?>
    </style>
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
  <?php
        session_start();
        if(isset($_POST['submit'])) {
            include 'connect.php';
            $slika = $_FILES['pphoto']['name']; 
            $naslov=$_POST['title']; 
            $sazetak=$_POST['about']; 
            $sadrzaj=$_POST['content']; 
            $kategorija=$_POST['category']; 
            $datum=date('d.m.Y.'); 
            $user=$_SESSION['username'];
            if(isset($_POST['archive'])) { 
                $arhiva=1; 
            } else { 
                $arhiva=0; 
            } 
            $putanjaSlike = 'img/'.$slika; 
            move_uploaded_file($_FILES["pphoto"]["tmp_name"], $putanjaSlike); 
            $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva ) 
                VALUES ('$datum', '$naslov', '$sazetak', '$sadrzaj', '$slika', '$kategorija', '$arhiva')";
            $result = mysqli_query($dbc, $query) or die('Pogreška pri unosu');
            mysqli_close($dbc);
        }
    ?>
    <div class="ispis">
        <section role="main" class="infoUnos"> 
            <div class="row"> 
                <h2><?php echo $naslov; ?></h2><br>
            </div> 
            <section> <?php echo "<img src='img/$slika'"; ?> </section>
            <br><section> <p>SAŽETAK:<?php echo $sazetak; ?> </p> </section><br>
            <section> <p>SADRŽAJ:<?php echo $sadrzaj; ?> </p> </section> <br>
        </section>
            <p>KATEGORIJA:<?php echo $kategorija; ?></p><br>
            <p>AUTOR:<?php echo $user;?></p><br>
            <p>OBJAVLJENO:<?php echo $datum;?></p> 
    </div>
</body>
</html>