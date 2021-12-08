<style>
.home-container h1 {
    margin: 50px 0px 80px 20px;
}
.card__container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.post-card {
    flex: 1;
    box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);
    margin: 0px 20px 0px 20px;
}
.post-card-header-container {
    color: #000!important;
    background-color: #f1f1f1!important;
    text-align: center;
}
.post-card-container {
    padding: 0.01em 16px;
}
.post-card-button {
    display: block;
    width: 100%;
    width: 100%;
    background-color: white;
    border: 1px solid #cccccc;
    color: #696969;
    padding: 0.5rem;
    text-transform: lowercase;
}
</style>

<div class="home-container">
    <h1>Welcome IN VVS Club</h1>

    <div class="card__container">
        <?php
        foreach($posts as $post) {
        ?>
        <div class="post-card">
            <header class="post-card-header-container">
                <h3><?php echo $post->getTitle(); ?></h3>
            </header>
            <div class="post-card-container">
                <p><?php echo $post->getPublishedDate()->format('Y-m-d'); ?></p>
                <hr>
                <p><?php echo $post->getContent(); ?>.</p><br>
            </div>
            <a href="/post/<?= $post->getId();?>"><button class="post-card-button">+ Read now</button><a>
            <a href="/add-comment/<?= $post->getId();?>"><button class="post-card-button">+ Add Comment</button><a>
        </div>
            <?php

        }
        ?>

    </div>
</div>


