<?php

// echo "hello world <br>";

// $nama = "fadlan";
// $umur = 17;

// echo $nama ,"<br>",$umur;

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
        overflow-x: hidden;
    }

    /* .circle1 {
        width: 40%;
        height: 20%;
        background: rgba(255, 213, 0, 0.5);
        border-radius: 100%;
        position: absolute;
        top: 5%;
        left: 90%;
        transform: translate(-50%, -50%);
        animation: pulse 3s infinite ease-in-out;
    } */

    /* .circle2 {
        width: 40%;
        height: 20%;
        background: rgba(0, 179, 255, 0.5);
        border-radius: 100%;
        position: absolute;
        top: 7%;
        left: 87%;
        transform: translate(-50%, -50%);
        animation: pulse 3s infinite ease-in-out;
    }

    
    .circle3 {
        width: 40%;
        height: 20%;
        background: rgba(255, 0, 255, 0.5);
        border-radius: 100%;
        position: absolute;
        top: 9%;
        left: 85%;
        transform: translate(-50%, -50%);
        animation: pulse 3s infinite ease-in-out;
    }

    
    .circle4 {
        width: 40%;
        height: 20%;
        background: rgba(0, 179, 255, 0.5);
        border-radius: 100%;
        position: absolute;
        top: 11%;
        left: 83%;
        transform: translate(-50%, -50%);
        animation: pulse 3s infinite ease-in-out;
    } */


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

    body.dark, body.dark #home button{
        background-color: #111111;
        color: white;
        transition: background-color 0.8s, color 0.8s;
    }

    body.dark .project_content{
        color:black;
        transition: background-color 0.8s, color 0.8s;
    }

    body.dark #home button{
        border:white solid 1px
    }

    body.dark #project .project_header{
        background-color: #1A1A1A;
        color: white;
    }

    body.dark a, body.dark button{
        color: white;
        transition: background-color 0.8s, color 0.8s;
    }

    body.dark #project .project_content a{
        color:black;
    }

    body.dark #home, body.dark #contact, body.dark footer{
        background-color: #111111;
        transition: background-color 0.8s, color 0.8s;
    }


    body.dark #project{
        background-color: #1A1A1A;
        transition: background-color 0.8s, color 0.8s;
    }

    body.dark #about{
        background-color: #FDFBF7;
        transition: background-color 0.8s, color 0.8s;
        color:black;
    }

    body.dark #about .about_text, body.dark #project .filter_btn{
        color:black;
    }

    body.dark #about .about_photo img{
        box-shadow: 0 0 0.3125rem rgba(0, 0, 0, 0.5), 0 0 0.625rem rgba(0, 0, 0, 0.5), 0 0 1.25rem rgba(0, 0, 0, 0.5);
    }

    #menu{
        display:block;
        position:absolute;
        top:4rem;
        left:22rem;
    }
    
    nav {
        overflow: visible;
    }

    nav a {
        transition: all 0.5s ease;
        text-decoration: none;
        font-family: Orbitron,sans-serif;
        padding: 1rem 1rem 1rem 1rem;
        margin-right:2rem;
        font-weight:bold;
        color: black;
    }

    .topnav {
        display: flex;
        align-items:center;
        width:100%;
    }

    .icon{
        display:none;
    }

    mark{
        border-radius:0.3em;
        padding:0.4em;
        transition: all 0.5s ease;
    } 

    mark:hover{
        color:red;
    }

    #home , #project , #about ,#contact{
        height:100vh;
        display:flex;
        flex-direction:column;
        gap:0.4em;
        justify-content:center;
        align-items:center;
    }

    #home h1 , #project h1 , #about h1, #contact h1{
        text-align:center;
        font-family:Orbitron, sans-serif;
        font-weight:bold;
        font-size: 3em;
    }

    #home p ,#project , #contact p{
        text-align:center;
        font-family:sans-serif;
        font-weight:normal;
        font-size:1em;
    }

    #about p{
        color:white;
    }

    #home,#contact,footer{
        background-color: #FDFBF7;
        transition: background-color 0.8s, color 0.8s;
    }

    #project{
        background-color: #F5F5F5;
        transition: background-color 0.8s, color 0.8s;
    }

    #about{
        background-color: #111111;
        color:white;
        transition: background-color 0.8s, color 0.8s;
    }

    footer{
        text-align: center;
        padding: 0.9375em 0.625em;
        font-size: 0.875em;
    }

    #home button{
        background-color: #FDFBF7;
        font-weight:bold;
        font-family:Orbitron,sans-serif;
        border-radius: 10em;
        padding:1.1em;
        border: black solid 1px;
        transition: background-color 0.8s,color:0.8s;
        box-shadow: 0 0.40em 0.50em rgba(0, 0, 0, 0.1);
        cursor:pointer;
        color:black;
    }

    #home button:hover {
        border: black solid 1px;
        font-family:Orbitron, sans-serif;
        border-radius: 10em;
        transition: 0.8s, color 0.8s;
        padding:1.1em;
        cursor: pointer;
        box-shadow: 0 0.40em 0.50em rgba(0, 0, 0, 0.1);
    }


    #project .filter_btn {
        border: none;
        padding:1em;
        background-color:yellow;
        margin:2em;
        transition: all 0.5s ease;
        font-family: sans-serif;
        font-weight: bold;
        border-radius:0.7em;
        box-shadow: 0 0.5em 1em rgba(0,0,0,0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        cursor:pointer;
    }

    #project .filter_btn:hover{
        transform: translateY(-5px);
        box-shadow: 0 0.9em 2em rgba(0,0,0,0.2);
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
        border-radius: 0.2em;
        background-color: #FDFBF7;
        box-shadow: 0 0.40em 0.50em rgba(0, 0, 0, 0.4);
        width:15em;
        font-weight:bold;
        height:auto;
        margin:0.9em;
        padding:0.5em;
        justify-content:center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        color:black;
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
        background-color: rgba(255, 255, 255, 1);
        color: black;
        padding: 0.25em 0.5em;
        border-radius: 0.2em;
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
        width:60%;
    }

    #about .about_description {
        width:20em;
        margin:0.9em;
        padding:0.5em;
        display:flex;
        flex-direction:column;
        justify-content:center;
    }

    
    #about .about_description p.about_text{
        display:flex;
        justify-content:left;
        text-align:left;
        font-size:1em;
        font-family:sans-serif;
        font-weight:normal;
    }

    #about .about_photo img{
        width:45%;
        margin-top:2em;
        height:auto;
        border-radius:100%;
        border:0.0625em solid black;
        box-shadow: 0 0 0.3125rem rgba(255, 255, 255, 0.5), 0 0 0.625rem rgba(255, 255, 255, 0.5), 0 0 1.25rem rgba(255, 255, 255, 0.5);
    }

    @media screen and (min-width:721px) and (max-width: 1024px) {
        #home, #project, #about, #contact{
            height:auto;
            padding:7em;
        }

        #menu a span{
            visibility:hidden;
            opacity:0;
        }

        #menu a span{
            visibility:visible;
            opacity:1;
        }

        #home h1, #project h1, #about h1, #contact h1{
            font-size:1.4em; 
        }

        #home p ,#project ,#about p, #contact p{
            font-size:0.8em;
            font-weight:normal;
        }

        #home button{
            padding:0.5em;
        }

        #home button:hover{
            padding:0.5em;
        }

        #project .project_grid{
            width: 70%;
        }

        .navigation {
            width: 90%;
            font-size:0.8em;
        }

        #about .about_photo img {
            width: 25%;
        }
        }

    @media screen and (max-width: 720px) {
        #menu{
            width:100%;
            position:absolute;
            top:0rem;
            left:0rem;
     
        }

        .topnav {
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.9);
            position: relative;
            width:100%;
            display:block;
        }

        .topnav #myLinks {
            display: none;
        }

        .topnav a {
            color: white;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            display: block;
        }

        .topnav a.icon {
            background: transparent;
            display: block;
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .active {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
        }

        #home{
            margin-top:-7.5em;
        }

        #home h1 , #project h1, #about h1, #contact h1{
            font-size: 1em;
        }

        #project p , #about p, #contact p{
            font-size:0.8em;
            font-weight:normal;
        }


        #project .project_grid {
            width: 90%;
        }

        #project .project_content {
            width: 12em;
        }

        #about .about_photo img {
            width: 25%;
        }

        #about .about_description h2{
            font-size:1em;
        }
    }

    </style>
