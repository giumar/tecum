<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css(['bootstrap.min']) ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <header class="container">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= $this->Url->build('/'); ?>"><i class="bi bi-house-fill"></i> Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?= $this->Url->build('/events'); ?>"><i class="bi bi-calendar-event"></i> Eventi</a>
                            </li>                     
                        </ul>
                        <?php if ($this->request->getSession()->read('Auth.id')) : ?>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        <?php endif; ?>
                        <ul class="navbar-nav justify-content-end">
                            <li class="nav-item">
                                <?php if ($this->request->getSession()->read('Auth.id')) { ?>
                                    <a class="nav-link" aria-current="page" href="<?= $this->Url->build('/users/logout'); ?>"><i class="bi bi-door-closed-fill"></i>Logout</a>
                                <?php } else { ?>
                                    <a class="nav-link" aria-current="page" href="<?= $this->Url->build('/users/login'); ?>"><i class="bi bi-door-open-fill"></i>Login</a>
                                <?php } ?>                            
                            </li>                        
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="main">
            <div class="container">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>
        <footer class="container">
        </footer>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
