<?php $this->layout("components/_theme") ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div>
        <h1>Página de testes</h1>

        <div class="text-center mt-3">
            <form action="<?= $router->route("test.send") ?>" method="POST">
                <button class="btn btn-dark">Enviar e-mail</button>
            </form>
        </div>
    </div>
</div>