<div class="form-structor">
    <p style="color: #FF0000;"><?=  htmlspecialchars($_GET["error_message"]) ?></p>
    <form action="/submit-add-post/" method="POST"  class="signup" enctype="multipart/form-data">
        <h2 class="form-title" id="signup">Ajout de post</h2>
        <div class="form-holder">
            <input type="text" id="author-id" name="author-id" value="<?= $_SESSION['user_id'] ?>" hidden>
            <p style="color: #FF0000;"><?=  htmlspecialchars($_GET["error_message"]) ?></p>
            <input type="text" class="input" name="post-title" placeholder="Titre" /><br>
            <label for="post-content">Contenu:</label><br>
            <textarea rows="5" cols="50" name="post-content" id="post-content"></textarea><br>
            <input type="file" name="post-image"><br><br>
        </div>
        <button class="submit-btn btn btn-success">Poster</button>
    </form>
</div>