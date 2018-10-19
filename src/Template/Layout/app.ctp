<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <? // Bootstrap must come first ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('app.css') ?>
    <?= $this->Html->css('pe-icon-7-stroke.css') ?>
    <?= $this->Html->css('animate.min.css') ?>
    <?= $this->Html->script('app.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>

<body>

<div class="wrapper">
    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar" data-color="blue" data-image="/img/background-2-color.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/general/dashboard" class="simple-text">
                    <?= Configure::read('App.name') ?>
                </a>
            </div>

            <ul class="nav">
                <li class="<?php echo (!empty($this->request->action) && ($this->request->action=='display') )?'active' :'inactive' ?>">
                    <a href="/general/dashboard">
                        <i class="pe-7s-home"></i>
                        <p>Home</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">

        <?= $this->element('Structure/header') ?>

        <div class="content">
            <?= $this->fetch('content') ?>
        </div>

        <?= $this->element('Structure/footer') ?>

    </div>
    <?= $this->Flash->render() ?>
</body>
</html>
