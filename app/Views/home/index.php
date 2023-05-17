<?php $this->layout("components/_theme") ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div>
        <h6>Nome: <?= $user->first_name ?> <?= $user->last_name ?></h6>
        <h6>Email: <?= $user->email ?></h6>
        <h6>Telefone: <?= $user->phone ?></h6>
    
        <div class="text-center mt-5">
            <a href="<?= $router->route("home.logout") ?>" class="btn btn-danger">Sair</a>
        </div>
    </div>
</div>