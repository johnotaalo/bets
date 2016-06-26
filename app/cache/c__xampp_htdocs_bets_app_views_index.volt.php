<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bets</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <?= $this->assets->outputCss() ?>
    </head>
    <body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Bets</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if ($this->session->get('logged_in') == 1) { ?>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?= $this->url->get('dashboard') ?>">Dashboard <span class="sr-only">(current)</span></a></li>
                    <li><a href = "<?= $this->url->get('bets') ?>">Bets</a></li>
                    <li><a href = "<?= $this->url->get('analytics') ?>">Analytics</a></li>
                    <li><a href = "<?= $this->url->get('account') ?>">Account</a></li>
                </ul>
                <?php } ?>
                <ul class="nav navbar-nav navbar-right">
                    <?php if ($this->session->get('logged_in') == 1) { ?>
                    <li><a>Hi, <?= $this->session->get('username') ?> </a></li>
                    <li><a href="<?= $this->url->get('auth/signout') ?>">Logout</a></li>
                    <?php } else { ?>
                    <li><a href = "<?= $this->url->get('auth/signin') ?>">Log In</a></li>
                    <li><a href = "<?= $this->url->get('auth/signup') ?>">Create An Acount</a></li>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
        <div class="container">
            <?= $this->getContent() ?>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <?= $this->assets->outputJs() ?>

        <?php if (isset($javascript)) { ?>

            <?= $javascript ?>

        <?php } ?>
    </body>
</html>
