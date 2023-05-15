<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Loginfo- Crud Simples cakePHP
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= $this->Url->webroot('font-awesome.min.css') ?>">

    <script src="<?= $this->Url->webroot('js/jquery.mask.min.js') ?>"></script>
    <?= $this->Html->css(['template']) ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <?= $this->element('navbar') ?>
    <?= $this->element('breadcrumb') ?>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <?= $this->element('footer') ?>
</body>

</html>
<style>
    .breadcrumb {
        padding: 0rem;
        background-color: #f5f7fa;
    }
</style>
<script>
    function showToast(type, message) {
        var toastId = 'toast-' + new Date().getTime();
        var toastHtml = '<div id="' + toastId + '" class="toast bg-' + type + ' text-white" role="alert" aria-live="assertive" aria-atomic="true">' +
            '<div class="toast-body">' +
            message +
            '</div>' +
            '</div>';

        $('.toast-container').append(toastHtml);

        var toastElement = $('#' + toastId);
        var toast = new bootstrap.Toast(toastElement);
        toast.show();

        setTimeout(function() {
            toast.hide();
            toastElement.remove();
        }, 3000);
    }
</script>