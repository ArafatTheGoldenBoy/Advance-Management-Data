<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'connection.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Customer</title>
</head>
<body class="container my-5">
    <section>
        <h3>List of Ingredients</h3>
    <?php 
        echo "<table class='table'>";
            echo "<tr>";
                echo "<th>" . "Id" . "</th>";
                echo "<th>" . "Name" . "</th>";
                echo "<th>" . "region" . "</th>";
                echo "<th>" . "price" . "</th>";
                echo "<th>" . "Stock" . "</th>";
            echo "</tr>";
        $query = pg_query($db, "select * from show_ingredients_in_stock()");
        

        while($row = pg_fetch_row($query)) {
            echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[4] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    </section>
    <br>
    <section>
        <h3>Create Pizza</h3>
        <form method="post" action="process.php">
            Pizza name:<br>
            <input type="text" name="pizza_name" required>
            <br>
            <?php 
        echo "<h4>Base pizza</h4>";
        echo "<table class='table'>";
        echo "<tr>";
            echo "<th>" . "Id" . "</th>";
            echo "<th>" . "Base_pizzas_Name" . "</th>";
            echo "<th>" . "Size" . "</th>";
            echo "<th>" . "Price" . "</th>";
        echo "</tr>";
    $query = pg_query($db, "select * from base_pizzas");
    
    while($row = pg_fetch_row($query)) {
        echo "<tr>";

            echo "<td><input type='radio' name = 'basepizza' value =" . $row[0] . "></td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . " cm</td>";
            echo "<td>" . $row[3] . " €</td>";
        echo "</tr>";
    }
    echo "</table>";
        // $_POST['ingredientid'] = array();
        echo "Selected Ingredients:<br>";
        echo "<table class='table'>";
            echo "<tr>";
                echo "<th> Cheacked </th>";
                echo "<th>" . "Id" . "</th>";
                echo "<th>" . "Name" . "</th>";
                echo "<th>" . "region" . "</th>";
                echo "<th>" . "price" . "</th>";
                echo "<th>" . "Stock" . "</th>";
            echo "</tr>";
        $query = pg_query($db, "select * from show_ingredients_in_stock()");

        while($row = pg_fetch_row($query)) {
            echo "<tr>";
                echo "<td><input type='checkbox' name= 'ingredientid[]' value = ". $row[0] . "></td>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[4] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
            <input type="submit" name="savepizza" value="create">
        </form>
            <a href="composepizzalist.php">List of all Pizza</a>
    </section>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>