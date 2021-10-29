
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
    <script >function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.className === "links") {
        x.className += " responsive";
    } else {
        x.className = "links";
    }
}</script>
</head>

<body>
    <nav>
        <ul class="links" id="myLinks">
            <li><strong><a href="#">GYP Dessert</a></li></strong>
            <li><a href="#">Home</a></li>
            <li><a href="#">Beverage</a></li>
            <li><a href="#">Bakery</a></li>         
            <li class="right"><a href="#">register</a></li>
            <li class="right"><a href="#">login</a></li>
            <li class="icon">
                <a href="#" onclick="myFunction()">&#9776;</a>
            </li>
        </ul>
    </nav>
</body>

</html>