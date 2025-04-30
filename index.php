
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anniversaire</title>
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
      color: #d6336c;
      position: relative;
    }

    /* Header initial en haut centré */
    #header {
      position: absolute;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 2.5em;
      font-weight: bold;
      z-index: 4;
      text-shadow: 1px 1px 5px rgba(0,0,0,0.2);
    }

    /* Prompt avant clic */
    #prompt {
      font-size: 1.2em;
      margin-bottom: 20px;
      animation: blink 1s step-start infinite;
      z-index: 3;
    }

    @keyframes blink {
      50% { opacity: 0; }
    }

    #gift {
      width: 220px;
      height: 220px;
      margin-bottom: 20px;
      cursor: pointer;
      z-index: 2;
      transform-origin: center center;
    }

    .gift-svg {
      width: 100%;
      height: 100%;
    }

    /* Diaporama agrandi */
    #slideshow {
      display: none;
      position: relative;
      width: 95vw;
      max-width: 700px;
      height: 70vh;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .image {
      /* Position centrée et taille d'origine sans découpe */
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: auto;
      height: auto;
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }

    .image.active {
      opacity: 1;
    }

    /* Message final centré et stylé */
    #message {
      display: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 4em;
      font-weight: bold;
      color: #ff3366;
      text-shadow: 3px 3px 10px rgba(0,0,0,0.3);
      z-index: 5;
      text-align: center;
      line-height: 1.2;
    }

  </style>
</head>
<body>
  <!-- Message initial en haut -->
  <div id="header">🎈 Joyeux Anniversaire ! 🎈</div>

  <!-- Message d'invite avant début -->
  <div id="prompt">Clique sur le cadeau pour commencer</div>

  <!-- Cadeau en SVG intégré -->
  <div id="gift">
    <svg class="gift-svg" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
      <rect x="8" y="20" width="48" height="36" fill="#ff6b6b" stroke="#d6336c" stroke-width="2"/>
      <path d="M32 20v-8a8 8 0 0 0-8 8h8zm0 0v-8a8 8 0 0 1 8 8h-8z" fill="#ff8787"/>
      <line x1="32" y1="20" x2="32" y2="56" stroke="#d6336c" stroke-width="2"/>
      <line x1="8" y1="36" x2="56" y2="36" stroke="#d6336c" stroke-width="2"/>
    </svg>
  </div>

  <!-- Diaporama d'images -->
  <div id="slideshow">
    <img class="image" src="images/1.jpg" alt="Image 1">
    <img class="image" src="images/2.jpg" alt="Image 2">
    <img class="image" src="images/3.jpg" alt="Image 3">
    <img class="image" src="images/4.jpg" alt="Image 4">
    <img class="image" src="images/12.jpg" alt="Image 5">
    <img class="image" src="images/6.jpg" alt="Image 6">
    <img class="image" src="images/7.jpg" alt="Image 7">
    <img class="image" src="images/8.jpg" alt="Image 8">
    <img class="image" src="images/10.jpg" alt="Image 9">
    <img class="image" src="images/11.jpg" alt="Image 10">
 </div>

  <!-- Message final -->
  <div id="message">🎂 Joyeux Anniversaire ! 🎉</div>

  <!-- Musique de fond -->
  <audio id="bg-music" loop>
    <source src="audios/BIRTHDAY.mp3" type="audio/mpeg">
    Votre navigateur ne supporte pas l'audio.
  </audio>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
  <script>
    const gift = document.getElementById('gift');
    const prompt = document.getElementById('prompt');
    const slideshow = document.getElementById('slideshow');
    const images = document.querySelectorAll('.image');
    const music = document.getElementById('bg-music');
    const message = document.getElementById('message');
    let currentIndex = 0;
    const duration = 3000;
    let intervalId;

    function showImage(index) {
      images.forEach(img => img.classList.remove('active'));
      images[index].classList.add('active');
    }

    function startSlideshow() {
      prompt.style.display = 'none';
      gift.style.display = 'none';
      header.style.display = 'none';
      slideshow.style.display = 'block';
      music.play().catch(() => {});
      showImage(0);
      let count = 0;
      intervalId = setInterval(() => {
        count++;
        if (count < images.length) {
          showImage(count);
        } else {
          clearInterval(intervalId);
          slideshow.style.display = 'none';
          message.style.display = 'block';
          // music continues playing
        }
      }, duration);
    }

    gift.addEventListener('click', () => {
      gsap.to(gift, { scale: 1.2, duration: 0.5, ease: 'back.out(1.7)', onComplete: startSlideshow });
    }, { once: true });
  </script>
</body>
</html>
