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
.post-container h3 {
    width: 100%;
    margin: 0 20px 20px 20px;
}

.post-container .card__container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
.post-container .comment-card {
    flex: 1;
    box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);
    margin: 0px 20px 0px 20px;
}
.post-container .comment-card-container {
    padding: 0.01em 16px;
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
                <p><?php echo $post->getPublishedDate()->format('Y-m-d'); ?></p>
                <hr>
                <p><?php echo $post->getContent(); ?>.</p><br>
            </div>
        </div>
        </div>

        <h3>Comments</h3>
        <?php
        foreach($comments as $comment) {
        ?>
        <div class="comment-card">
            <div class="comment-card-container">
                <p><?php echo $comment->getPublishedDate()->format('Y-m-d'); ?></p>
                <hr>
                <p><?php echo $comment->getContent(); ?>.</p><br>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>


