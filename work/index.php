<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>1 Year Anniversary</title>
  <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
      background-color: #fff0f5;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      overflow: hidden;
    }
    .container {
      text-align: center;
      animation: fadeIn 2s ease-in-out;
    }
    .image {
      display: none;
      width: 100%;
      max-width: 250px;
      height: auto;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    h1 {
      color: #d6336c;
      font-size: 2em;
      margin-bottom: 20px;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }
    .confetti {
      position: absolute;
      top: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      background-image: url('https://cdn.pixabay.com/photo/2020/03/20/16/10/confetti-4950000_960_720.png');
      background-size: cover;
      opacity: 0.2;
      z-index: 0;
    }
  </style>
</head>
<body>
  <h1 id="message">Joyeux Anniversaire ! 🎉</h1>     
  <div class="confetti"></div>
  <div class="container">
    <img class="image" id="image1" src="images/1.jpg" alt="Image 1">
    <img class="image" id="image2" src="images/2.jpg" alt="Image 2">
    <img class="image" id="image3" src="images/3.jpg" alt="Image 3">
    <img class="image" id="image4" src="images/4.jpg" alt="Image 4">
    <img class="image" id="image5" src="images/5.jpg" alt="Image 5">
    <img class="image" id="image6" src="images/6.jpg" alt="Image 6">
    <img class="image" id="image7" src="images/7.jpg" alt="Image 7">
    <img class="image" id="image8" src="images/8.jpg" alt="Image 8">
  </div>
  
  <audio id="birthdayAudio" autoplay loop>
    <source src="<?php echo 'audios/BIRTHDAY.mp3'; ?>" type="audio/mpeg">
    Votre navigateur ne supporte pas l'audio.
  </audio>

  <script>
    let currentImageIndex = 0;
    const images = document.querySelectorAll('.image');
    const totalImages = images.length;
    const displayDuration = 3000; // Durée d'affichage de chaque image en ms

    function showNextImage() {
      if (currentImageIndex > 0) {
        images[currentImageIndex - 1].style.display = 'none'; // Masque l'image précédente
      }
      images[currentImageIndex].style.display = 'block'; // Affiche l'image actuelle
      currentImageIndex = (currentImageIndex + 1) % totalImages; // Passe à l'image suivante
      setTimeout(showNextImage, displayDuration); // Appelle la fonction après un délai
    }

    // Démarre le diaporama
    showNextImage();
  </script>
</body>
</html>