<!--
    We are using View Layouts to provide a consistent
    look to the site. The `extend()` method tells the
    name of the view that this view will work with to
    display the final content. In this case, the view
    is at app/Views/layout.php
-->
<?= $this->extend('layout') ?>

<!--
    Everything between `section()` and `endSection()
    is inserted into the `layout` view where it calls
    `$this->renderSection('content')`.
-->
<?= $this->section('content') ?>
    <div class="row">

        <!-- Heroes -->
        <div class="col">
            <h2>Heroes</h2>

            <?php if (isset($heroes) && count($heroes)) : ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 3em">ID</th>
                            <th>Name</th>
                            <th>Level</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($heroes as $hero) : ?>
                        <tr>
                            <td><?= $hero->id ?></td>
                            <!--
                                Always escape data that users could have entered with the
                                `esc()` function. By default it assumes it's part of HTML.
                            -->
                            <td><a href="<?= base_url() ?>/heroes/<?= $hero->id ?>"><?= esc($hero->name ?? '') ?></a></td>
                            <td><?= $hero->level ?? 0 ?></td>
                            <td><?= esc($hero->class ?? '') ?></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert alert-warning">
                    No Heroes found.
                </div>
            <?php endif ?>
        </div>

        <!-- Dungeons -->
        <div class="col">
            <h2>Dungeons</h2>

            <?php if (isset($dungeons) && count($dungeons)) : ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 3em">ID</th>
                        <th>Name</th>
                        <th>Difficulty</th>
                        <th>Capacity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dungeons as $dungeon) : ?>
                        <tr>
                            <td><?= $dungeon->id ?></td>
                            <td><a href="<?= $dungeon->link() ?>"><?= esc($dungeon->name ?? '') ?></a></td>
                            <td><?= $dungeon->difficulty ?? 0 ?></td>
                            <td><?= $dungeon->capacity ?? 0 ?></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert alert-warning">
                    No Dungeons found.
                </div>
            <?php endif ?>
        </div>
    </div>
<?= $this->endSection() ?>
