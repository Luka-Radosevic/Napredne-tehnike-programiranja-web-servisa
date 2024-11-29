<!DOCTYPE html>
<html>
    <head>
    <title>PHP 3 Vjezba 6</title>
    </head>
    <body>
    <p>Kalkulator (Switch naredba)</p>
    <label for="num1"><b>Upiši prvi broj: </label>
        <input type="number" id="num1" required><br>
        <label for="num2"><b>Upiši drugi broj: </label>
        <input type="number" id="num2" required><br>
        <br>
        <p id="result">Rezultat:</p>
        <button onclick="calculate('+')">+</button>
        <button onclick="calculate('-')">-</button>
        <button onclick="calculate('*')">*</button>
        <button onclick="calculate('/')">/</button>

        

        <script>
            function calculate(operation) {
                const num1 = parseFloat(document.getElementById("num1").value);
                const num2 = parseFloat(document.getElementById("num2").value);

                let result;

                switch (operation) {
                    case "+":
                        result = num1 + num2;
                        break;
                    case "-":
                        result = num1 - num2;
                        break;
                    case "*":
                        result = num1 * num2;
                        break;
                    case "/":
                        result = num1 / num2;
                        break;
                    default:
                        result = "Invalid operation";
                }

                document.getElementById("result").textContent = "Result: " + result;
            }
        </script>
    </body>
</html>