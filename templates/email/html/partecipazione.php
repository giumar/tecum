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
<p>Nuova partecipazione all'evento: <?= $event->name; ?></p>
<p>La persona: <strong><?= $participant->name; ?> <?= $participant->surname; ?></strong> si è registrata.</p>

<h4>Elenco dei partecipanti</h4>
<table class="table">
    <thead>
        <tr>
            <th>Data di registrazione</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($event['participants'] as $participant) : ?>
            <tr>
                <td><?= $participant->created ?></td>
                <td><?= $participant->name ?></td>
                <td><?= $participant->surname ?></td>
                <td><?= $participant->email ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3"><?= $participant->notes ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

