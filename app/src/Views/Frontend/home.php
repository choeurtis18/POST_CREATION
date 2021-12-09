

<div class="home-container">
    <h1>Welcome IN VVS Club</h1>

    <div class="card__container">
        <?php
        if($posts != NULL){
        foreach($posts as $post) {
        ?>
        <div class="post-card">
            <header class="post-card-header-container">
                <h3><?php echo $post->getTitle(); ?></h3>
            </header>
            <div class="post-card-container">
                <p>Ecrit par : <?= $post->getPostAuthor($post->getAuthorId())->getName() ?></p>
                <p>Le : <?= $post->getPublishedDate()->format('Y-m-d'); ?></p>
                <hr>
                <p><?php echo $post->getContent(); ?>.</p><br>
            </div>
            <a href="/post/<?= $post->getId();?>"><button class="post-card-button">+ Read now</button><a>
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


