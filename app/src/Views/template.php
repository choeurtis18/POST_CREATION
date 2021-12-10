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

    </style>
    <nav class="navbar" style="margin: 0 20px 20px 20px;">
        <a class="navbar-option" href="/">Accueil</a>
        <?php if($_SESSION['user_id'] == NULL) { ?>
             <a class="navbar-option" href="/login/">Connexion</a>
             <a class="navbar-option" href="/register/">Inscription</a>
        <?php }else { ?>
                <a class="navbar-option" href="/add-post/">Créer un Post</a>
                <a class="navbar-option" href="/user-post/">Mes posts</a>
                <a class="navbar-option" href="/user">Mon compte</a>
            <?php  if(!empty($_SESSION['admin'])) { ?>
                <a class="navbar-option" href="/admin">Gérer les utilisateurs</a>
            <?php } ?>

            <a class="navbar-option" href="/logout/">Logout</a>


        <?php } ?>
    </nav>

    <div class="container">
        <?= $content; ?>
    </div>

</body>
</html>