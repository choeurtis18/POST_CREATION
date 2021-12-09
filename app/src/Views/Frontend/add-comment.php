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
    <h1>Add Comment</h1>

    <div class="card">
        <form action="/submit-add-comment/" method="POST">
            <input type="text" id="post-id" name="post-id" value="<?= $post->getId()?>" hidden>
            <input type="text" id="author-id" name="author-id" value="1" hidden>

            <label for="comment-content">Content:</label><br>
            <textarea rows="3" cols="30" name="comment-content" id="comment-content"></textarea><br><br>
            
            <input type="submit" value="Submit">
        </form> 
    </div>
</div>


