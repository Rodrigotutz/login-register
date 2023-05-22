<?php $this->layout("components/_theme") ?>

<div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    <h3>Falta só mais um passo <?= $user->first_name ?></h3>
    <p>Clique no botão abaixo para confirmar seu e-mail!</p>
    <a href="<?= $router->route("auth.confirmed", ["email" => $user->email]) ?>" class="btn btn-primary btn-lg">Confirmar</a>
</div>