<?php

use Core\Helpers\Helper;
?>
<div class="mt-5 d-flex flex-row-reverse gap-3">
    <?php if (Helper::check_permission(['item:read', 'item:update'])) : ?>
        <a href="/items/edit?id=<?= $data->post->id ?>" class="btn btn-warning">Edit</a>
    <?php endif;
    if (Helper::check_permission(['user:read', 'item:delete'])) :
    ?>
        <a href="/items/delete?id=<?= $data->post->id ?>" class="btn btn-danger">Delete</a>
    <?php endif; ?>
</div>

<div class="my-5">
    <!-- for admins -->
    <h1 class="text-center">
        <?= $data->post->title ?>
    </h1>

    <p>
        <?= $data->post->content ?>
    </p>
</div>