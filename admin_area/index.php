<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <!-- ccs file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
    width: 100px;
    object-fit: contain;    
}
.footer{
    position: absolute;
    bottom: 0;
}
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Admin</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">

    <li class="nav-item">
          <a class="nav-link" href="../user_area/user_login.php">Login</a>
    </li>
    </ul>
</nav>

        <!-- second child -->
        <div class="bg dark">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="px-5">
                    <a href="#"><img src="../images/admin.png" 
                    alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin</p>
                </div>
                <!-- button*4>a.nav-link.text-light.bg-info.my-1 -->
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light 
                    bg-dark my-1">Insert Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light 
                    bg-dark my-1">Insert Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light 
                    bg-dark my-1">Insert Brands</a></button> 
                    <!-- <button><a href="" class="nav-link text-light 
                    bg-info my-1">Logout</a></button>                  -->
                </div>
            </div>
        </div>
    </div>

    <!-- fourth child -->
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');
        }
        ?>
    </div>

<!-- last child -->
<div class="bg-dark p10 text-center footer">
    <p>All rights reserved</p>
</div>

<!-- boostrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>