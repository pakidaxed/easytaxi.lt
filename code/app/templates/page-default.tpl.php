<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $data['title'] ?></title>
    <?php foreach ($data['css'] as $css): ?>
        <link rel="stylesheet" href="/css/<?= $css ?>">
    <?php endforeach; ?>
    <?php foreach ($data['js'] as $js): ?>
        <script src="/js/<?= $js ?>" defer></script>
    <?php endforeach; ?>
</head>
<body>
<div class="content">
    <header>
        <?= $data['header'] ?>
    </header>
    <main>
        <?= $data['content'] ?>
    </main>
</div>
    <footer>
        <?= $data['footer'] ?>
    </footer>
</body>
</html>
