<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">
  <div class="relative max-w-xl mx-auto">
    <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
      <defs>
        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
    </svg>
    <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
      <defs>
        <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
    </svg>
    <div class="text-center">
      <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        Get your site <?= $this->element('logo-text', ['class' => 'font-medium']) ?>
      </h2>
      <p class="mt-4 text-lg leading-6 text-gray-500">
        Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor lacus arcu.
      </p>
    </div>

    <?= $this->Flash->render() ?>

    <div class="mt-12">
      <?= $this->Form->create(null, ['method' => 'post', 'class' => 'grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8']) ?>
        <div class="sm:col-span-2">
          <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
          <div class="mt-1">
            <input required type="text" name="firstName" id="first-name" autocomplete="given-name" class="py-3 px-4 block w-full shadow-sm focus:ring-teal-500 focus:border-teal-500 border-gray-300 rounded-md">
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <div class="mt-1">
            <input required id="email" name="email" type="email" autocomplete="email" class="py-3 px-4 block w-full shadow-sm focus:ring-teal-500 focus:border-teal-500 border-gray-300 rounded-md">
          </div>
        </div>
        <div class="sm:col-span-2">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <div class="mt-1">
            <?= $this->Form->control('password', [
              'required' => true,
              'label' => false,
              'id' => 'password',
              'name' => 'password',
              'placeholder' => 'at least 8 characters long',
              'minlength' => 8,
              'maxlength' => 60,
              'class' => 'py-3 px-4 block w-full shadow-sm focus:ring-teal-500 focus:border-teal-500 border-gray-300 rounded-md'
            ]) ?>
          </div>
        </div>
        <div class="sm:col-span-2">
          <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
            Get Started
          </button>
        </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</div>