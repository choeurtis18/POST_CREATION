<div class="form-structor">
    <p style="color: #FF0000;"><?=  htmlspecialchars($_GET["error_message"]) ?></p>
    <form method="post" action="/register-function/" class="signup">
        <h2 class="form-title" id="signup">Inscription</h2>
        <div class="form-holder">
            <input type="text" class="input"  name="name" placeholder="Prénom" required />
            <input type="text" class="input"  name="firstname" placeholder="Nom" required/>
            <input type="email" class="input" name="mail" placeholder="E-mail" required />
            <input type="password" class="input" name="password" placeholder="Mot de passe" required />
            <input type="checkbox" class="checkbox" name="isAdmin" placeholder="isAdmin">Is Admin

        </div>
        <button class="submit-btn">S'inscrire</button>
    </form>
</div>