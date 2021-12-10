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
    <h1>Ajouter un Post</h1>

    <div class="card">
        <form action="/submit-add-post/" method="POST" enctype="multipart/form-data">
            <input type="text" id="author-id" name="author-id" value="<?= $_SESSION['user_id'] ?>" hidden>
            <p style="color: #FF0000;"><?=  htmlspecialchars($_GET["error_message"]) ?></p>
            <input type="text" class="input" name="post-title" placeholder="Titre" /><br>
            <label for="post-content">Contenu:</label><br>
            <textarea rows="5" cols="50" name="post-content" id="post-content"></textarea><br>
            <input type="file" name="post-image"><br><br>
            <input type="submit" value="submit" value="Submit">
        </form> 
    </div>
</div>