<style>
.addComment-container h1 {
    margin: 50px 0px 80px 20px;
}

.addComment-container .card {
    width: 100%;
    margin: 0 0 50px 0;
}

</style>

<div class="addComment-container">
    <h1>Edit Comment</h1>

    <div class="card">
        <form action="/submit-edit-comment/" method="POST">
            <input type="text" id="comment-id" name="comment-id" value="<?= $comment->getId()?>" hidden>
            <input type="text" id="author-id" name="author-id" value="<?= $_SESSION['user_id'] ?>" hidden>

            <label for="author-id">Author:</label><br>
            <input type="text" id="author-name" name="author-name" value="<?= $_SESSION['username'] ?>" disabled="disabled"><br>
            <label for="comment-content">Content:</label><br>
            <textarea id="comment-content" rows="5" cols="50" name="comment-content" ><?= $comment->getContent() ?></textarea><br><br>
           
            <input type="submit" value="Submit">
        </form> 
    </div>
</div>


