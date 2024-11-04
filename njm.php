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

// Fetch categories
$sql_categories = "SELECT DISTINCT catfood FROM food";
$result_categories = $conn->query($sql_categories);
if ($result_categories === false) {
    die("Error fetching categories: " . $conn->error);
}

// Fetch food items based on selected category
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';
$sql_food = "SELECT id, foodname, image, price, description, catfood FROM food";
if (!empty($category_filter)) {
    $sql_food .= " WHERE catfood = '" . $conn->real_escape_string($category_filter) . "'";
}
$sql_food .= " ORDER BY id DESC";
$result_food = $conn->query($sql_food);
if ($result_food === false) {
    die("Error fetching food items: " . $conn->error);
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food List</title>
    <style>
        /* General Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .main {
            display: flex;
            flex: 1;
        }
        .sidebar {
            width: 250px;
            padding: 20px;
            background-color: pink;
        }
        .sidebar h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 10px 0;
        }
        .sidebar ul li a {
            text-decoration: none;
            color: #333;
        }
        .main-content {
            background-color: lightpink;
            flex-grow: 1;
            padding: 20px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }
        .product {
            width: calc(25.666% - 10px); /* 4 items per row */
            margin-bottom: 10px;
            background-color: lightpink;
            text-align: center;
        }
        .product img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }
        .product h2 {
            font-size: 1em;
            margin-top: 10px;
        }
        .product p {
            margin: 5px 0;
        }

        /* Media Queries */
        @media (max-width: 1024px) {
            .product {
                width: calc(50% - 10px); /* 2 items per row on tablets */
            }
            .product img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
            }
        }
        @media (max-width: 600px) {
            .product img {
                width: 150px;
                height: 150px;
                border-radius: 50%;
            }
            .product {
                width: calc(50% - 10px); /* 2 items per row on phones */
            }
            .sidebar {
                display: none; /* Hide sidebar on small screens */
            }
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="sidebar">
            <h2>Categories</h2>
            <ul>
                <li><a href="foodlist.php">All</a></li>
                <?php
                if ($result_categories->num_rows > 0) {
                    while ($row = $result_categories->fetch_assoc()) {
                        echo '<li><a href="foodlist.php?category=' . urlencode($row['catfood']) . '">' . htmlspecialchars($row['catfood']) . '</a></li>';
                    }
                } else {
                    echo '<li>No categories found.</li>';
                }
                ?>
            </ul>
        </div>
        <div class="main-content">
            <div class="container">
                <?php
                if ($result_food->num_rows > 0) {
                    while ($row = $result_food->fetch_assoc()) {
                        echo '<div class="product">';
                        echo '<a href="details.php?id=' . htmlspecialchars($row['id']) . '">';
                        echo '<img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['foodname']) . '" onerror="this.src=\'default-image.jpg\'">'; // Fallback image if the original fails
                        echo '</a>';
                        echo '<h2>' . htmlspecialchars($row['foodname']) . '</h2>';
                        echo '<p>Price: Ksh' . htmlspecialchars($row['price']) . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "No food items found.";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
