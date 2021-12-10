<style>
    .home-container h1 {
        margin: 50px 0px 80px 20px;
        text-align: center;
    }

    .card__container {
        width: 100%;
    }

    .blog-card {
        background-color: white;
        border-radius: 1px;
        box-shadow: 0 0 2px -1px rgba(0, 0, 0, 0.75);
        margin: 0 auto;
        height: 85vh;
        margin-bottom: 20px;
        max-width: 1200px;
        overflow: hidden;

        @media (max-width: 700px) {
            height: 200px;
            overflow: visible;
        }
    }

    .media {
        float: left;
        background-position: center;
        background-size: cover;
        height: 100%;
    }

    .card-body {
        float: right;
        color: #000;
        height: 100%;
        padding: 30px 20px 50px;
    }

    .tagline {
        font-size: 10px;
        text-transform: uppercase;
    }

    .title {
        color: #000;
        font-family: "Playfair Display SC";
        font-size: 27px;
        font-weight: 400;
    }

    .divider {
        background: #000;
        height: 2px;
        margin: 10px auto;
        width: 40px;
    }

    .paragraph {
        font-weight: 300;
    }
    .link {
        color: #000!important;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
    }
    .link:hover {
        color: #337ab7!important;
        text-decoration: none;
    }
    @media (max-width: 700px) {
        .media {
            display: none;
        }
        .col-xs-6 {
            width: 100%;
        }
    }

</style>

<div class="home-container">
    <h1>Welcome to JumyJi</h1>

    <div class="card__container">
        <?php
        if($posts != NULL){
        foreach($posts as $post) {
        ?>

        <div class="blog-card">
            <div class="media col-sm-6 col-xs-6" style="background-image: url('<?= $post->getImage() ?>')"></div>
            <div class="card-body col-sm-6 col-xs-6">
                <p class="tagline text-center">
                    ecrit par : <?= $post->getPostAuthor($post->getAuthorId())->getName() ?> 
                    le <?= $post->getPublishedDate()->format('Y-m-d'); ?>
                </p>
                <a class="link" href="/post/<?= $post->getId();?>">Afficher le Post <a> |
                <a class="link" href="/edit-post/<?= $post->getId();?>">Modifier <a> |
                <a class="link" href="/delete-post/<?= $post->getId();?>">Supprimer <a>
                <h3 class="title text-center"><?php echo $post->getTitle(); ?></h3>
                <div class="divider"></div>
                <p class="paragraph text-justify"><?php echo $post->getContent(); ?></p>
            </div>
            <a class="link" href="/post/<?= $post->getId();?>">En Savoir plus<a> |
            <a class="link" href="/edit-post/<?= $post->getId();?>">Modifiert<a> |
            <a class="link" href="/delete-post/<?= $post->getId();?>">Supprimer<a>
        </div>
        
        <?php
        }}else{
        ?>
        <p>Aucun Post n'a été publié</p>
        <?php  
        }
        ?>

    </div>
</div>


