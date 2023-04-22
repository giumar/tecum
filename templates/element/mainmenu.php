<?php
/*
 * The MIT License
 *
 * Copyright 2022 gmarz.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
?>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $this->Url->build('/'); ?>"><i class="bi bi-house-fill"></i> Tecum</a>
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
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= $this->Url->build(['prefix' => 'User', 'controller' => 'Profile', 'action' => 'index']); ?>">Profile</a>
                    </li>
                </ul>
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
