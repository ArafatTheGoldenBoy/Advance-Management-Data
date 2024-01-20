<?php
include_once 'connection.php';
    if(isset($_POST['save']))
    {	 
        $name = $_POST['supplier_name'];
        $sql = "select add_supplier('$name', 't', 1)";
        if (pg_query($db, $sql)) {
            header("Location: supplierlist.php");
            exit();
        }
    }

    if(isset($_POST['save_ingredient']))
    {	 
        $name = $_POST['ingredient_name'];
        $region = $_POST['region'];
        $price= $_POST['price'];
        $stock = $_POST['stock'];
        $supplier = $_POST['supplier'];
        $sql = "select add_ingredient('$name','$region','$price','$stock', 't', $supplier)";
        if (pg_query($db, $sql)) {
            header("Location: ingredientlist.php");
            exit();
        }
    }

    if(isset($_POST['savepizza']))
    {	
        $base = $_POST['basepizza'];
        $pizzaname = $_POST['pizza_name'];
        $ing_id = $_POST['ingredientid'];
        $arr = implode(',',$ing_id);
        $sql = "select create_pizza('$pizzaname', array[$arr],$base)";
        if (pg_query($db, $sql)) {
            header("Location: composepizzalist.php");
            exit();
        }
    }

    if(isset($_POST['orderpizza']))
    {	 
        $order = intval($_POST['order']);
        echo $order;
        $sql = "select order_pizza($order)";
        if (pg_query($db, $sql)) {
            header("Location: pizza_baker.php");
            exit();
        }
    }

    if(isset($_POST['Delete_ing']))
    {	 
        $del_id = $_POST['ing_id'];
        $sql = "select del_ingredient($del_id)";
        if (pg_query($db, $sql)) {
            header("Location: ingredientlist.php");
            exit();
        }
    }
    
    if(isset($_POST['Delete_supp']))
    {	 
        $del_id = $_POST['supp_id'];
        $sql = "select del_suppliers($del_id)";
        if (pg_query($db, $sql)) {
            header("Location: supplierlist.php");
            exit();
        }
    }

    if(isset($_POST['edit_supplier']))
    {	 
        $up_id = $_POST['supp_id'];
        $up_name = $_POST['in_name'];
        $up_status = $_POST['in_status'];
        $sql = "select change_suppliers_all($up_id,'$up_name','$up_status')";
        if (pg_query($db, $sql)) {
            header("Location: supplierlist.php");
            exit();
        }
    }

    if(isset($_POST['edit_ingredient']))
    {	 
        $up_id = $_POST['ingg_id'];
        $up_name = $_POST['in_name'];
        $up_region = $_POST['in_region'];
        $up_price = $_POST['in_price'];
        $up_stock = $_POST['in_stock'];
        $up_status = $_POST['in_status'];
        $sup_id = $_POST['su_id'];
        $sql = "select * from change_ingredient_all($up_id,'$up_name','$up_region',$up_price,$up_stock,'$up_status',$sup_id)";
        if (pg_query($db, $sql)) {
            header("Location: ingredientlist.php");
            exit();
        }
    }

    if(isset($_POST['hide_supp']))
    {	 
        $up_id = $_POST['supp_id'];
        $sql = "select hide_supp_status($up_id)";
        if (pg_query($db, $sql)) {
            header("Location: supplierlist.php");
            exit();
        }
    }

    if(isset($_POST['show_supp']))
    {	 
        $up_id = $_POST['supp_id'];
        $sql = "select show_supp_status($up_id)";
        if (pg_query($db, $sql)) {
            header("Location: supplierlist.php");
            exit();
        }
    }

    if(isset($_POST['hide_ing']))
    {	 
        $up_id = $_POST['ing_id'];
        $sql = "select hide_ing_status($up_id)";
        if (pg_query($db, $sql)) {
            header("Location: ingredientlist.php");
            exit();
        }
    }
    if(isset($_POST['show_ing']))
    {	 
        $up_id = $_POST['ing_id'];
        $sql = "select show_ing_status($up_id)";
        if (pg_query($db, $sql)) {
            header("Location: ingredientlist.php");
            exit();
        }
    }
    if(isset($_POST['save_base_pizza']))
    {	 
        $name = $_POST['base_name'];
        $size = $_POST['base_size'];
        $price= $_POST['base_price'];
        $sql = "select add_base_pizza('$name',$size,$price)";
        if (pg_query($db, $sql)) {
            header("Location: customer.php");
            exit();
        }
    }

?>