<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Přehled všech knih</h2>
    <?php
    require('login.php');

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `books` WHERE 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ISBN: " . htmlspecialchars($row["isbn"]) . " - Autor: " . htmlspecialchars($row["author_name"]) . " " . htmlspecialchars($row["author_surname"]) . " Jmeno Knizky: " . htmlspecialchars($row["book_name"]) . " Popis: " . htmlspecialchars($row["descript"]) . "<br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>
    <br>
    <a href="index.php">Vkladani knih</a>
    <a href="search.php">Vyhledani knih</a>
</body>

</html>