<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Vyhledani knih</h2>
    <form action="search.php" method="POST">
        <label for="isbn">ISBN</label>
        <input name="isbn" type="text" value="">

        <label for="name">Jméno autora</label>
        <input name="name" type="text" value="">

        <label for="surname">Přijmení autora</label>
        <input name="surname" type="text" value="">

        <label for="book">Jméno knihy</label>
        <input name="book" type="text">

        <input type="submit" name ="submit" value="Odeslat">
    </form>
    <?php
      require('login.php');
     if (isset($_POST['submit'])) {
    $book = $_POST;
    

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `books` WHERE `isbn`='".addslashes($book['isbn'])."' OR`author_name`='".addslashes($book['name'])."' OR`author_surname`='".addslashes($book['surname'])."'OR`book_name`='".addslashes($book['book'])."';";
    $result = mysqli_query($conn, $sql);


    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ISBN: " . htmlspecialchars($row["isbn"]) . " - Autor: " . htmlspecialchars($row["author_name"]) . " " . htmlspecialchars($row["author_surname"]) . " Jmeno Knizky: " . htmlspecialchars($row["book_name"]) . " Popis: " . htmlspecialchars($row["descript"]) . "<br>";
    }


    mysqli_close($conn);
}
    ?>
     <a href="index.php">Vkladani knih</a>
    <a href="overwiew.php">Zobrazeni</a>
</body>

</html>