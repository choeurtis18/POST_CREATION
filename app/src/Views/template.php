<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Lien Boostrap + page css-->
    <link rel="stylesheet" href="https://bootswatch.com/5/slate/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../Assets/Css/style.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Import JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title><?= $title; ?></title>
</head>
<body style="margin: 50px 100px 50px 100px">
    <style>
        .navbar {
            display: flex;
            width: 100%;
            margin: auto;
            justify-content: space-between;
            text-align: center;
            margin-bottom: 50px;
        }
        .navbar-option {
            text-decoration: none;
            padding: 1rem 2rem 1.15rem;
            text-transform: uppercase;
            cursor: pointer;
            color: #ebebeb;
            min-width: 80px;
            margin: auto;
        }
        .navbar-option:hover {
            background-image: url('https://scottyzen.sirv.com/Images/v/button.png');
            background-size: 100% 100%;
            color: #27262c;
            animation: spring 300ms ease-out;
            text-shadow: 0 -1px 0 #ef816c;
            font-weight: bold;
        }
    </style>
    <nav class="navbar" style="margin: 0 20px 0 20px;">
        <a class="navbar-option" href="/">Accueil</a>
        <a class="navbar-option" href="/login/">Connexion</a>
        <a class="navbar-option" href="/register/">Inscription</a>
        <a class="navbar-option" href="/add-post/">Créer un Post</a>
    </nav>

    <div class="container">
        <?= $content; ?>
    </div>

</body>
</html>