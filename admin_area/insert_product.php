<?php
include('../includes/connect.php');

if (isset($_POST['insert_product'])) {
    // Sanitize inputs
    $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
    $product_category = mysqli_real_escape_string($con, $_POST['product_category']);
    $product_brands = mysqli_real_escape_string($con, $_POST['product_brands']);
    $product_Price = mysqli_real_escape_string($con, $_POST['product_Price']);
    $product_status = 'true';

    // Validate inputs
    if (empty($product_title) || empty($description) || empty($product_keywords) || empty($product_category) || empty($product_brands) || empty($product_Price)) {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }

    // File upload handling
    $upload_dir = "./product_images/";
    $product_image1 = uploadFile('product_image1', $upload_dir);
    $product_image2 = uploadFile('product_image2', $upload_dir);
    $product_image3 = uploadFile('product_image3', $upload_dir);

    // Insert query
    $insert_products = "INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id,
        product_image1, product_image2, product_image3, product_price, date, status) 
        VALUES ('$product_title', '$description', '$product_keywords', '$product_category', '$product_brands',
        '$product_image1', '$product_image2', '$product_image3', '$product_Price', NOW(), '$product_status')";

    $result_query = mysqli_query($con, $insert_products);

    if ($result_query) {
        echo "<script>alert('Successfully Inserted the Products')</script>";
    } else {
        echo "<script>alert('Error inserting product')</script>";
    }
}

function uploadFile($inputName, $uploadDir)
{
    $file = $_FILES[$inputName]['name'];
    $temp_file = $_FILES[$inputName]['tmp_name'];

    if (empty($file)) {
        echo "<script>alert('Please select an image for $inputName')</script>";
        exit();
    }

    $target_file = $uploadDir . basename($file);

    // Check file type or other validations here

    if (move_uploaded_file($temp_file, $target_file)) {
        return $file;
    } else {
        echo "<script>alert('Error uploading $inputName')</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product-Admin Dashboard</title>
    <!-- boostrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <!-- ccs file -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off"
                required="required">
            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter description" autocomplete="off"
                required="required">
            </div>   
                <!-- keywords -->
                <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product keywords" autocomplete="off"
                required="required">
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
<?php
$select_query="Select * from `categories`";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
    $category_title=$row['category_title'];
    $category_id=$row['category_id'];
    echo "<option value='$category_id'>$category_title</option>";
}
?>
                </select>
            </div>
            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a Brands</option>
                    <?php
$select_query="Select * from `brands`";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
    $brand_title=$row['brand_title'];
    $brand_id=$row['brand_id'];
    echo "<option value='$brand_id'>$brand_title</option>";
}
?>
                </select>
            </div>
            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"
                required="required">
            </div>
            <!-- image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"
                required="required">
            </div>
            <!-- image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"
                required="required">
            </div>
            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_Price" class="form-label">Product Price</label>
                <input type="text" name="product_Price" id="product_Price" class="form-control" placeholder="Enter Product Price" autocomplete="off"
                required="required">
            </div>
            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Product">
            </div>
        </form>
    </div>
    
</body>
</html>