<h1>Welcome IN VVS Club</h1>

<style>
    html, body
    {
        height: 100%;
    }

    body
    {
        margin: 0;
        background-color: #292929;
    }

    nav
    {
        position: relative;
        right: 0;
        left: 0;
        width: 319px;
        display: table;
        margin: 0 auto;
    }

    nav a
    {
        position: relative;
        width: 33.333%;
        display: table-cell;
        text-align: center;
        color: #949494;
        text-decoration: none;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-weight: bold;
        padding: 10px 20px;
        transition: 0.2s ease color;
    }

    nav a:before, nav a:after
    {
        content: "";
        position: absolute;
        border-radius: 50%;
        transform: scale(0);
        transition: 0.2s ease transform;
    }

    nav a:before
    {
        top: 0;
        left: 10px;
        width: 6px;
        height: 6px;
    }

    nav a:after
    {
        top: 5px;
        left: 18px;
        width: 4px;
        height: 4px
    }

    nav a:nth-child(1):before
    {
        background-color: yellow;
    }

    nav a:nth-child(1):after
    {
        background-color: red;
    }

    nav a:nth-child(2):before
    {
        background-color: #00e2ff;
    }

    nav a:nth-child(2):after
    {
        background-color: #89ff00;
    }

    nav a:nth-child(3):before
    {
        background-color: purple;
    }

    nav a:nth-child(3):after
    {
        background-color: palevioletred;
    }

    #indicator
    {
        position: absolute;
        left: 5%;
        bottom: 0;
        width: 30px;
        height: 3px;
        background-color: #fff;
        border-radius: 5px;
        transition: 0.2s ease left;
    }

    nav a:hover
    {
        color: #fff;
    }

    nav a:hover:before, nav a:hover:after
    {
        transform: scale(1);
    }

    nav a:nth-child(1):hover ~ #indicator
    {
        background: linear-gradient(130deg, yellow, red);
    }

    nav a:nth-child(2):hover ~ #indicator
    {
        left: 34%;
        background: linear-gradient(130deg, #00e2ff, #89ff00);
    }

    nav a:nth-child(3):hover ~ #indicator
    {
        left: 70%;
        background: linear-gradient(130deg, purple, palevioletred);
    }

    #ytd-url {
        display: block;
        position: fixed;
        right: 0;
        bottom: 0;
        padding: 10px 14px;
        margin: 20px;
        color: #fff;
        font-family: Arial;
        font-size: 14px;
        text-decoration: none;
        background-color: #000;
        border-radius: 4px;
        box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.3);
        z-index: 125;
    }

    @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap");
    *, *::before, *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Roboto", sans-serif;
    }
    .container {
        position: absolute;
        width: 100%;
        height: 100vh;
    }
    .card {
        width: 60%;
        height: 80%;
        max-height: 300px;
        padding: auto;
        margin-bottom: 2%;
        text-align: center;
        background: #242625;
        border-radius: 10px;
        box-shadow: 25px 25px 50px #1b1c1b, -25px -25px 50px #2d302f;
    }
    .card__container {
        margin-top: 9%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
    }
    .card__content {
        width: 90%;
        height: 95%;
        background: #191a19;
        margin: 10px auto;
        border-radius: 5px;
        /* padding: 20px; */
        cursor: pointer;
        box-shadow: 16px 16px 44px #0a0a0a, -16px -16px 44px #282a28;
        transition: 0.3s all ease-in-out;
    }
    .card__content:hover {
        margin-top: -10px;
    }
    .card__header {
        text-transform: uppercase;
        font-size: 20px;
        margin: 40px auto;
    }
    .card__button {
        padding: 10px;
        border-radius: 50px;
        background: #1f75c4;
        color: white;
        font-weight: bold;
        cursor: pointer;
        border: none;
        margin: 50px auto;
    }



    .form-structor {
        background-color: #222;
        border-radius: 15px;
        height: 550px;
        width: 350px;
        position: relative;
        overflow: hidden;
    }
    .form-structor::after {
        content: '';
        opacity: 0.8;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-repeat: no-repeat;
        background-position: left bottom;
        background-size: 500px;
        background-image: url('https://images.unsplash.com/photo-1503602642458-232111445657?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bf884ad570b50659c5fa2dc2cfb20ecf&auto=format&fit=crop&w=1000&q=100');
    }
    .form-structor .signup {
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        width: 65%;
        z-index: 5;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .signup.slide-up {
        top: 5%;
        -webkit-transform: translate(-50%, 0%);
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .signup.slide-up .form-holder, .form-structor .signup.slide-up .submit-btn {
        opacity: 0;
        visibility: hidden;
    }
    .form-structor .signup.slide-up .form-title {
        font-size: 1em;
        cursor: pointer;
    }
    .form-structor .signup.slide-up .form-title span {
        margin-right: 5px;
        opacity: 1;
        visibility: visible;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .signup .form-title {
        color: #fff;
        font-size: 1.7em;
        text-align: center;
    }
    .form-structor .signup .form-title span {
        color: rgba(0, 0, 0, 0.4);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .signup .form-holder {
        border-radius: 15px;
        background-color: #fff;
        overflow: hidden;
        margin-top: 50px;
        opacity: 1;
        visibility: visible;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .signup .form-holder .input {
        border: 0;
        outline: none;
        box-shadow: none;
        display: block;
        height: 30px;
        line-height: 30px;
        padding: 8px 15px;
        border-bottom: 1px solid #eee;
        width: 100%;
        font-size: 12px;
    }
    .form-structor .signup .form-holder .input:last-child {
        border-bottom: 0;
    }
    .form-structor .signup .form-holder .input::-webkit-input-placeholder {
        color: rgba(0, 0, 0, 0.4);
    }
    .form-structor .signup .submit-btn {
        background-color: rgba(0, 0, 0, 0.4);
        color: rgba(255, 255, 255, 0.7);
        border: 0;
        border-radius: 15px;
        display: block;
        margin: 15px auto;
        padding: 15px 45px;
        width: 100%;
        font-size: 13px;
        font-weight: bold;
        cursor: pointer;
        opacity: 1;
        visibility: visible;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .signup .submit-btn:hover {
        transition: all 0.3s ease;
        background-color: rgba(0, 0, 0, 0.8);
    }
    .form-structor .login {
        position: absolute;
        top: 20%;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #fff;
        z-index: 5;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .login::before {
        content: '';
        position: absolute;
        left: 50%;
        top: -20px;
        -webkit-transform: translate(-50%, 0);
        background-color: #fff;
        width: 200%;
        height: 250px;
        border-radius: 50%;
        z-index: 4;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .login .center {
        position: absolute;
        top: calc(50% - 10%);
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        width: 65%;
        z-index: 5;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .login .center .form-title {
        color: #000;
        font-size: 1.7em;
        text-align: center;
    }
    .form-structor .login .center .form-title span {
        color: rgba(0, 0, 0, 0.4);
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .login .center .form-holder {
        border-radius: 15px;
        background-color: #fff;
        border: 1px solid #eee;
        overflow: hidden;
        margin-top: 50px;
        opacity: 1;
        visibility: visible;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .login .center .form-holder .input {
        border: 0;
        outline: none;
        box-shadow: none;
        display: block;
        height: 30px;
        line-height: 30px;
        padding: 8px 15px;
        border-bottom: 1px solid #eee;
        width: 100%;
        font-size: 12px;
    }
    .form-structor .login .center .form-holder .input:last-child {
        border-bottom: 0;
    }
    .form-structor .login .center .form-holder .input::-webkit-input-placeholder {
        color: rgba(0, 0, 0, 0.4);
    }
    .form-structor .login .center .submit-btn {
        background-color: #6B92A4;
        color: rgba(255, 255, 255, 0.7);
        border: 0;
        border-radius: 15px;
        display: block;
        margin: 15px auto;
        padding: 15px 45px;
        width: 100%;
        font-size: 13px;
        font-weight: bold;
        cursor: pointer;
        opacity: 1;
        visibility: visible;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .login .center .submit-btn:hover {
        transition: all 0.3s ease;
        background-color: rgba(0, 0, 0, 0.8);
    }
    .form-structor .login.slide-up {
        top: 90%;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .login.slide-up .center {
        top: 10%;
        -webkit-transform: translate(-50%, 0%);
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .login.slide-up .form-holder, .form-structor .login.slide-up .submit-btn {
        opacity: 0;
        visibility: hidden;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .login.slide-up .form-title {
        font-size: 1em;
        margin: 0;
        padding: 0;
        cursor: pointer;
        -webkit-transition: all 0.3s ease;
    }
    .form-structor .login.slide-up .form-title span {
        margin-right: 5px;
        opacity: 1;
        visibility: visible;
        -webkit-transition: all 0.3s ease;

    }


    @media (min-width: 1400px){}
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
        max-width: 97% !important;
    }
</style>
<script>
    $(document).ready(function(){

        $('.card__info').each(function (f) {

            var newstr = $(this).text().substring(0,200);
            $(this).text(newstr);

        });
    })
</script>


<div class="form-structor">
    <div class="signup">
        <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
        <div class="form-holder">
            <input type="text" class="input" placeholder="Name" />
            <input type="email" class="input" placeholder="Email" />
            <input type="password" class="input" placeholder="Password" />
        </div>
        <button class="submit-btn">S'inscrire</button>
    </div>
    <div class="login slide-up">
        <div class="center">
            <h2 class="form-title" id="login"><span>or</span>Log in</h2>
            <div class="form-holder">
                <input type="email" class="input" placeholder="Email" />
                <input type="password" class="input" placeholder="Password" />
            </div>
            <button class="submit-btn">Log in</button>
        </div>
    </div>
</div>