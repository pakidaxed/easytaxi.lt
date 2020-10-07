<div class="container">
    <div class="feedbacks">
        <h2>Customer Feedbacks</h2>
        <?php foreach ($data['feedbacks'] as $feedback): ?>
            <div class="feedback">
                <p><cite><?= $feedback['comment'] ?></cite> by <?= $feedback['name'] ?> (<?= $feedback['date'] ?>)</p>
            </div>
        <?php endforeach; ?>
        <?php if (isset($data['form'])): ?>
        <h2>Leave your comment</h2>
        <?= $data['form'] ?>
        <?php else: ?>
        <div class="feedbacks-message">
            <?= $data['form'] ?? 'Only registered users can leave a comment. Please <a href="/register">register</a>.' ?>
        </div>
        <?php endif; ?>
    </div>
</div>
