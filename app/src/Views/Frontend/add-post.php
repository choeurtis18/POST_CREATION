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
    <h1>Add Post</h1>

    <div class="card">
        <form action="/submit-add-post/" method="POST">
            <input type="text" id="author-id" name="author-id" value="<?= $_SESSION['user_id'] ?>" hidden>

            <input type="text" class="input" name="post-title" placeholder="Title" /><br>
            <label for="post-content">Content:</label><br>
            <textarea rows="5" cols="50" name="post-content" id="post-content"></textarea><br><br>
            
            <input type="submit" value="Submit">
        </form> 
    </div>
</div>