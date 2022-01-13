<?php

/**
 * @var \App\View\AppView $this
 * @var \Authentication\IdentityInterface $identity
 */
?>
<div class="w-full px-6 py-5 bg-white rounded-md shadow text-gray-700 break-words">
  <p class="w-full">
    Your API key is <b><?= $apiKey ?></b>
  </p>
  <p class="mt-6">
    Please
    <a
      href="<?= $this->Url->build('/docs') ?>"
      target="_blank"
      rel="noopener noreferrer"
      class="text-teal-600 font-semibold hover:text-teal-700 transtion duration-200"
    >
      see our docs
    </a>
    to learn how to moderate content using our API!
  </p>
</div>
