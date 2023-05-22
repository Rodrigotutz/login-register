<?php $this->layout("components/_theme") ?>

<div class="container d-flex flex-column justify-content-center align-items-center" style="min-height: 100vh;">
    <h1>Não foi possivel encontrar</h1>
    <h3>Erro: <?= $errcode ?></h3>

    <a href="<?= $router->route('web.login') ?>">Voltar</a>
</div>