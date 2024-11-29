<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>PHP 3 Vjezba 5</title>
</head>
<body>
    <div class="guess-form">
        <h2>Igra (pogodi broj)</h2>
        <input type="number" id="guess-input" min="1" max="9">
        <button onclick="checkGuess()">Guess</button>
    </div>

    <div id="result"></div>

    <script>
        function checkGuess() {
            const guess = parseInt(document.getElementById("guess-input").value);
            const randomNum = Math.floor(Math.random() * 9) + 1;

            if (guess === randomNum) {
                document.getElementById("result").innerHTML = "<p class='correct'>Congratulations! You guessed correctly.</p>";
            } else {
                document.getElementById("result").innerHTML = "<p class='incorrect'>Sorry, the correct number was " + randomNum + ".</p>";
            }
        }
    </script>
</body>
</html>