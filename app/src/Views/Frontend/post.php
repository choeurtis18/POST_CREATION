<style>
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

.comment-title-id, .addComment-title-id{
    width: 100%;
    margin: 0 0px 20px 0px;
    font-weight: bold;
}

</style>

<div class="post-container">
    <div class="card__container">
    <div class="blog-card">
            <div class="media col-sm-6 col-xs-6" style="background-image: url('<?= $post->getImage() ?>')"></div>
            <div class="card-body col-sm-6 col-xs-6">
                <p class="tagline text-center">
                    ecrit par : <?= $post->getPostAuthor($post->getAuthorId())->getName() ?> 
                    le <?= $post->getPublishedDate()->format('Y-m-d'); ?>
                </p>
                <h3 class="title text-center"><?php echo $post->getTitle(); ?></h3>
                <div class="divider"></div>
                <p class="paragraph text-justify"><?php echo $post->getContent(); ?></p>
            </div>
        </div>
        <?php if($_SESSION['user_id'] != NULL) { ?>
        <div class="addComment-card">
            <div class="addComment-card-container">
                <h3 id="addComment-title-id">Comments</h3>
                <form class="addComment-card-content" action="/submit-add-comment/" method="POST">
                    <input type="text" name="post-id" value="<?= $post->getId() ?>" hidden>
                    <input type="text" id="author-id" name="author-id" value="<?= $_SESSION['user_id'] ?>" hidden>
                    
                    <label for="author-id">Author:</label><br>
                    <input type="text" id="author-name" name="author-name" value="<?= $_SESSION['username'] ?>" disabled="disabled"><br>
                    <label for="comment-content">Content:</label><br>
                    <textarea id="comment-content" rows="5" cols="50" name="comment-content" value="Doe"></textarea><br><br>
                    <input type="submit" value="Submit"><br><br><br><br>
                </form>
            </div>
        </div>
        <?php } ?>
        <h3 id="comment-title-id">Comments</h3>
        <hr>
        <?php
        if($comments != NULL){
        foreach($comments as $comment) {
        ?>
        <div class="comment-card">
            <p>Ecrit par <?= $comment->getCommentAuthor($comment->getAuthorId())->getName(); ?> le <?= $comment->getPublishedDate()->format('Y-m-d'); ?></p>
            <p><?= $comment->getContent(); ?></p>
            <a href="/edit-comment/<?= $comment->getId();?>"><button class="post-card-button">Edit comment</button><a>
            <a href="/delete-comment/<?= $comment->getId();?>"><button class="post-card-button">Delete comment</button><a>
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


