<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website-Cart Details</title>
    <!-- boostrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />     
     <!--css file  -->
     <link rel="stylesheet" href="style.css">
     <style>
        .cart_img{
    width: 80px;
    height: 80px;
    object-fit: contain;
}
     </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="./images/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
          cart_item();?>
          </sup></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- calling cart funstion -->
<?php
cart();
?>
<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
    </li>
    <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
    </li>
    </ul>
</nav>

<!-- third child -->
<div class="bg-light">
    <h3 class="text-center">FIND THAT SUITS YOU</h3>
    <p class="text-center">"Clothes aren’t going to change the world, but the person wearing them might."</p>
</div>

<!-- fourth child-table -->
<div class="container">
    <div class="row">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
                <!-- php code to display dynamic data -->
                <?php
    global $con;
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="Select * from `Products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $price_table=$row_product_price['product_price'];
            $product_title=$row_product_price['product_title'];
            $product_image1=$row_product_price['product_image1'];
            $product_values=array_sum($product_price);
            $total_price+=$product_values;
    
    
                ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="" id="" class="form-input w-50"></td>
                    <td>₱<?php echo $price_table ?></td>
                    <td><input type="checkbox"></td>
                    <td>
                        <button class="bg-info px-3 py-2 mx-2">Update</button><button class="bg-info px-3 py-2 mx-2">Remove</button>
                    </td>
                </tr>

                <?php }
    }?>
            </tbody>
        </table>
        <!-- SubTotal -->
        <div class="d-flex mb-4">
            <h4 class="px-3">Subtotal:<strong class="text-info"> ₱<?php echo $total_price ?></strong></h4>
            <a href="index.php"><button class="bg-info px-3 py-2 border-0 mx-3">Continue Shopping</button></a>
            <a href="#"><button class="bg-secondary p-3 py-2 border-0 text-light">Checkout</button></a>
        </div>
    </div>
</div>



<!-- last child -->
<div class="bg-info p10 text-center">
    <p>All rights reserved</p>
</div>
<!-- boostrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>