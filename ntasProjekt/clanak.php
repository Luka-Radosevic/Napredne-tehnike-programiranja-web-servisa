<!DOCTYPE html>
<head>
  <title>Clanak</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="clanak.css">
    <meta name="viewport" content="with=device-width, initial-scale=1.0" />
  </style>
</head>
<body>
    <?php 
        include 'connect.php';
        define('UPLPATH', 'img/'); 
    ?>
    <div class="pozadina">
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
    </div>
    <?php 
        $id = $_GET['id'];
        $query = "SELECT * FROM vijesti WHERE id = '$id'";
        $result = mysqli_query($dbc, $query); 
        $row = mysqli_fetch_array($result);
    ?>
    <section class="clanak" role="main"> 
        <div class="row"> 
            <h2 class="title"><?php echo $row['naslov']; ?></h2> 
        </div> 
        <section class="slika"> <?php echo '<img src="' . UPLPATH . $row['slika'] . '">'; ?> </section>
        <section class="sadrzaj"> 
            <p> <?php echo $row['tekst']; ?> </p> 
        </section>
        <br>
        <div class="autor">
            <h3 class="kategorija"> KATEGORIJA: <?php echo "<span>".$row['kategorija']."</span>"; ?></h3>
            <p>AUTOR:</p> 
            <p>OBJAVLJENO: <?php echo "<span>".$row['datum']."</span>"; ?></p> 
        </div>
    </section>
    <footer><p>Copyright 2024 Vjesnik Nova Sfera</p></footer>
</body>
</html>