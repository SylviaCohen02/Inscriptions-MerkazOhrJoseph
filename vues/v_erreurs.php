
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>Connexion</title>
        <link href="../styles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="d-flex flex-wrap align-items-center justify-content-center">
        <div class="alert alert-danger">

            <?php
            foreach ($_REQUEST['erreurs'] as $erreur) {
                echo '<p>' . htmlspecialchars($erreur) . '</p>';
            }
            ?>
        </div>
        </div>
    </body>
</html>