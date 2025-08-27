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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
    html,

    html{
        font-size:16px;
        overflow-x: hidden;
    }

    body {
        color: black;
        margin: 0;
        padding: 0;
        font-family:sans-serif;
        transition: all 0.5s ease;
        background-color: white;
        overflow-x:hidden
    }
    
    body.dark{
        background-color: black;
        transition: all 0.5s ease;
    }

    body.dark header{
        background-color: #F5F5F5;
        transition: all 0.5s ease;
    }


    body.dark #menu, body.dark #home, body.dark #ringkasan_project,body.dark #ringkasan_about,body.dark footer{
        color: #F5F5F5;
        background-color: #1A1A1A;
        transition: all 0.5s ease;
    }

    body.dark .on{
        color: #1A1A1A;
        background-color: #F5F5F5;
        transition: all 0.5s ease;
    }

    body.dark mark{
        background-color: #F5F5F5;
        color: #1A1A1A;
        transition: all 0.5s ease;
    }

    body.dark header nav a, body.dark footer .quick_links a, body.dark #ringkasan_about a,body.dark #ringkasan_project a{
        color: #F5F5F5;
        transition: all 0.5s ease;
    }

    body.dark footer .quick_links a:hover, body.dark #ringkasan_about a:hover,body.dark #ringkasan_project a:hover{
        color:#1A1A1A;
        background-color: #F5F5F5;
        transition: all 0.5s ease;
    }

    body.dark #home a{
        background-color: #1A1A1A;
        color: #F5F5F5;
        transition: all 0.5s ease;
    }

    #menu{
        display:block;
        position:fixed;
        top:0;
        left:0;
        background-color:#F5F5F5;
        width: 100%;
        z-index: 1;
    }
    
    header nav {
        overflow: visible;
    }

    header nav a {
        transition: all 0.5s ease;
        text-decoration: none;
        font-family: sans-serif;
        padding: 1rem 1rem 1rem 1rem;
        margin-right:2rem;
        font-weight:bold;
        color: black;
    }

    .topnav {
        display: flex;
        align-items:center;
        justify-content: center;
        width:100%;
    }

    .icon{
        display:none;
    }

    mark{
        border-radius:0.5em;
        padding:0.5em;
        transition: all 0.5s ease;
        background-color: #1A1A1A;
        color: #F5F5F5;
        z-index: 0;
    } 

    .on{
        background-color: #1A1A1A;
        color: #F5F5F5;
        padding-bottom:1.1em;
    }

    #home, #ringkasan_project, #ringkasan_about{
        height:100vh;
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
    }

    #home h1 {
        font-weight:bold;
        font-size: 3em;
    }

    #home a{
        background-color: #FDFBF7;
        border-radius: 0.5em;
        padding:1.1em;
        transition: all 0.5s ease;
        box-shadow: 0 0.40em 0.50em rgba(0, 0, 0, 0.2);
        cursor:pointer;
        color:black;
        text-decoration:none;
        font-weight:bold;
    }

    #home a:hover {
        background-color: #1a1a1a;
        color: #f5f5f5;
        transition: all 0.5s ease;
        transform:translateY(-5px);
        box-shadow: 0 0.40em 0.50em rgba(0, 0, 0, 0.3);
    }

    #ringkasan_project{
        margin:10em;
    }

    #ringkasan_project .grid{
        display:flex;
    }

    #ringkasan_project article{
        box-shadow: 0 0.5em 1em rgba(0,0,0,0.3); 
        border-radius: 0.5em;
        overflow: hidden;
        margin: 1em;
    }

    #ringkasan_project img{
        width: 100%;
    }

    #ringkasan_project .deskripsi{
        padding:1em;
    }

    footer a, #ringkasan_about a,#ringkasan_project a{
        display: inline-block;
        text-decoration: none;
        padding: 0.5em;
        margin: 0.3em;
        border-radius: 0.3em;
        color: white;
        transition: all 0.5s ease;
        cursor: pointer;
        box-shadow: 0 0.5em 1em rgba(0,0,0,0.2);
    }

    footer a:hover, #ringkasan_about a:hover,#ringkasan_project a:hover{
        transform: translateY(-5px);
        background-color: white;
        box-shadow: 0 0.5em 1em rgba(0,0,0,0.3); 
    }

    footer .github{background-color: black;}
    footer .email{background-color: red;}
    footer .linkedin{background-color: #0A66C2;}

    footer .github:hover{
        color: black;
    }

    footer .email:hover{
        color: red;
    }

    footer .linkedin:hover{
        color: #0A66C2;
    }

    footer .grid{
        display:flex;
        justify-content: space-between;
        text-align: center;
    }

    footer{
        font-size: 0.875em;
        background-color: #F5F5F5;
        height: auto;
        color:  #1A1A1A;
        padding: 1em;
    }

    footer p{
        text-align: center;
    }

    footer .quick_links a, #ringkasan_about a,#ringkasan_project a{
        color: black;
        width: 7em;
    }

    footer .quick_links a:hover, #ringkasan_about a:hover,#ringkasan_project a:hover{   
        color: #F5F5F5;
        background-color: #1A1A1A;
    }

    footer li{
        list-style: none;
    }

    @media screen and (min-width:721px) and (max-width:1024px){
        body.dark .topnav, body.dark .on, body.dark .active, body.dark .topnav a{
            background-color: #1a1a1a;
            color: #f5f5f5;
            transition: all 0.5s ease;
        }

        body.dark  .topnav a:hover {
            background-color: #f5f5f5;
            color: #1a1a1a;
        }

        #menu{
            width:100%;
            position:fixed;
            top:0rem;
            left:0rem;
            z-index: 1;
        }

        .topnav {
            overflow: hidden;
            background-color: #f5f5f5;
            position: relative;
            width:100%;
            display:block;
        }

        .topnav #myLinks {
            display: none;
        }

        .topnav a {
            color: #1a1a1a;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            display: block;
        }

        .topnav a:hover {
            background-color: #1a1a1a;
            color: #f5f5f5;
        }

        .topnav a.icon {
            background: transparent;
            color: #1a1a1a;
            display: block;
            position: absolute;
            right: 0;
            top: 0;
        }

        .active {
            background-color: #f5f5f5;
            color: #1a1a1a;
        }

        #ringkasan_about h2, #ringkasan_project h2{
            font-size: 1em;
        }

        #ringkasan_about p, #ringkasan_project p{
            font-size:0.8em;
        }

        mark{
            z-index: 0;
            padding: 0.2em;
        }

        #ringkasan_project .grid{
            display:block;
            width:60%;
            margin: 0 auto;
        }

        .on{
            background-color: #f5f5f5;
            color: #1a1a1a;
        }

        footer p{
            font-size: 1em;
        }

    }

    @media screen and (max-width: 720px) {
        body.dark .topnav, body.dark .on, body.dark .active, body.dark .topnav a{
            background-color: #1a1a1a;
            color: #f5f5f5;
            transition: all 0.5s ease;
        }

        body.dark  .topnav a:hover {
            background-color: #f5f5f5;
            color: #1a1a1a;
        }

        #menu{
            width:100%;
            position:fixed;
            top:0rem;
            left:0rem;
            z-index: 1;
        }

        .topnav {
            overflow: hidden;
            background-color: #f5f5f5;
            position: relative;
            width:100%;
            display:block;
        }

        .topnav #myLinks {
            display: none;
        }

        .topnav a {
            color: #1a1a1a;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            display: block;
        }

        .topnav a.icon {
            background: transparent;
            color: #1a1a1a;
            display: block;
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav a:hover {
            background-color: #1a1a1a;;
            color: #f5f5f5;
        }

        .active {
            background-color: #f5f5f5;
            color: #1a1a1a;
        }

        #home h1{
            font-size: 2em;
        }

        #ringkasan_about h2, #ringkasan_project h2{
            font-size: 1em;
        }

        #ringkasan_about p, #ringkasan_project p{
            font-size:0.8em;
        }

        mark{
            z-index: 0;
            padding: 0.2em;
        }

        #ringkasan_project .grid{
            display:block;
        }

        .on{
            background-color: #f5f5f5;
            color: #1a1a1a;
        }

        footer p{
            font-size: 1em;
        }

    }
    </style>
