<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emcake Bakery</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .container {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: lightpink;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: background 0.5s;
            width: 100%;
            max-width: 1200px;
        }
        .section, .logo-container, #products, #specials, #events, #gallery {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 20px;
        }
        .info {
            border-radius: 10px;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
            color: #d1004b;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 10px;
            justify-items: center;
            padding: 10px;
        }
        @media (max-width: 768px) {
            .container {
                padding: 0 10px;
            }
            h2 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="logo-container">
        <img src="img/1.png" alt="Emcake Bakery Logo">
        <p>Welcome to <strong>Emcake Bakery</strong>, where we celebrate the art of baking with a unique touch. Our bakery is known for its freshly baked goods, crafted with love and the finest ingredients. Indulge in our signature cakes, pastries, and breads that bring a slice of happiness to your day.</p>
    </div>

    <section id="products">
        <h2>Our Signature Products</h2>
        <div class="section">
            <img src="img/cake.jpg" alt="Cake Image">
            <div class="info">
                <p>Our bakery offers a wide range of cakes, from classic vanilla and chocolate to unique seasonal flavors. Try our famous Red Velvet Cake and feel the richness with every bite. <b><a href="products.php" style="color: #d1004b; text-decoration: none;"> Explore Products</a></b></p>
            </div>
        </div>
    </section>

    <section id="specials">
        <h2>Daily Specials</h2>
        <div class="section">
            <img src="img/special.jpg" alt="Specials Image">
            <div class="info">
                <p>Every day is a new opportunity to try something special! We offer daily discounts on select items and feature exclusive treats available only for a limited time. <b><a href="specials.php" style="color: #d1004b; text-decoration: none;"> Check Today's Specials</a></b></p>
            </div>
        </div>
    </section>

    <section id="events">
        <h2>Events & Celebrations</h2>
        <div class="section">
            <img src="img/event.jpg" alt="Event Image">
            <div class="info">
                <p>Emcake Bakery is your destination for celebration! We host baking workshops, seasonal events, and custom orders for birthdays, weddings, and corporate events. Join us in making every occasion memorable. <b><a href="events.php" style="color: #d1004b; text-decoration: none;"> View Upcoming Events</a></b></p>
            </div>
        </div>
    </section>

    <section id="gallery">
        <h2>Gallery</h2>
        <div class="gallery">
            <div class="info">
                <p>Feast your eyes on our gallery of delicious creations. Our gallery showcases the vibrant flavors and stunning decorations that make Emcake Bakery unique. <b><a href="gallery.php" style="color: #d1004b; text-decoration: none;"> View Gallery</a></b></p>
            </div>
            <div class="gallery-item">
                <img src="img/gallery1.jpg" alt="Cake">
            </div>
            <div class="gallery-item">
                <img src="img/gallery2.jpg" alt="Cupcakes">
            </div>
            <div class="gallery-item">
                <img src="img/gallery3.jpg" alt="Pastries">
            </div>
        </div>
    </section>

    <script>
        let currentImageIndex = 0;
        let images = [];

        function openModal(imageUrl) {
            const modal = document.createElement('div');
            modal.classList.add('modal');

            images = Array.from(document.querySelectorAll('.gallery-item img')).map(img => img.src);
            currentImageIndex = images.indexOf(imageUrl);

            modal.innerHTML = `
                <span class="close" onclick="closeModal()">&times;</span>
                <img class="modal-content" src="${imageUrl}">
                <div class="modal-controls">
                    <span class="arrow left-arrow" onclick="changeImage(-1)">&#10094;</span>
                    <span class="arrow right-arrow" onclick="changeImage(1)">&#10095;</span>
                </div>
            `;
            document.body.appendChild(modal);
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.querySelector('.modal');
            if (modal) {
                modal.remove();
                document.body.style.overflow = '';
            }
        }

        function changeImage(direction) {
            currentImageIndex += direction;
            if (currentImageIndex >= images.length) {
                currentImageIndex = 0;
            } else if (currentImageIndex < 0) {
                currentImageIndex = images.length - 1;
            }
            const modalContent = document.querySelector('.modal-content');
            if (modalContent) {
                modalContent.src = images[currentImageIndex];
            }
        }
    </script>
</div>
</body>
</html>
<?php include 'footer.php'; ?>
