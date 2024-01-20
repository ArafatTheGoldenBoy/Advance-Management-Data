<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <?php include 'connection.php'; ?>
    <title>Pizza Baker</title>
</head>
<body class="container my-5">
    <section>
        <h3>Add Suppliers</h3>
        <form method="post" action="process.php">
            Supplier name:<br>
            <input type="text" name="supplier_name" required>
            <br>
            <input type="submit" name="save" value="add">
        </form>
        <br>
            <a href="supplierlist.php">List of Suppliers</a>
    </section>
    <br>
    <section>
        <h3>Add Ingredients</h3>
        <form method="post" action="process.php">
            Ingredient name:<br>
            <input type="text" name="ingredient_name" required>
            <br>
            Regional Provence:<br>
            <input type="text" name="region" required>
            <br>
            Price:<br>
            <input type="text" name="price" required>
            <br>
            Quantity:<br>
            <input type="text" name="stock" required>
            <br>
            Supplier:<br>
            <select class="dropdown" id="supplier" name="supplier">
                <?php
                $query = pg_query($db, "select * from show_suppliers()");
                while($row = pg_fetch_row($query)) {
                    echo "<option value=" . $row[0]. ">" . $row[1] . "</option>";
                }
                ?>
            </select>
            <br>
            <input type="submit" name="save_ingredient" value="add" style: margin>
        </form>
        <br>
        <a href="ingredientlist.php">List of Ingredients</a>
    </section>
    <br>
    <section>
                <h3>Add Base Pizza</h3>
                <form method="post" action="process.php">
                    Base Pizza name:<br>
                    <input type="text" name="base_name" required>
                    <br>
                    Size:<br>
                    <input type="text" name="base_size" required>
                    <br>
                    Price:<br>
                    <input type="text" name="base_price" required>
                    <br>
                    <input type="submit" name="save_base_pizza" value="add">
                </form>
                <br>
                <a href="customer.php">List of Base Pizza</a>
    </section>
    <section>
        <h3>Recently ordered Pizza list</h3>
    <?php 
        echo "<table class='table'>";
            echo "<tr>";
                echo "<th>" . "Order_Id" . "</th>";
                echo "<th>" . "Compose_pizzas_Id" . "</th>";
                echo "<th>" . "Pizza Name" . "</th>";
                echo "<th>" . "Date" . "</th>";
            echo "</tr>";
        $query = pg_query($db, "select * from recently_ordered_pizzas()");
        
        while($row = pg_fetch_row($query)) {
            echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>