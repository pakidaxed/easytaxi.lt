<div class="container">
    <div class="top-menu">
        <div class="menu-left">
            <a href="<?= $data['home']['url'] ?>"><?= $data['home']['title'] ?></a>
            <a href="<?= $data['feedbacks']['url'] ?>"><?= $data['feedbacks']['title'] ?></a>
        </div>
        <div class="menu-right">
            <?php
            unset($data['home']);
            unset($data['feedbacks']);
            foreach ($data as $menu_item):
                ?>
                <a href="<?= $menu_item['url'] ?>"><?= $menu_item['title'] ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
