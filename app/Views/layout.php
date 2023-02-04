<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Treasure Hunt: <?= esc($title) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
  <style>
    @font-face {
      font-family: myFont;
      src: url("/assets/SwordskullPersonalUse-axqz5.ttf");
    }

    @font-face {
      font-family: Autumn;
      src: url("/assets/Autumn.otf");
    }

    .handwriting {
      font-family: Itim;
    }

    .logo-text {
      font-family: myFont;
      font-size: 72px;
      color: transparent;
      width: fit-content;
      background: linear-gradient(to right, #763288, #36151d);
      background-clip: text;
      -webkit-background-clip: text;
    }

    body {
      background-image: url("/assets/background.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
    }

    .myfont {
      font-family: myFont;
    }

    .autumn {
      font-family: Autumn;
    }

    .animation-button {
      background: transparent;
      color: #000;
      /* font-size: 17px; */
      /* text-transform: uppercase; */
      font-weight: 600;
      border: none;
      padding: 10px 30px;
      perspective: 30rem;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.308);
    }

    .animation-button::before {
      content: '';
      display: block;
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      border-radius: 10px;
      background: linear-gradient(320deg, rgba(0, 140, 255, 0.5), rgba(128, 0, 128, 0.3));
      /* z-index: 1; */
      transition: background 3s;
    }

    .animation-button:hover::before {
      animation: rotate 1s;
      transition: all .5s;
    }

    @keyframes rotate {
      0% {
        transform: rotateY(180deg);
      }

      100% {
        transform: rotateY(360deg);
      }
    }

    label,
    button,
    input {
      font-family: Autumn;
      font-size: 22px;
    }

    p,
    input {
      font-family: Itim;
    }

    .text-danger {
      font-size: 20px;
    }

    .key-eye{
      position:absolute;
      top:35%;
      right:4%;
      z-index:1;
      width:22px;
    }
    .question-eye{
      position:absolute;
      top:19%;
      right:6%;
      z-index:1;
      width:22px;
    }
  </style>
</head>

<body>
  <nav class="navbar p-0">
    <div class="container">
      <a class="navbar-brand mx-auto mt-3 p-0" href="#">
        <h3 class="logo-text mb-0">Treasure Hunt</h3>
      </a>
    </div>
  </nav>

  <?= $this->renderSection('content') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    document.querySelector('.key-eye').onmousedown= (e)=>{
  e.originalTarget.src="/assets/eye.svg";
      document.querySelector('#key').type='text';

}

document.querySelector('.key-eye').onmouseup= (e)=>{
  e.originalTarget.src="/assets/eye-slash.svg";
  document.querySelector('#key').type='password'
}

document.querySelectorAll('.question-eye').forEach((ele)=>{
ele.onmousedown= (e)=>{
  e.originalTarget.src="/assets/eye.svg";
      e.originalTarget.parentElement.querySelector('input').type='text';

}
ele.onmouseup= (e)=>{
  e.originalTarget.src="/assets/eye-slash.svg";
      e.originalTarget.parentElement.querySelector('input').type='password';

}
})
  </script>
</body>

</html>