<!DOCTYPE html>
<head>
  <title>Pocetna stranica</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
  <?php 
    include 'connect.php';
    define('UPLPATH', 'img/'); 
  ?>
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
  <main>
    <section class="main">
      <section class="putovanje">
        <h2>PUTOVANJE</h2>
        <hr><br>
        <div class="articles">
          <?php 
            $query = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'putovanje' LIMIT 3"; 
            $result = mysqli_query($dbc, $query); 
            while($row = mysqli_fetch_array($result)) { 
                echo '<article class="grupa">'; 
                echo'<div class="article">'; 
                echo '<div class="img">'; 
                echo '<img src="' . UPLPATH . $row['slika'] . '"'; 
                echo '</div>'; 
                echo '<div class="media_body">'; 
                echo '<h3>'; 
                echo '<a href="clanak.php?id='.$row['id'].'" class="clanak">'; 
                echo $row['naslov']; 
                echo '</a></h3>'; 
                echo '</div></div>'; 
                echo '</article>'; 
            }
          ?> 
        </div>
      </section>
      <section class="putovanje">
        <h2>FINANCIJE</h2>
        <hr><br>
        <div class="articles">
          <?php 
            $query = "SELECT * FROM vijesti WHERE arhiva = 0 AND kategorija = 'financije' LIMIT 3"; 
            $result = mysqli_query($dbc, $query); 
            while($row = mysqli_fetch_array($result)) { 
                echo '<article class="grupa">'; 
                echo'<div class="article">'; 
                echo '<div class="img">'; 
                echo '<img src="' . UPLPATH . $row['slika'] . '"'; 
                echo '</div>'; 
                echo '<div class="media_body">'; 
                echo '<h3>'; 
                echo '<a href="clanak.php?id='.$row['id'].'" class="clanak">'; 
                echo $row['naslov']; 
                echo '</a></h3>'; 
                echo '</div></div>'; 
                echo '</article>'; 
            }
          ?> 
        </div>
        <p style="text-align:center; padding-top:20px; font-weight:bold">Za novije vijesti otvorite <a href="#" id="noviLink">Link</a></p>
      </section>
    </section>
  </main>
  <footer><p>Copyright 2024 Vjesnik Nova Sfera</p></footer>

  <script>
    document.getElementById('noviLink').addEventListener('click', function(event) {
      event.preventDefault();

      fetch('get_redirect_url.php')
        .then(response => response.json())
        .then(data => {
          if (data.url) {
            window.location.href = data.url;
          } else {
            alert('Nema URL-a za preusmjeravanje');
          }
        })
        .catch(error => {
          console.error('Greška pri pozivu API-ja:', error);
        });
    });
  </script>
</body>
</html>
