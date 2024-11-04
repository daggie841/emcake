<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Gallery</title>
    <style>
        .gallery {
            background-color:pink;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 10px;
            padding: 10px;
        }

        .gallery-item {
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .gallery-item img {
            display: block;
            width: 100%;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        /* Modal styles */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .modal-controls {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 10%;
            display: flex;
            justify-content: space-between;
            z-index: 1100;
        }

        .close {
            position: absolute;
            top: 15px;
            right: 15px;
            color: white;
            font-size: 30px;
            cursor: pointer;
        }

        .modal-controls .arrow {
            color: white;
            font-size: 40px;
            cursor: pointer;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 100%;
        }
    </style>
</head>
<body>

<div class="gallery">
    <div class="gallery-item">
         <p>Birthday cake</p>
        <img src="img/1.png" alt="Hotel Room" onclick="openModal('img/1.png')">
    </div>
    <div class="gallery-item">
        <p>Graduation cake</p>
        <img src="img/2.jpeg" alt="Bedroom" onclick="openModal('img/2.jpeg')">
    </div>
    <div class="gallery-item">
        <p1>aniversary cake</p>
        <img src="img/5.Jpeg" alt="events" onclick="openModal('img/5.jpeg')">
    </div>
     <div class="gallery-item">
        <p>Wedding Cake</p>
        <img src="img/11.jpeg" alt="Bedroom" onclick="openModal('img/11.jpeg')">
    </div>
      <div class="gallery-item">
        <img src="img/e.png" alt="Bedroom" onclick="openModal('img/e.png')">
    </div>
     <div class="gallery-item">
        <img src="img/5.jpeg" alt="hotel" onclick="openModal('img/5.jpeg')">
    </div>
     <div class="gallery-item">
        <img src="img/l.png" alt="food" onclick="openModal('img/l.png')">
    </div>
    <div class="gallery-item">
        <img src="img/7.jpeg" alt="Restaurant" onclick="openModal('img/7.jpeg')">
    </div>
    
</div>
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
        document.body.style.overflow = 'hidden'; // Prevent scrolling when modal is open
    }

    function closeModal() {
        const modal = document.querySelector('.modal');
        if (modal) {
            modal.remove();
            document.body.style.overflow = ''; // Re-enable scrolling
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

</body>
</html>

<?php include 'footer.php'; ?>
