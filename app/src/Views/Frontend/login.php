<div class="form-structor">
    <p style="color: #FF0000;"><?=  htmlspecialchars($_GET["error_message"]) ?></p>
    <form class="signup" method="post" action="/login-function/">
        <h2 class="form-title" id="signup">Connexion</h2>
        <div class="form-holder">
            <input type="email" class="input" name="mail" placeholder="Email" />
            <span class="invalidFeedback"></span>
            <input type="password" class="input" placeholder="Mot De Passe" name="password"/>
        </div>
        <button class="submit-btn">Connexion</button>
    </form>
</div>