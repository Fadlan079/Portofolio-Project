<?php
    if (! empty($_GET['q'])) {
        $query = htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8');

        switch ($query) {
            case 'info':
                phpinfo();
                exit;
            default:
                header("HTTP/1.0 404 Not Found");
                echo "Invalid query parameter.";
                exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fadlan Server</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
    html,

    html{
        font-size:16px;
        scroll-behavior: smooth;
    }

    .background_pattern {
        position: fixed;
        inset: 0;
        background-image: radial-gradient(rgba(191, 164, 143, 1) 0.125rem, transparent 0.125rem);
        background-size: 1.875rem 1.875rem;
        -webkit-mask-image: radial-gradient(circle 3.75rem at var(--x, 50%) var(--y, 50%), rgba(0,0,0,1) 100%, transparent 100%);
        -webkit-mask-repeat: no-repeat;
        -webkit-mask-position: center;
        pointer-events: none; 
    }

    body {
        color: black;
        margin: 0;
        padding: 0;
        font-family: Orbitron ,sans-serif;
        font-weight: 100;
        position:relative;
        transition: background-color 0.8s, color 0.8s;
        background-color: white;
        overflow-x:hidden
    }

    body.dark{
        background-color: #3C3C3D;
        color: white;
        transition: background-color 0.8s, color 0.8s;
}

    body.dark a, body.dark button{
        color: white;
        transition: background-color 0.8s, color 0.8s;
    }
    
    nav {
        overflow: visible;
    }

    nav ul {
        list-style: none;
        margin:0rem;
        padding:0rem;
        display:flex;
    }

    nav ul li a {
        transition: color 0.3s ease;
        text-decoration: none;
        justify-content:center;
        font-family: Orbitron;
        padding: 1rem 1rem 1rem 1rem;
        margin-right:2rem;
        display: block;
        font-weight:bold;
    }

    nav ul li a:hover {
        background-color:rgba(0, 0, 0, 0.1);
        backdrop-filter:blur(10rem);
        color: darkgrey;
        cursor: pointer;
        border-radius:10rem;
    }

    .navigation a::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 0.125rem;
        background-color: #BFA48F;
        transition: width 0.3s ease; 
    }

    .navigation a:hover {
        color: #BFA48F;
    }

    .navigation a:hover::after {
         width: 100%;
    }

    .navigation {
        position:relative;
        top: 3rem;
        margin: 0rem auto;
        width:70%;
        border-radius:10em;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color:rgba(0, 0, 0, 0.4);
        backdrop-filter:blur(10rem);
        box-shadow: 0 0.25rem 0.30rem rgba(0, 0, 0, 0.3);
    }

    .navigation p{
        padding-left:1em;
        font-family:Orbitron;
        font-weight:bold;
    }

    .navigation button {
        border:none;
        border-radius: 10em;
        box-shadow: 0 0.25rem 0.30rem rgba(0, 0, 0, 0.2);
        backdrop-filter:blur(10em);
        padding:1.1em;
        background-color: transparent;
        transition: background-color 0.8s color:0.8s;
        cursor:pointer;
    }

    .navigation button:hover {
        border:none;
        border-radius: 10em;
        background-color:rgba(0, 0, 0, 0.1);
        box-shadow: 0 0.25em 0.30em rgba(0, 0, 0, 0.2);
        padding:1.1em;
        color: #BFA48F;
        cursor: pointer;

    }

    .tooltip {
        position: relative;
        display: inline-block;
        color: black;
    }

    .tooltiptext {
        visibility: hidden;
        opacity: 0;
        background-color: rgba(0, 0, 0, 1);
        color: white;
        text-align: center;
        padding: 0.25em 0.5em;
        border-radius: 0.25em;
        position: absolute;
        left: 50%;
        bottom:125%;
        transform: translateX(-50%);
        transition: opacity 0.8s;
        white-space: nowrap;
        font-size: 0.75em;
        z-index: 1; 
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
        opacity: 1;
    }

    #home , #project , #about{
        height:100vh;
        display:flex;
        flex-direction:column;
        gap:0.4em;
        justify-content:center;
        align-items:center;
    }

    #home h1 , #project h1 , #about h1{
        text-align:center;
        font-family:Orbitron;
        font-weight:bold;
        font-size: 3em;
    }

    #home p ,#project ,#about p{
        text-align:center;
        font-family:Orbitron;
        font-size:1em
    }

    #home button{
        border:none;
        font-weight:bold;
        font-family:Orbitron;
        border-radius: 0.5em;
        box-shadow: 0 0.40em 0.50em rgba(0, 0, 0, 0.4);
        backdrop-filter:blur(10em);
        padding:1.1em;
        background-color: rgba(0,0,0, 0.4);
        transition: background-color 0.8s color:0.8s;
        cursor:pointer;
    }

    #home button:hover {
        border:none;
        font-family:Orbitron;
        border-radius: 0.5em;
        background-color:rgba(0, 0, 0, 0.5);
        backdrop-filter:blur(10em);
        box-shadow: 0 0.25em 0.30em rgba(0, 0, 0, 0.4);
        transition: background-color 0.8s, color 0.8s;
        padding:1.1em;
        color: #BFA48F;
        cursor: pointer;
    }

    #project h2{
        font-size:1em;
        font-family:Orbitron ,sans-serif;
        text-align:left;
    }

    #project .project_grid p{
        font-size:0.7em;
        font-family:sans-serif;
        text-align:left;
    }

    #project .project_grid{
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scrollbar-color: rgba(0, 0, 0, 0.2) transparent;
        width:70%;
    }

    #project .project_track{
        display:flex;
        gap: 1em;
        width: max-content;
        scroll-behavior: smooth;
    }

    #project .project_content{
        flex: 0 0 15;
        scroll-snap-align: center;
        border-radius: 0.3em;
        background-color:rgba(0, 0, 0, 0.1);
        box-shadow: 0 0.40em 0.50em rgba(0, 0, 0, 0.4);
        width:15em;
        height:auto;
        margin:0.9em;
        padding:0.5em;
        justify-content:center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    #project .project_content:hover{
        transform: scale(1.05);
        box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.3);
        z-index: 2;
    }

    #project .project_content img{
        margin-top:0.5em;
        width:96%;
        height:auto;
        border-radius:0.3em;
        display:block;
        object-fit:cover;

    }

    #project .project_content a{
        display:block;
        text-align:right;
        color: black;
    }

    #project .project_content{
        position: relative;
        overflow:hidden;
    }

    #project .project_header{
        visibility: hidden;
        opacity: 0;
        top:0;
        left:0;
        width:100%;
        height:20%;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 0.25em 0.5em;
        border-radius: 0.25em;
        position: absolute;
        transform: translateY(-100%);
        transition: opacity 0.5s;
        transition: all 0.4s ease-in-out;
        white-space: nowrap;
        font-size: 0.75em;
        z-index: 1; 

        display:flex;
        justify-content:center;
        align-items:center;

    }

    #project .project_content:hover .project_header{
        visibility: visible;
        transform:translateY(0%);
        opacity: 1;
    }


    #about .about_container{
        display:flex;
        flex-wrap:wrap;
        justify-content:space-between;
    }

    #about .about_description {
        width:20em;
        margin:0.9em;
        padding:0.5em;
        display:flex;
        flex-direction:column;
        justify-content:center;
    }

    #about .about_photo img{
        width:50%;
        height:auto;
    }

    @media screen and (max-width: 1024px) {
    .navigation {
        width: 90%;
    }

    #about .about_container {
        flex-direction: column;
        align-items: center;
    }

    #about .about_photo img {
        width: 70%;
    }
    }

    @media screen and (max-width: 600px) {
    nav ul {
        flex-direction: column;
        align-items: center;
    }

    nav ul li a {
        margin: 0.5rem 0;
    }

    #home h1 {
        font-size: 2em;
    }

    #project .project_grid {
        width: 90%;
    }

    #project .project_content {
        width: 12em;
    }

    #about .about_photo img {
        width: 100%;
    }
    }

    </style>
