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

        <!-- While we should throw exception if the hero is not found,
                we'll add a check just in case. -->
        <?php if (empty($hero)) : ?>
            <div class="alert alert-warning">
                Hero not found.
            </div>
        <?php endif ?>

        <!-- Hero Details -->
        <?php if ($hero) : ?>
            <div class="container text-center">
                <div class="col-6 mx-auto">

                <div class="card shadow">
                    <img src="<?= base_url('images/'. esc($hero->image, 'attr')) ?>"
                        alt="<?= esc($hero->name, 'attr') ?>"
                        class="card-img-top"
                    >
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($hero->name) ?></h5>

                        <p class="card-text">Level <?= $hero->level ?? 0 ?> <?= $hero->class ?? '' ?></p>
                    </div>
                    </div>

                </div>
            </div>

        <?php endif ?>
    </div>
<?= $this->endSection() ?>
