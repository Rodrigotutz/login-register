<?php $this->layout("components/_theme") ?>

<h1>Não foi possivel encontrar</h1>
<h3>Erro: <?= $errcode ?></h3>

<a href="<?= $router->route('auth.login') ?>">Voltar</a>