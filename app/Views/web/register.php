<?php $this->layout("components/_theme") ?>

<div class="container mt-5">
    <div class="row align-content-center align-items-center" style="min-height: 90vh;">
        <div class="col-12 col-md-6 offset-md-3 mb-5 mt-5">
            <h3 class="text-muted fw-bold text-center mb-4">Faça seu cadastro</h3>
            <div class="container mb-5 mt-5 text-center text-md-start">
                <a href="" class="border border-1 p-3 text-md-start" style="text-decoration: none;">
                   <span class="text-dark"> <img src="<?= images("google.png") ?>" alt="" style="width: 30px;"> Cadastre-se com o Google</span>
                </a>
            </div>
            <form method="POST" action="<?= $router->route("auth.register") ?>">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input name="first_name" type="text" class="form-control" id="name" placeholder="name@example.com">
                            <label for="name">Nome:</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input name="last_name" type="text" class="form-control" id="lastName" placeholder="name@example.com">
                            <label for="lastName">Sobrenome:</label>
                        </div>
                    </div>  

                    <div class="col-12 col-md-8">
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                            <label for="email">Email:</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-floating mb-3">
                            <input name="phone" type="text" class="form-control phone" id="phone" placeholder="(99) 99999-9999">
                            <label for="phone">Telefone:</label>
                        </div>
                    </div>


                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input name="password" type="password" class="form-control pass" id="passwd" placeholder="Password">
                            <label for="passwd">Senha:</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-floating mb-3">
                            <input name="password_re" type="password" class="form-control pass_re" id="passwdRe" placeholder="Password">
                            <label for="passwdRe">Confirmar Senha:</label>
                        </div>
                    </div>

                    
                </div>
                
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input showPass" id="showKey">
                    <label class="form-check-label" for="showKey">Mostrar Senha</label>
                </div>
                <div class="mt-5 text-center mb-5">
                    <button type="submit" class="btn btn-dark fw-bold p-2" style="width: 150px;">Entrar</button>
                </div>
                <div class="text-md-end">
                    <small class="text-muted">Já tem uma conta? <a href="<?= $router->route('web.login') ?>" class="text-muted text-dark">Faça login!</a></small>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $this->start('scripts') ?>

   <script src="<?= js('jquery.min.js') ?>"></script>
   <script src="<?= js('jquery.mask.min.js') ?>"></script>
   <script src="<?= js('phoneMask.js') ?>"></script>
   <script src="<?= js('showPass.js') ?>"></script>

<?php $this->stop() ?>