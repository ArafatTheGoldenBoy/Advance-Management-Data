<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <?php include 'connection.php'; ?>
    <title>Ingredients</title>
</head>
<body class="container">
    <section>
        <h3>Ingredients list</h3>
        <form method="post">
        <?php 
        echo "<table class='table'>";
            echo "<tr>";
                echo "<th>" . "Id" . "</th>";
                echo "<th>" . "Name" . "</th>";
                echo "<th>" . "Region" . "</th>";
                echo "<th>" . "Price" . "</th>";
                echo "<th>" . "Stock" . "</th>";
                echo "<th>" . "Status" . "</th>";
                echo "<th>" . "SupplierId" . "</th>";
                echo "<th>" . "Checked" . "</th>";
            echo "</tr>";
        $query = pg_query($db, "select * from show_all_ingredients()");
        while($row = pg_fetch_row($query)) {
            echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "<td>" . $row[5] . "</td>";
                echo "<td>" . $row[6] . "</td>";
                echo "<td><input type='radio' name= 'ing_id' value = ". $row[0] . "></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    <input type="submit" formaction="process.php" name="Delete_ing" value="Delete">
    <input type="submit" formaction="edit_ingredients.php" name="edit_ing" value="Edit">
    <input type="submit" formaction="process.php" name="hide_ing" value="hide">
    <input type="submit" formaction="process.php" name="show_ing" value="show">
        </form>
    </section>
    <br>

    <section>
        <h6>Hidden Ingredients</h6>
        <?php 
        echo "<table class='table'>";
            echo "<tr>";
                echo "<th>" . "Id" . "</th>";
                echo "<th>" . "Name" . "</th>";
            echo "</tr>";
        $query = pg_query($db, "select * from list_of_hide_ingredients()");
        
        while($row = pg_fetch_row($query)) {
            echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
        </section>

        <section>
        <h6>Not Hidden Ingredients</h6>
        <?php 
        echo "<table class='table'>";
            echo "<tr>";
                echo "<th>" . "Id" . "</th>";
                echo "<th>" . "Name" . "</th>";
            echo "</tr>";
        $query = pg_query($db, "select * from list_of_show_ingredients()");
        
        while($row = pg_fetch_row($query)) {
            echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
        </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>