<?php

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="my-4 px-4 py-3 bg-red-100 rounded shadow-sm" onclick="this.classList.add('hidden');">
    <div class="flex justify-between items-center text-sm text-red-700 font-medium">
        <span><?= $message ?></span>
        <button type="button" class="text-lg leading-tight">&times;</button>
    </div>
</div>