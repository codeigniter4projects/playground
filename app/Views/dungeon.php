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
    <div class="">

        <!-- While we should throw exception if the dungeon is not found,
                we'll add a check just in case. -->
        <?php if (empty($dungeon)) : ?>
            <div class="alert alert-warning">
                Dungeon not found.
            </div>
        <?php endif ?>

        <!-- Dungeon Details -->
        <?php if ($dungeon) : ?>
            <div class="container text-center">
                <div class="col-6 mx-auto">

                    <div class="card shadow">
                        <img src="<?= base_url('images/dungeon.png') ?>"
                            alt="<?= esc($dungeon->name, 'attr') ?>"
                            class="card-img-top"
                        >
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($dungeon->name) ?></h5>

                            <ul class="card-text list-unstyled">
                                <li>Capacity: <?= esc($dungeon->capacity) ?></li>
                                <li>Difficulty: <?= esc($dungeon->difficulty) ?></li>
                            </ul>

                            <br>

                            <h6>Monsters in Residence</h6>

                            <?php foreach($monsters as $monster) : ?>
                                <!-- It's nice to keep things simple.
                                    Don't be afraid to use view fragments
                                    to keep your code clean and readable.
                                -->
                                <?= view('_monster', ['monster' => $monster]) ?>
                            <?php endforeach ?>
                        </div>
                    </div>

                </div>
            </div>

        <?php endif ?>
    </div>
<?= $this->endSection() ?>
