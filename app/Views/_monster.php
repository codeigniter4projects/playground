<?php if (! empty($monster)) : ?>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="<?= esc($monster->image(), 'attr') ?>"
                    class="img-fluid rounded-start"
                    alt="<?= esc($monster->name) ?>"
                >
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($monster->name) ?></h5>
                    <p>Health: <?= $monster->health ?? 0 ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>
