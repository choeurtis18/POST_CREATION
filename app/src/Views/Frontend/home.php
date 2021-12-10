<div class="home-container">
    <h1>Bienvenue à JumyJi</h1>

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
                <a class="link" href="/post/<?= $post->getId();?>">Afficher le Post</a>
                <h3 class="title text-center"><?php echo $post->getTitle(); ?></h3>
                <div class="divider"></div>
                <p class="paragraph text-justify"><?php echo $post->getContent(); ?></p>
            </div>
        </div>
  
        <?php
        }}else{
        ?>
        <p>No post Found</p>
        <?php  
        }
        ?>

    </div>
</div>


