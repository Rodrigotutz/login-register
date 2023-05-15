<!doctype html>
<html lang="pt-br">

<head>
    <title><?= $title . " | " . getenv("APP_NAME")?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?= css("bootstrap.min.css")?>" rel="stylesheet">
    <link href="<?= css("login.css")?>" rel="stylesheet">

</head>

<body>
    <main>
        <?= $this->section("content") ?>
    </main>

    <script src="<?= js("popper.min.js")?>"></script>
    <script src="<?= js("bootstrap.min.js")?>"></script>

    <?=$this->section('scripts')?>
</body>

</html>