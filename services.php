<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emcake Bakery </title>
    
</head>
<body>
    <header>
        <h1>Emcake Bakery</h1>
    </header>
    <main>
        <div class="content">
            <section class="about">
                <h2>Welcome to emcake </h2>
                <p>Welcome to Emcake Bakery, where we bake more than just cakes; we create delightful memories with every bite. Our commitment to quality and excellence is evident in every product we offer, ensuring that your sweet cravings are always satisfied.</p>
                <div class="features">
                    <div class="feature">
                        <h3>Quality Ingredients</h3>
                        <p>At Emcake Bakery, we believe that quality starts with the ingredients. We use only the finest, locally sourced ingredients to create our delicious cakes, ensuring rich flavors and the highest standards in every creation.</p>
                    </div>
                    <div class="feature">
                        <h3>Immaculate Cleanliness</h3>
                        <p>We take cleanliness very seriously in our baking process. Our state-of-the-art kitchen is maintained to the highest hygiene standards, ensuring that every cake is not only delicious but also safe and healthy for you and your loved ones.</p>
                    </div>
                    <div class="feature">
                        <h3>Wide Variety of Cakes</h3>
                        <p>Whether you’re celebrating a birthday, wedding, or any special occasion, we have a cake for every event. Our diverse range of flavors and designs is sure to impress and satisfy everyone at your gathering.</p>
                    </div>
                    <div class="feature">
                        <h3>Custom Orders</h3>
                        <p>We understand that every occasion is unique. That’s why we offer custom cake designs tailored to your specifications. Just let us know what you envision, and we'll bring it to life!</p>
                    </div>
                    <div class="feature">
                        <h3>Exceptional Customer Service</h3>
                        <p>Our friendly and knowledgeable staff are here to assist you with every step of your order, ensuring that your experience is smooth and enjoyable from start to finish.</p>
                    </div>
                    <div class="feature">
                        <h3>Freshly Baked Every Day</h3>
                        <p>We pride ourselves on baking fresh cakes daily. You can taste the difference in our cakes, made with love and dedication to quality that keeps our customers coming back for more.</p>
                    </div>
                </div>
                <p>Visit us at Emcake Bakery and treat yourself to the best cakes in town. We can’t wait to serve you and share our passion for baking!</p>
            </section>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>


<style>
/* General styles */
 .content {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    color: #333;
    background-color: lightpink;
    margin: 0;
    padding: 0;
}

header {
   background-color: lightpink;
    color: black;
    padding: 1em 0;
    text-align: center;
}

header h1 {
    margin: 0;
}

main {
    padding: 20px;
}

h2 {
    color: #444;
    border-bottom: 2px solid #ddd;
    padding-bottom: 10px;
}

.about p {
    margin-bottom: 20px;
}

.features {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.feature {
    flex: 1 1 45%;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    padding: 15px;
    margin-bottom: 20px;
}

.feature h3 {
    margin-top: 0;
    color: #444;
}

</style>
