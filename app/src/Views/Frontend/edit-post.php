<style>
.addPost-container h1 {
    margin: 50px 0px 80px 0px;
}

.addPost-container .card {
    width: 100%;
    margin: 0 0 50px 0;
}

</style>

<div class="addPost-container">
    <h1>Edit Post</h1>

    <div class="card">
        <form action="/submit-edit-post/" method="POST">
            <input type="text" id="author-id" name="author-id" value="<?= $_SESSION['user_id'] ?>" hidden>
            <input type="text" id="post-id" name="post-id" value="<?= $post->getId() ?>" hidden>

            <label for="author-id">Author:</label><br>
            <input type="text" id="author-name" name="author-name" value="<?= $post->getPostAuthor($post->getAuthorId())->getName() ?>" disabled="disabled"><br><br>

            <label for="post-title">Title:</label><br>
            <input type="text" class="input" name="post-title" value="<?= $post->getTitle() ?>"/><br><br>

            <label for="post-content">Content:</label><br>
            <textarea rows="5" cols="50" name="post-content" id="post-content"><?= $post->getContent() ?></textarea><br><br>
            
            <input type="submit" value="Submit">
        </form> 
    </div>
</div>