</head>
<body>
    <div class="circle1"></div>
    <div class="circle2"></div>
    <div class="circle3"></div>
    <div class="circle4"></div>

    <header>
            <nav id="menu" >
                    <div class="topnav">
                            <a class="active" href="#home"><i class="fa-solid fa-code"></i><mark>Fadlan Server</mark></a>
                        <div id="myLinks">  
                                <a href="#project"><i class="fa-solid fa-folder-open"></i>
                                <span>Project</span></a>
                                <a href="#about"><i class="fa-solid fa-user" ></i>
                                <span>About</span></a>
                                <a href="#contact"><i class="fa-solid fa-phone"></i>
                                <span>Contact</span></a>
                                <a id="btn"><i class="fa-solid fa-moon"></i>Theme</a>  
                        </div>
                            <a href="javascript:void(0);" class="icon" onclick="myfunction()">
                                <i class="fa fa-bars"></i>
                            </a>
                    </div>  
            </nav>
    </header>    

    <main>
        <section id="home">
            <h1 data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="0">Welcome to <mark>Fadlan server</mark></h1>
            <p data-aos="fade-up" data-aos-duration="1400" data-aos-delay="400">your gateway to my digital works</p>
                <a href="#project" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="800">        
                <a href="#project" data-aos="zoom-in-up" data-aos-duration="1200" data-aos-delay="800"><button>Get Started</button></a>
        </section>

        <section id="project">
                <h1 data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="0">Project Showcase</h1>
                <p data-aos="fade-down" data-aos-duration="1600" data-aos-delay="400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                <div class="filter_btn_collection">
                    <button class="filter_btn">All</button>
                    <button class="filter_btn">Web</button>
                    <button class="filter_btn">PHP</button>
                    <button class="filter_btn">UX Design</button>
                </div>
                <div class="project_grid" >
                    <div class="project_track">
                        <article class="project_content" >
                            <span class="project_header">Pilihan Ganda</span>
                            <img src="pilgan.png" alt="ilustration">
                            <p>Project ini adalah aplikasi kuis web sederhana yang menampilkan soal pilihan ganda, menghitung skor, dan menampilkan hasil jawaban lengkap dengan status benar atau salah.</p>
                            <a href="/MyProject/pilihanganda">Detail</a>
                        </article>   
                        <article class="project_content" >
                            <span class="project_header">Belajar PHP</span>
                            <img src="belajarphp.png" alt="ilustration">
                            <p>Project ini adalah program PHP sederhana untuk menampilkan data diri, menghitung penjumlahan, dan menampilkan daftar teman menggunakan variabel, array, dan echo.</p>
                            <a href="../belajar_php">Detail</a>
                        </article>    
                        <article class="project_content" >
                            <span class="project_header">Exmaple Project</span>
                            <img src="ilustration.jpg" alt="ilustration">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="/MyProject/pilihanganda">Detail</a>
                        </article>   

                        <article class="project_content">
                            <span class="project_header">Exmaple Project</span>
                            <img src="ilustration.jpg" alt="ilustration">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="/MyProject/pilihanganda">Detail</a>
                        </article>   
                    </div>
                </div>
        </section>

        <section id="about">
            <h1 data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="0">About Me</h1>
            <p data-aos="fade-down" data-aos-duration="1400" data-aos-delay="400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="about_container">
                <div class="about_photo" data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="400">
                    <img src="foto.png" alt="MY Profile">
                </div>
                <div class="about_description">
                    <h2>Hello i'm <br> <span>Fadlan Firdaus</span></h2>
                    <p class="about_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </section>

        <section id="contact">
            <h1 data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="0">Contact</h1>
            <p data-aos="fade-down" data-aos-duration="1400" data-aos-delay="400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </section>
    </main>

    <footer>
        <div class="footer_container">
                <a class="active" href="#home"><i class="fa-solid fa-code"></i><mark>Fadlan Server</mark></a>
                <hr>
                <p>&copy; 2025 Fadlan Server. All rights reserved.</p>
        </div>
    </footer>

<script>
    const words = [
        "Fadlan Server",
        "Discover More",
        "Stay Inspired",
        "Beyond Limits",
        "Bright Ideas",
        "Innovation Hub"
    ];

    let i = 0;
    const mark =document.getElementsByTagName("mark")[1];

    function changeword(){
        mark.textContent = words[i];
        i = (i+1)%words.length;
    }
    changeword();
    setInterval(changeword,2000);

    function myfunction() {
        var x = document.getElementById("myLinks");
        x.classList.toggle("show");
        if (x.style.display === "block") {
            x.style.display = "none";
        }else {
            x.style.display = "block";
        }
    }
    
    const body = document.body;
    const btn = document.getElementById("btn");
    btn.addEventListener("click", function(){
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            btn.innerHTML = '<i class="fa-solid fa-sun"></i> Theme';
        } else {
            btn.innerHTML = '<i class="fa-solid fa-moon"></i> Theme';
        }
    });
</script>    
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>