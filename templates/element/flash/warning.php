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
<div class="my-4 px-4 py-3 bg-yellow-100 rounded shadow-sm" onclick="this.classList.add('hidden');">
    <div class="flex justify-between items-center text-sm text-yellow-700 font-medium">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="ml-2"><?= $message ?></span>
        </div>
        <button type="button" class="text-lg leading-tight">&times;</button>
    </div>
</div>