<?php
include 'header.php';
include 'config.php';

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected category from the URL if available
$selected_category = isset($_GET['category']) ? $_GET['category'] : '';

// Query to fetch food items, filter by category if one is selected
$sql = "SELECT foodname, image, price, description, catfood FROM food";
if ($selected_category) {
    $sql .= " WHERE catfood = '" . $conn->real_escape_string($selected_category) . "'";
}
$result = $conn->query($sql);

// Query to fetch categories
$sql_categories = "SELECT DISTINCT catfood FROM food"; // Adjust this query as necessary for your categories
$result_categories = $conn->query($sql_categories);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Items</title>
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
        .sidebar ul li a.active {
            font-weight: bold;
            color: red; /* Highlight active category */
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
            padding: 10px;
            border-radius: 5px;
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
                <li><a href="foodlist.php" class="<?= !$selected_category ? 'active' : '' ?>">All</a></li>
                <?php
                if ($result_categories && $result_categories->num_rows > 0) {
                    while ($row = $result_categories->fetch_assoc()) {
                        $active_class = ($row['catfood'] === $selected_category) ? 'active' : '';
                        echo '<li><a href="foodlist.php?category=' . urlencode($row['catfood']) . '" class="' . $active_class . '">' . htmlspecialchars($row['catfood']) . '</a></li>';
                    }
                } else {
                    echo '<li>No categories found.</li>';
                }
                ?>
            </ul>
        </div>

        <div class="main-content">
            <h1>Food Items</h1>
            <div class="container">
                <?php
                // Check if there are results and display them
                if ($result && $result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='product'>
                                <img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['foodname']) . "'>
                                <h2>" . htmlspecialchars($row['foodname']) . "</h2>
                                <p>Ksh: " . htmlspecialchars($row['price']) . "</p>
                               
                              </div>";
                    }
                } else {
                    echo "<p>No food items found.</p>";
                }

                // Close the connection
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