</head>
<body>
    <header>
        <nav id="menu" >
            <div class="topnav">
                <a class="active" href="#home"><i class="fa-solid fa-code"></i><mark>Fadlan Server</mark></a>
                <div id="myLinks">  
                    <a class="on" href="index.php"><i class="fa-solid fa-house"></i>
                    <span>Home</span></a>
                    <a href="project.html"><i class="fa-solid fa-folder-open"></i>
                    <span>Project</span></a>
                    <a href="about.html"><i class="fa-solid fa-user" ></i>
                    <span>About</span></a>
                    <a href="#contact"><i class="fa-solid fa-phone"></i>
                    <span>Contact</span></a>
                    <a id="btn"><i class="fa-solid fa-moon"></i>Theme</a>  
                    <a href="#">Login <i class="fa-solid fa-right-to-bracket"></i></a>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="myfunction()">
                <i class="fa fa-bars"></i>
                </a>
            </div>  
        </nav>
        <section id="home">
            <h1 data-aos="zoom-in" data-aos-duration="1200" data-aos-delay="0">Welcome to <mark>Fadlan server</mark></h1>
            <p data-aos="fade-up" data-aos-duration="1400" data-aos-delay="400">your gateway to my digital works</p>
            <a href="">Get Started</a></a>
        </section>
    </header>    
    <main>
        <section id="ringkasan_about">
            <h2>About Me</h2>
            <p>Lulusan Ilmu Komputer dengan fokus pada pengembangan web, menguasai Python, PHP, JavaScript, HTML, dan CSS. Berpengalaman membangun proyek nyata melalui akademik dan magang.....</p>
            <a href="about.html"><b>Learn More <i class="fa-solid fa-arrow-right"></i></b></a>
        </section>
        <section id="ringkasan_project">
            <h2>My Projects</h2>
            <div class="grid">
                <article>
                    <img src="ilustration.jpg" alt="ilustration">
                    <div class="deskripsi">
                        <h5>Contoh proyek</h5>
                        <p>Autentikasi dasar dengan hashing, session, dan validasi form server-side.</p>
                        <a href="#"><i class="fa-solid fa-link"></i> Lihat Repo</a>
                    </div>
                </article>
                <article>
                    <img src="ilustration.jpg" alt="ilustration">
                    <div class="deskripsi">
                        <h5>Contoh proyek</h5>
                        <p>Autentikasi dasar dengan hashing, session, dan validasi form server-side.</p>
                        <a href="#"><i class="fa-solid fa-link"></i> Lihat Repo</a>
                    </div>
                </article>
                <article>
                    <img src="ilustration.jpg" alt="ilustration">
                    <div class="deskripsi">
                        <h5>Contoh proyek</h5>
                        <p>Autentikasi dasar dengan hashing, session, dan validasi form server-side.</p>
                        <a href="#"><i class="fa-solid fa-link"></i> Lihat Repo</a>
                    </div>
                </article>
            </div>
            <a href="project.html"><b>Learn More <i class="fa-solid fa-arrow-right"></i></b></a>
        </section>
    </main>
    <footer>
        <div class="grid">
            <div>
                <h3>Fadlan Server</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="quick_links">
                <nav>
                    <ul>
                        <li>
                            <a href="index.php"><i class="fa-solid fa-house"></i>
                            <span>Home</span> </a>   
                        </li>
                        <li>
                            <a href="#project"><i class="fa-solid fa-folder-open"></i>
                            <span>Project</span></a>
                        </li>
                        <li>
                            <a href="about.html"><i class="fa-solid fa-user" ></i>
                            <span>About</span></a>
                        </li>
                        <li>
                            <a href="#contact"><i class="fa-solid fa-phone"></i>
                            <span>Contact</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div>
                <h3>Mari Terhubung</h3>
                <a class="github" href="https://github.com/Fadlan079" target="_self"><i class="fa-brands fa-github"></i></a>
                <a class="email" href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWstptjhccStvXLcpRwqBXlZvFNkHJRlQMXlVcvjHsLhBBkwwwJdjpsgMWfhhxBwnzLNLqHNb" target="_self"><i class="fa-solid fa-envelope"></i></a>
                <a class="linkedin" href="#" target="_self"><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>
        <hr>
        <p>&copy; 2025 Fadlan. All rights reserved</p>
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
        var a = document.getElementById("myLinks");
        a.classList.toggle("show");
        if (a.style.display === "block") {
            a.style.display = "none";
        }else {
            a.style.display = "block";
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