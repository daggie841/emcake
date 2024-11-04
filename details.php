<?php
ob_start();
include 'header.php';
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID is set in the URL and is a valid number
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $food_id = intval($_GET['id']);

    // Fetch details of the food item
    $sql = "SELECT id, foodname, image, price, description, catfood FROM food WHERE id = $food_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Food item not found.");
    }
} else {
    die("Invalid food item ID.");
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Details - <?php echo htmlspecialchars($row['foodname']); ?></title>
    <style>
        /* General Styles */
        .main {
            font-family: Arial, sans-serif;
            background-color: lightpink;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
          
            margin-top: 20px;
        
      
        .food-image img {
            width: 600px;
             border-radius: 5%;
            
        }
        .food-details {
            text-align: center;
        }
        .food-details h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }
        .food-details p {
            margin-bottom: 10px;
            font-size: 1.2em;
            color: #555;
        }
        .food-details .price {
            font-size: 1.5em;
            font-weight: bold;
            color: #333;
        }
        .food-details .category {
            font-size: 1em;
            color: #999;
        }
    </style>
</head>
<body>
     <div class="main">
    <div class="main-content">
        <div class="food-image">
            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['foodname']); ?>">
        </div>
        <div class="food-details">
            <h1><?php echo htmlspecialchars($row['foodname']); ?></h1>
            <p class="price">Price: Ksh<?php echo htmlspecialchars($row['price']); ?></p>
            <p class="category">Category: <?php echo htmlspecialchars($row['catfood']); ?></p>
            <p class="description"><?php echo htmlspecialchars($row['description']); ?></p>
        </div>
    </div>
</div>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
