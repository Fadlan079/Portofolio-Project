<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/src/css/output.css">
</head>
<style>
    .bg-carbon {
        background-color: #0a0a0a;
        background-image:
            linear-gradient(45deg, rgba(255,255,255,0.04) 25%, transparent 25%),
            linear-gradient(-45deg, rgba(255,255,255,0.04) 25%, transparent 25%),
            linear-gradient(45deg, transparent 75%, rgba(255,255,255,0.04) 75%),
            linear-gradient(-45deg, transparent 75%, rgba(255,255,255,0.04) 75%);
        background-size: 18px 18px;
        background-position: 0 0, 0 9px, 9px -9px, -9px 0px;
    }
</style>
<body class="bg-neutral-950">

  <!-- <div class="bg-white/30 backdrop-blur-lg p-10 rounded-2xl shadow-lg">
    <h1 class="text-2xl font-bold text-white">Halo, ini blur!</h1>
    <p class="text-white">Kalau ini ga ngeblur → masalah browser / support</p>
  </div> -->

  <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_rgba(16,185,129,0.15),_transparent_70%)]"></div>

</body>
</html>