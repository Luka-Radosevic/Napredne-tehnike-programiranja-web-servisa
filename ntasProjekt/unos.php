<!DOCTYPE html>
<head>
  <title>Unos vijesti</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="with=device-width, initial-scale=1.0" />
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
  <div class="ispis">
        <form name="forma" enctype="multipart/form-data" action="skripta.php" method="POST"> 
            <div class="form-item">
                <span id="porukaTitle"></span>
                <label for="title">Naslov vijesti:</label> 
                <div class="form-field"> 
                    <input type="text" name="title" id="title" class="form-field-textual">
                </div> 
            </div> 
            <div class="form-item">
                <span id="porukaAbout"></span>
                <label for="about">Sažetak vijesti:</label> 
                <div class="form-field"> 
                    <textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"></textarea>
                </div> 
            </div> 
            <div class="form-item"> 
                <span id="porukaContent"></span>
                <label for="content">Sadržaj vijesti:</label> 
                <div class="form-field"> 
                    <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
                </div> 
            </div> 
            <div class="form-item"> 
                <span id="porukaSlika"></span>
                <label for="pphoto">Slika: </label> 
                <div class="form-field"> 
                    <input type="file" accept="image/jpg,image/gif" class="input-text" name="pphoto" id="pphoto" />
                </div> 
            </div> 
            <div class="form-item">
                <label for="category">Kategorija vijesti</label>
            </div>
            <div class="form-field"> 
                <span id="porukaKategorija"></span>
                <select name="category" id="category" class="form-field-textual"> 
                    <option value="putovanje">Putovanje</option> 
                    <option value="financije">Financije</option>
                </select> 
            </div> 
            <div class="form-item"> 
                <label>Spremiti u arhivu: 
                    <div class="form-field"> 
                        <input type="checkbox" name="archive">
                    </div> 
                </label> 
            </div> 
            <div class="form-item"> 
                <button type="reset" value="Poništi">Poništi</button> 
                <button type="submit" name="submit" id="submit" value="Prihvati">Prihvati</button> 
            </div> 
        </form>
    </div>
    <footer><p>Copyright 2024 Vjesnik Nova Sfera</p></footer>
</body>
</html>