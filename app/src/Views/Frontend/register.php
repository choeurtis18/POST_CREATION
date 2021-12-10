<div class="form-structor">
    <p style="color: #FF0000;"><?=  htmlspecialchars($_GET["error_message"]) ?></p>
    <form method="post" action="/register-function/" class="signup">
        <h2 class="form-title" id="signup">S'inscrire</h2>
        <div class="form-holder">
            <input type="text" class="input"  name="lastname" placeholder="Nom" required />
            <input type="text" class="input"  name="firstname" placeholder="Prénom" required/>
            <input type="email" class="input" name="mail" placeholder="mail" required />
            <input type="password" class="input" name="password" placeholder="password" required />
            <input type="checkbox" class="checkbox" name="isAdmin" placeholder="isAdmin"> Est Admin

        </div>
        <button class="submit-btn">S'inscrire</button>
    </form>
</div>