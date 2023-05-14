<?php $this->layout("components/_theme") ?>

<div class="container">
    <div class="row align-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-md-6 offset-md-3 mb-5 mt-5 pt-5">
            <h3 class="text-muted fw-bold text-center mb-4">Faça login para entrar</h3>
            <form>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Senha</label>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="showKey">
                    <label class="form-check-label" for="showKey">Mostrar Senha</label>
                </div>
                <div class="mt-5 text-center mb-5">
                    <button type="submit" class="btn btn-dark fw-bold p-2" style="width: 150px;">Entrar</button>
                </div>
                <div class="text-md-end">
                    <small class="text-muted">Ainda não tem conta? <a href="" class="text-muted text-dark">Cadastre-se!</a></small>
                </div>
            </form>
        </div>
    </div>
</div>