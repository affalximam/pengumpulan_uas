<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 NOT FOUND</title>
    <link rel="stylesheet" href="/aset/css/bootstrap.min.css">
    <link rel="stylesheet" href="/aset/css/style.css">
    <link rel="shortcut icon" href="/aset/Images/icon.jpeg" type="image/x-icon">
    <style>
        body{
            background-color: black;
        }

        .container{
            width: 300px;
            height: 100%;
            margin: 30vh auto;
            padding: auto;
            position: relative;
            animation: blink 3s linear infinite;
            padding: 5px;
        }

        h1 {
            display: flex;
            font-size: 3em;
            text-align: center;
            color: white;
            text-decoration: none;
            border-radius: 0px;
            border: 0px;
            color: white, red;
            text-shadow:    2px 2px 2px red,
                            0 0 1px white,
                            -2px -2px 2px white;
            padding: 20px solid red;
            animation: jigjag 0.5s linear infinite;
        }

        @keyframes jigjag{ 
            2%{color: white;} 
            3%{transform:translate(2px,10px) skewX(320deg);} 
            5%{transform:translate(0px,0px) skewX(0deg);} 
            2%,54%{transform:translateX(0px) skew(0deg);} 
            55%{transform:translate(2px,4px) skewX(320deg);} 
            56%{transform:translate(0px,0px) skew(0deg);} 
            57%{transform:translate(4px,5px) skew(0deg);} 
            58%{transform:translate(0px,0px) skew(0deg);} 
            62%{transform:translate(0px,8px) skewX(320deg);} 
            63%{transform:translate(4px,2px) skew(0deg);} 
            90%{transform:translate(1px,3px) skew(0deg);}
            95%{transform:translate(7px,2px) skewX(320deg);}
            100%{transform:translate(0px,0px) skewX(0deg);}
        } 
    </style>
</head>
<body>

    <div class="container font-saira">
        <h1> 404 NOTFOUND </h1>
        <a href="/" class="btn btn-lg btn-outline-light mt-5 w-100">HOME</a>
    </div>

    <script src="/aset/js/jquery-3.7.1.min.js"></script>
    <script src="/aset/js/bootstrap.bundle.min.js"></script>
</body>
</html>