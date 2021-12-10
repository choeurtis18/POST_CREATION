<?php if($_SESSION['user_id'] != NULL) { ?>
    <div class="form-structor">
        <p style="color: #FF0000;"><?=  htmlspecialchars($_GET["error_message"]) ?></p>
        <form method="post" action="/user-update/" class="signup">
            <h2 class="form-title" id="signup">Vos informations personnelles</h2>
            <div class="form-holder">
                <input type="text" class="input" name="id" value="<?php echo $_SESSION['user_id']; ?>" placeholder="id" hidden />
                <input type="text" class="input" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" placeholder="Prénom" />
                <input type="text" class="input" name="lastname" value="<?php echo $_SESSION['lastname']; ?>" placeholder="Nom" />
                <input type="email" class="input" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Email" />
                <input type="password" class="input"name="password" value="<?php echo $_SESSION['password']; ?>" placeholder="Mot De Passe" />
                <input type="checkbox" class="checkbox" name="isAdmin" value="<?php echo $_SESSION['admin']; ?>" />est Admin

            </div>
            <button class="submit-btn btn-warning">Mettre à jour</button>
        </form>
    </div>
    <?php }else { ?>
        <br><br>
    <p>Vous n'êtes pas connecté</p>
<?php } ?>