</head>
<body>
    <div class="background_pattern"></div>

    <header 
     class="navigation" data-aos="fade-down"
     data-aos-delay="400"
     data-aos-duration="1500">
        <p data-aos="zoom-out" data-aos-duration="1600" data-aos-delay="400">Fadlan Server</p>
            <nav>
                <ul>
                    <li data-aos="fade-left" data-aos-duration="1300" data-aos-delay="0">
                        <a href="index.php"  class="tooltip"><i class="fa-solid fa-house"></i>
                        <span class="tooltiptext">Home</span>   
                        </a>
                    </li>
                    <li data-aos="fade-left" data-aos-duration="1300" data-aos-delay="400">
                        <a href="#project" class="tooltip"><i class="fa-solid fa-folder-open"></i>
                    <span class="tooltiptext">Project</span></a>
                    </li>
                    <li data-aos="fade-left" data-aos-duration="1300" data-aos-delay="800">
                        <a href="#about" class="tooltip"><i class="fa-solid fa-user" ></i>
                    <span class="tooltiptext">About</span></a>
                    </li>
                    <li data-aos="fade-left" data-aos-duration="1300" data-aos-delay="1200">
                        <a href="#contact" class="tooltip"><i class="fa-solid fa-phone"></i>
                    <span class="tooltiptext">Contact</span></a>
                    </li>
                </ul>
            </nav>
        <button id="btn"><i class="fa-solid fa-moon"></i></button>
    </header>    

    <main>
        <section id="home">
            <h1 data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="0">Welcome to Fadlan Server</h1>
            <p data-aos="fade-up" data-aos-duration="1400" data-aos-delay="400">your gateway to my digital works</p>
                <a href="#project" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="800"><button >Get Started</button></a>
        </section>

        <section id="project">
                <h1 data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="0">Project Showcase</h1>
                <p data-aos="fade-down" data-aos-duration="1600" data-aos-delay="400">Discover the stories behind my projects, the challenges I've faced, and the creative solutions I've built along the way.</p>
                <div class="project_grid" >
                    <div class="project_track">
                        <article class="project_content" data-aos="zoom-in-down" data-aos-duration="2000" data-aos-delay="400">
                            <span class="project_header">Exmaple Project</span>
                            <img src="ilustration.jpg" alt="ilustration">
                            <h2>Example Project</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="/MyProject/pilihanganda">Detail</a>
                        </article>   
                        <article class="project_content" data-aos="zoom-in-down" data-aos-duration="2000" data-aos-delay="800">
                            <span class="project_header">Exmaple Project</span>
                            <img src="ilustration.jpg" alt="ilustration">
                            <h2>Example Project</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="/MyProject/pilihanganda">Detail</a>
                        </article>    
                        <article class="project_content" data-aos="zoom-in-down" data-aos-duration="2000" data-aos-delay="1200">
                            <span class="project_header">Exmaple Project</span>
                            <img src="ilustration.jpg" alt="ilustration">
                            <h2>Example Project</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="/MyProject/pilihanganda">Detail</a>
                        </article>   

                        <article class="project_content" data-aos="zoom-in-down" data-aos-duration="2000" data-aos-delay="1600">
                            <span class="project_header">Exmaple Project</span>
                            <img src="ilustration.jpg" alt="ilustration">
                            <h2>Example Project</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="/MyProject/pilihanganda">Detail</a>
                        </article>   
                        <article class="project_content">
                            <span class="project_header">Exmaple Project</span>
                            <img src="ilustration.jpg" alt="ilustration">
                            <h2>Example Project</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="/MyProject/pilihanganda">Detail</a>
                        </article>    
                        <article class="project_content" >
                            <span class="project_header">Exmaple Project</span>
                            <img src="ilustration.jpg" alt="ilustration">
                            <h2>Example Project</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="/MyProject/pilihanganda">Detail</a>
                        </article>  

                    </div>
                </div>
        </section>

        <section id="about">
            <h1 data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="0">About Me</h1>
            <p data-aos="fade-down" data-aos-duration="1400" data-aos-delay="400">Discover the stories behind my projects, the challenges I've faced, and the creative solutions I've built along the way.</p>
            <div class="about_container">
                <div class="about_description">
                    <h2>Hello i'm <br> <span>Fadlan Firdaus</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="about_photo">
                    <img src="profil.png" alt="MY Profile">
                </div>
            </div>
        </section>
    </main>
        

<script>
    window.addEventListener("load", () => {
        AOS.init();
        setTimeout(() => {
            window.scrollTo({ top: 0, left: 0, behavior: 'instant' });
        }, 50);
    });

    const body = document.body;
    const btn = document.getElementById("btn");
    btn.addEventListener("click", function(){
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            btn.innerHTML = '<i class="fa-solid fa-sun"></i>';
        } else {
            btn.innerHTML = '<i class="fa-solid fa-moon"></i>';
        }
    });

    document.addEventListener("mousemove", e => {
    document.querySelector(".background_pattern").style.setProperty("--x", e.clientX + "px");
    document.querySelector(".background_pattern").style.setProperty("--y", e.clientY + "px");
});
</script>    
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>