<div class="addComment-container">
    <h1>Modifier le Commentaire</h1>

    <div class="card">
        <form action="/submit-edit-comment/" method="POST">
            <input type="text" id="comment-id" name="comment-id" value="<?= $comment->getId()?>" hidden>
            <input type="text" id="author-id" name="author-id" value="<?= $_SESSION['user_id'] ?>" hidden>

            <label for="author-id">Auteur:</label><br>
            <input type="text" id="author-name" name="author-name" value="<?= $_SESSION['username'] ?>" disabled="disabled"><br>
            <label for="comment-content">Contenu:</label><br>
            <textarea id="comment-content" rows="5" cols="50" name="comment-content" ><?= $comment->getContent() ?></textarea><br><br>
           
            <input type="submit" value="Submit">
        </form> 
    </div>
</div>


