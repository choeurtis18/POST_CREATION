
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


