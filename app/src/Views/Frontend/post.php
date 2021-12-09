<style>
.post-container h1 {
    margin: 50px 0px 80px 20px;
}

.post-container .post-card {
    width: 100%;
    margin: 0 0 50px 0;
}
.post-container .post-card-container {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 70%;
    border-radius: 5px;
    text-align: center;
    margin: 0 auto;
}
.comment-title-id h3 {
    width: 100%;
    margin: 0 0px 20px 0px;
    font-weight: bold;
}

</style>

<div class="post-container">
    <h1>Welcome IN VVS Club</h1>

    <div class="card__container">
        <div class="post-card">
        <div class="post-card-container">
            <header class="post-card-header-content">
                <h3><?php echo $post->getTitle(); ?></h3>
            </header>
            <div class="post-card-content">
                <p>Ecrit par : <?= $post->getPostAuthor($post->getAuthorId())->getName() ?></p>
                <p>Le : <?= $post->getPublishedDate()->format('Y-m-d'); ?></p>
                <hr>
                <p><?php echo $post->getContent(); ?>.</p><br>
            </div>
        </div>
        </div>

        <h3 id="comment-title-id">Comments</h3>
        <hr>
        <?php
        if($comments != NULL){
        foreach($comments as $comment) {
        ?>
        <div class="comment-card">
            <p>Ecrit par <?= $comment->getCommentAuthor($comment->getAuthorId())->getName(); ?> le <?= $comment->getPublishedDate()->format('Y-m-d'); ?></p>
            <p><?= $comment->getContent(); ?></p>
            <hr>
        </div>
        <?php
        }
        }else {
        ?>
            <p>No comment Found</p>
        <?php
        }
        ?>
    </div>
</div>


