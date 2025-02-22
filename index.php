<?php
// Calculate days together
$startDate = new DateTime('2025-02-22');
$today = new DateTime();
$interval = $startDate->diff($today);
$daysTogether = $interval->days;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Days Together</title>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #ff4141;
            --secondary-color: #ff6b6b;
        }

        body {
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px 40px;
            border-radius: 40px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .title {
            font-family: 'Aclonica', sans-serif;
            font-size: 4rem;
            margin: 0;
        }

        .image-container {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .image-item {
            width: 200px;
            height: 200px;
            position: relative;
            overflow: hidden;
            border-radius: 25px;
            cursor: pointer;
        }

        .image-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .image-item:hover img {
            transform: scale(1.1);
        }

        .info-layer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 10px;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-item:hover .info-layer {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Days Together: <?= $daysTogether ?></h1>
        <p>Date Started: February 22, 2025</p>
        <div class="image-container" id="imageContainer">
            <!-- Images will be loaded here -->
        </div>
        <a href="admin.php" style="display:block; margin-top:20px; color:#333; text-decoration:none;">Admin Panel</a>
    </div>

    <script>
        fetch('images.json')
            .then(response => response.json())
            .then(images => {
                const container = document.getElementById('imageContainer');
                images.forEach(image => {
                    const imageDiv = document.createElement('div');
                    imageDiv.className = 'image-item';
                    imageDiv.innerHTML = `
                        <img src="uploads/${image.filename}" alt="Memory">
                        <div class="info-layer">
                            <div class="date">${image.date}</div>
                            <div class="place">${image.place}</div>
                        </div>
                    `;
                    container.appendChild(imageDiv);
                });
            });
    </script>
</body>
</html>