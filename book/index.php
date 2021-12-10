<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Vkladani knih</h2>
  <form action="index.php" method="POST">
    <label for="isbn">ISBN</label>
    <input name="isbn" type="text" value="">

    <label for="name">Jméno autora</label>
    <input name="name" type="text" value="">

    <label for="surname">Přijmení autora</label>
    <input name="surname" type="text" value="">

    <label for="book">Jméno knihy</label>
    <input name="book" type="text">

    <label for="desc">Popis</label>
    <input name="desc" type="text" value="">

    <input type="submit" name="submit" value="Odeslat">
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

    $sql = "INSERT INTO books (isbn,author_name,author_surname,book_name,descript) VALUES ('" . addslashes($book['isbn']) . "','" . addslashes($book['name']) . "','" .addslashes( $book['surname']). "','" .addslashes( $book['book']) . "','" .addslashes( $book['desc'] ). "');";

    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
  }
  ?>
  <br>
  <a href="search.php">Vyhledani knih</a>
  <a href="overwiew.php">Zobrazeni knih</a>
</body>

</html>