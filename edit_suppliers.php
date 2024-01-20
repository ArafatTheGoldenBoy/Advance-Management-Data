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
        <h3>Edit Supplier</h3>
        <form action="process.php" method="post">
        <?php 
                
                
        if(isset($_POST['edit_supp']))
        {	 
            $up_id = $_POST['supp_id'];
            $sql = pg_query($db, "select * from edit_supplier($up_id)");
            while($row = pg_fetch_row($sql)) {
                    echo "<input type='hidden' name= 'supp_id' value = ". $row[0] . ">";
                    echo "<p>Name: <input type='text' name='in_name' value=" . $row[1] . "></p><br>";
                        echo "Status: <input type='radio' name='in_status' value='t'>Show ";
                        echo "<input type='radio' name='in_status' value='f'>Hide</p>";
            }
        }
    ?>
    <input type="submit" name="edit_supplier" value="Update">
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>