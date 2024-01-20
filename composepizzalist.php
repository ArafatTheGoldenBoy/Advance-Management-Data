<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <?php include 'connection.php'; ?>
    <title>Document</title>
</head>
<body class="container my-5">
    <section>
        <h3>Compose Pizza list</h3>
    <?php 
        echo "<table class='table'>";
            echo "<tr>";
                echo "<th>" . "Id" . "</th>";
                echo "<th>" . "Compose_pizzas_Name" . "</th>";
                echo "<th>" . "Size" . "</th>";
                echo "<th>" . "Price" . "</th>";
                echo "<th>" . "Date" . "</th>";
            echo "</tr>";
        $query = pg_query($db, "select * from show_all_compose_pizza()");
        
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

    <section>
        <h3>Order Pizza</h3>
    <form action="process.php" method="post">
    <?php 
        echo "<table class='table'>";
            echo "<tr>";
                echo "<th>" . "Id" . "</th>";
                echo "<th>" . "Compose_pizzas_Name" . "</th>";
                echo "<th>" . "Size" . "</th>";
                echo "<th>" . "Price" . "</th>";
            echo "</tr>";
        $query = pg_query($db, "select * from show_all_compose_pizza()");
        
        while($row = pg_fetch_row($query)) {
            echo "<tr>";

                echo "<td><input type='radio' name = 'order' value =" . $row[0] . "></td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . " cm</td>";
                echo "<td>" . $row[3] . " €</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    
        <input type="submit" name="orderpizza" value="order">
    </form>
    
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>