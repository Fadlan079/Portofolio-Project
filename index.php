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

    body.dark #menu, body.dark #home, body.dark footer{
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

    body.dark header nav a, body.dark footer .quick_links a{
        color: #F5F5F5;
        transition: all 0.5s ease;
    }

    body.dark footer .quick_links a:hover{
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
    } 

    .on{
        background-color: #1A1A1A;
        color: #F5F5F5;
        padding-bottom:1.1em;
    }

    #home{
        background-color: #F5F5F5;
        width: 70%;
        margin: 10em auto;
        border-radius: 0.5em;
        padding: 5em;
        box-shadow: 0 0.5em 1em rgba(0,0,0,0.2);
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
        transition: all 0.5s ease;
        transform:translateY(-5px);
        box-shadow: 0 0.40em 0.50em rgba(0, 0, 0, 0.3);
    }

    footer a{
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

    footer a:hover{
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

    footer .quick_links a{
        color: black;
        width: 7em;
    }

    footer .quick_links a:hover{   
        color: #F5F5F5;
        background-color: #1A1A1A;
    }

    footer li{
        list-style: none;
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
            background-color: rgba(0, 0, 0, 1);
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
            background-color: rgba(0, 0, 0, 1);
            color: white;
        }

        #home h1{
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
                        <a href="#project"><i class="fa-solid fa-folder-open"></i>
                        <span>Project</span></a>
                        <a href="about.html"><i class="fa-solid fa-user" ></i>
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
            <a href="">Get Started</a></a>
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
                <p><i><strong>"Hidup ini seperti coding. lebih banyak else daripada if yang di harapkan."</strong></i></p>
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