
<style>
    .panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
    .panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}

    .login-form .form-control {
        border: 1px solid #d4d4d4;
        border-radius: 4px;
        font-size: 14px;
        height: 50px;
        line-height: 50px;
    }
    .main-div {
        border-radius: 2px;
        margin: 10px auto 30px;
        max-width: 38%;
        padding: 50px 70px 70px 71px;
    }

    .login-form .form-group {
        margin-bottom:10px;
    }
    .login-form{ text-align:center;}
    .forgot a, .unregistered a {
        text-decoration: underline;
        color: #777777;
    }
    .login-form  .btn.btn-primary {
        font-size: 14px;
        width: 100%;
        height: 50px;
        line-height: 50px;
        padding: 0;
    }
    .forgot, .unregistered {
        text-align: left;
        font-size: 14px;
        margin-bottom: 10px;
    }
    .back a {color: #444444; font-size: 13px;text-decoration: none;}
    .errorDiv { margin-bottom: 10px; background-color: #f8d7da; }
    .btn {margin: .4rem 0;}
</style>

<section class="mbr-gallery cid-qyXC3wOLIJ" once="shops" id="shop2-5h" data-rv-view="2472">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Cadastro de cliente</h2>
                <p>Por favor, informe seus dados</p>
            </div>
            <?php
            if (isset($error)) {
                echo
                    "<div class='alert-danger errorDiv'>"
                    . $error .
                    "</div>";
            }
            ?>
            <form id="Login" action="/user/save" method="POST">

                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password-confirmation" name="password-confirmation" placeholder="Confirme a senha">
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>

            </form>
        </div>
    </div>
</section>