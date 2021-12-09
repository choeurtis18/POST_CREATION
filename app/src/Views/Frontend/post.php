<style>
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

.comment-title-id, .addComment-title-id{
    width: 100%;
    margin: 0 0px 20px 0px;
    font-weight: bold;
}

</style>

<div class="post-container">
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
        <div class="addComment-card">
            <div class="addComment-card-container">
                <h3 id="addComment-title-id">Comments</h3>
                <form class="addComment-card-content" action="/submit-add-comment/" method="POST">
                    <input type="text" name="post-id" value="<?= $post->getId() ?>" hidden>
                    <input type="text" id="author-id" name="author-id" value="<?= $post->getAuthorId() ?>" hidden>
                    
                    <label for="author-id">Author:</label><br>
                    <input type="text" id="author-name" name="author-name" value="<?= $post->getPostAuthor($post->getAuthorId())->getName() ?>" disabled="disabled"><br>
                    <label for="comment-content">Content:</label><br>
                    <textarea id="comment-content" rows="5" cols="50" name="comment-content" value="Doe"></textarea><br><br>
                    <input type="submit" value="Submit"><br><br><br><br>
                </form>
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


