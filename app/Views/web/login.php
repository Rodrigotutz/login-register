<?php $this->layout("components/_theme") ?>

<div class="container">
    <div class="row align-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-md-6 offset-md-3 mb-5 mt-5 pt-5">
            <h3 class="text-muted fw-bold text-center mb-4">Faça login para entrar</h3>
            <div class="container mb-4 mt-5 text-center text-md-start">
                <a href="" class="border border-1 p-3 text-md-start" style="text-decoration: none;">
                   <span class="text-dark"> <img src="<?= images("google.png") ?>" alt="" style="width: 30px;"> Faça login com o Google</span>
                </a>
            </div>
            <form method="POST" action="<?= $router->route("auth.login")?>">
                <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email:</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control pass" id="password" placeholder="Password">
                    <label for="password">Senha:</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input showPass" id="showKey">
                    <label class="form-check-label" for="showKey">Mostrar Senha</label>
                </div>
                <div>
                    <a href="<?= $router->route("web.forget") ?>">Esqueci a senha</a>
                </div>
                <div class="mt-5 text-center mb-5">
                    <button type="submit" class="btn btn-dark fw-bold p-2" style="width: 150px;">Entrar</button>
                </div>
                <div class="text-md-end">
                    <small class="text-muted">Ainda não tem conta? <a href="<?= $router->route('web.register') ?>" class="text-muted text-dark">Cadastre-se!</a></small>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->start('scripts') ?>
   <script>
    let pass = document.querySelector(".pass")
    let showPass = document.querySelector(".showPass")

    showPass.addEventListener("click", () => {
        if(pass.type === "password") {
            pass.type = "text"
        } else {
            pass.type = "password"
        }
    })
   </script>
<?php $this->stop() ?>