<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Inserisci la tua email e la password') ?></legend>
        <div class="mb-3">
            <?= $this->Form->label('email', null, ['class' => 'form-label']) ?>
            <?= $this->Form->input('email', ['class' => 'form-control']) ?>
        </div>
        <div class="mb-3">
            <?= $this->Form->label('password', null, ['class' => 'form-label']) ?>
            <?= $this->Form->input('password', ['type' => 'password', 'class' => 'form-control']) ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary']); ?>
    <?= $this->Form->end() ?>
</div>
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

