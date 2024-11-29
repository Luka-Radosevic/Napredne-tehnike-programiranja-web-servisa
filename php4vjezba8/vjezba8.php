<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Izbor vozila</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>Koji ti je najdraži auto?</h1>
        <ul id="listaVozila">
            <li>Audi</li>
            <li>BMW</li>
            <li>Renault</li>
            <li>Citroen</li>
        </ul>

        <form id="formaVozilo" onsubmit="dodajVozilo(event)">
            <label for="novoVozilo">Dodaj svoje vozilo:</label>
            <input type="text" id="novoVozilo" class="form-control" placeholder="Unesi naziv vozila" required>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Dodaj</button>
        </form>

        <form id="formaIzbor" onsubmit="izaberiVozilo(event)">
            <div class="radio-buttons" id="radioLista"></div>
            <button type="submit" class="btn btn-success">Prikaži izbor</button>
        </form>

        <div class="output" id="ispis"></div>

        <script>
            function osvijeziRadioGumbe() {
                const lista = document.querySelectorAll('#listaVozila li');
                const radioDiv = document.getElementById('radioLista');
                radioDiv.innerHTML = '';
                lista.forEach((item, index) => {
                    const radio = document.createElement('input');
                    radio.type = 'radio';
                    radio.name = 'vozilo';
                    radio.value = item.textContent;
                    radio.id = `vozilo${index}`;

                    const label = document.createElement('label');
                    label.setAttribute('for', `vozilo${index}`);
                    label.textContent = item.textContent;

                    radioDiv.appendChild(radio);
                    radioDiv.appendChild(label);
                });
            }

            function dodajVozilo(event) {
                event.preventDefault();
                const novoVozilo = document.getElementById('novoVozilo').value.trim();
                if (novoVozilo) {
                    const lista = document.getElementById('listaVozila');
                    const novoLi = document.createElement('li');
                    novoLi.textContent = novoVozilo;
                    lista.appendChild(novoLi);
                    document.getElementById('novoVozilo').value = '';
                    osvijeziRadioGumbe();
                }
            }

            function izaberiVozilo(event) {
                event.preventDefault();
                const izbor = document.querySelector('input[name="vozilo"]:checked');
                const ispis = document.getElementById('ispis');
                if (izbor) {
                    ispis.textContent = `Tvoje najdraže vozilo je: ${izbor.value}`;
                } else {
                    ispis.textContent = `Molimo odaberite vozilo.`;
                }
            }

            osvijeziRadioGumbe();
        </script>
    </body>
</html>
