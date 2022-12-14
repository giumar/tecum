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
<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Data di inizio</th>
            <th>Data di fine</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($events as $event) {
            echo "<tr><td>". $this->Html->link($event->name, ['controller' => 'events', 'action' => 'view', $event->id]) ."</td><td>". $event->start_at ."</td><td>". $event->end_at  ."</td></tr>";
        }
        ?>
    </tbody>
</table>

