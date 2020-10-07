<form <?= html_attr($data['attr']); ?>>
    <!-- Generating fields -->
    <?php foreach ($data['fields'] ?? [] as $field_id => $field): ?>
        <?php if (isset($field['label'])): ?>
            <label><span><?= $field['label']; ?></span>
        <?php endif; ?>
        <?php if ($field['type'] == 'select'): ?>
            <select <?= select_attr($field_id, $field); ?>>
                <?php foreach ($field['options'] ?? [] as $option_id => $option): ?>
                    <option
                        <?= option_attr($option_id, $field); ?>><?= is_array($option) ? $option['title'] : $option; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php else: ?>
            <div class="form-field"><input <?= input_attr($field_id, $field); ?> /></div></label>
            <?php if (isset($field['error'])): ?>
                <span class="input-error"><?= $field['error']; ?></span>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php if (isset($data['error'])): ?>
        <span class="form-error"><?= $data['error'] ?? ''; ?></span>
    <?php endif; ?>
    <?php if (isset($data['message'])): ?>
        <span class="form-success"><?= $data['message'] ?? ''; ?></span>
    <?php endif; ?>

    <!-- Generating buttons -->
    <?php foreach ($data['buttons'] ?? [] as $button_id => $button): ?>
        <button <?= button_attr($button_id, $button); ?>><?= $button['title']; ?></button>
    <?php endforeach; ?>


</form>
