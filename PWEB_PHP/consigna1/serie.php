<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Consigna 1</title>
</head>
<body>
<h1>Números Pares Menores de 400</h1>
    <ul>
        <?php
        for ($i = 2; $i < 400; $i += 2) {
            echo "<li>$i</li>";
        }
        ?>
    </ul>
</body>
</html>