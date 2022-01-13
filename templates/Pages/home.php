<?php

/**
 * @var \App\View\AppView $this
 */
?>

<div class="lg:relative">
  <div class="mx-auto max-w-7xl w-full pt-16 pb-20 text-center lg:py-48 lg:text-left">
    <div class="px-4 lg:w-1/2 sm:px-8 xl:pr-16">
      <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
        <span class="block xl:inline">Moderate content</span>
        <span class="block text-teal-600 xl:inline">at scale</span>
      </h1>
      <p class="mt-3 max-w-md mx-auto text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">
        Say goodbye to slow, manual content reviews. With our blazing-fast, AI-powered APIs,
        moderating all your user-generated content happens in seconds. Not hours.
      </p>
      <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
        <div class="rounded-md shadow">
          <a href="<?= $this->Url->build('/sign-up') ?>" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 md:py-4 md:text-lg md:px-10">
            Get started
          </a>
        </div>
        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
          <a x-data="{}" @click.prevent="document.getElementById('details').scrollIntoView({ behavior: 'smooth' })" href="#details" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-teal-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
            Learn more
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:h-full">
    <img class="absolute inset-0 w-full h-full object-cover" src="https://images.unsplash.com/photo-1515560570411-00a0026e6086?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
  </div>
</div>


<div id="details" class="py-16 bg-white overflow-hidden lg:py-24">
  <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">

    <div class="relative mt-12 lg:mt-24 lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
      <div class="relative">
        <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight sm:text-3xl">
          Eliminate worrying images in an instant
        </h3>
        <p class="mt-3 text-lg text-gray-500">
          Automatically identify and remove various classes of offensive content like nudity,
          drugs, violence and more, all without breaking a sweat.
        </p>

      </div>

      <div class="mt-10 -mx-4 relative lg:mt-0 lg:pl-12" aria-hidden="true">
        <img class="relative mx-auto sm:rounded-xl sm:shadow-xl" src="<?= $this->Url->build('/img/unsafe.png') ?>" alt="">
      </div>
    </div>

    <svg class="hidden lg:block absolute right-full transform translate-x-1/2 translate-y-12" width="404" height="784" fill="none" viewBox="0 0 404 784" aria-hidden="true">
      <defs>
        <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="784" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)" />
    </svg>

    <div class="relative mt-12 sm:mt-16 lg:mt-48">
      <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-8 lg:items-center">
        <div class="lg:col-start-2 lg:pl-12">
          <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight sm:text-3xl">
            Let the good stuff in. With ease.
          </h3>
          <p class="mt-3 text-lg text-gray-500">
            Approving safe content has never been faster. According to Sharon in IT,
            great cat pics make our AI engine even smarter. So please send lots of those.
          </p>

        </div>

        <div class="mt-10 -mx-4 relative lg:mt-0 lg:col-start-1">
          <img class="relative mx-auto sm:rounded-xl sm:shadow-xl" src="<?= $this->Url->build('/img/safe-analysis.png') ?>" alt="">
        </div>
      </div>
    </div>

    <div class="relative mt-12 sm:mt-16 lg:mt-48 lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
      <div class="relative lg:pr-12">
        <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight sm:text-3xl">
          Take a walk on the beach
        </h3>
        <p class="mt-3 text-lg text-gray-500">
          Or learn to play the violin. Maybe read that book? 👀. We automate your
          content moderation so you can explore more of what life has to offer.
        </p>

      </div>

      <div class="mt-10 -mx-4 relative lg:mt-0 lg:pl-12" aria-hidden="true">
        <img class="relative mx-auto sm:rounded-xl sm:shadow-xl" src="<?= $this->Url->build('/img/beach.png') ?>" alt="">
      </div>
    </div>
  </div>
</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div id="pricing" class="bg-teal-900">
  <div class="pt-12 sm:pt-16 lg:pt-24">
    <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto space-y-2 lg:max-w-none">
        <h2 class="text-lg leading-6 font-semibold text-gray-300 uppercase tracking-wider">
          Pricing
        </h2>
        <p class="text-3xl font-extrabold text-white sm:text-4xl lg:text-5xl">
          Simple, clear pricing
        </p>
        <p class="text-xl text-gray-300">
          <!-- -->
        </p>
      </div>
    </div>
  </div>
  <div class="mt-8 pb-12 bg-gray-50 sm:mt-12 sm:pb-16 lg:mt-16 lg:pb-24">
    <div class="relative">
      <div class="absolute inset-0 h-3/4 bg-teal-900"></div>
      <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto space-y-4 lg:max-w-5xl lg:grid lg:grid-cols-2 lg:gap-5 lg:space-y-0">
          <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
              <div>
                <h3 class="inline-flex rounded-full text-sm font-semibold tracking-wide uppercase text-gray-600" id="tier-standard">
                  Free
                </h3>
              </div>
              <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                $0
                <span class="ml-1 text-2xl font-medium text-gray-500">
                  /mo
                </span>
              </div>
              <p class="mt-5 text-lg text-gray-500">
                For small websites and blogs. Free forever.
              </p>
            </div>
            <div class="flex-1 flex flex-col justify-between px-6 pt-6 pb-8 bg-gray-50 space-y-6 sm:p-10 sm:pt-6">
              <ul role="list" class="space-y-4">
                <li class="flex items-start">
                  <div class="flex-shrink-0">
                    <!-- Heroicon name: outline/check -->
                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                  </div>
                  <p class="ml-3 text-base text-gray-700">
                    100 API calls per month
                  </p>
                </li>

                <li class="flex items-start">
                  <div class="flex-shrink-0">
                    <!-- Heroicon name: outline/check -->
                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                  </div>
                  <p class="ml-3 text-base text-gray-700">
                    99.9% uptime
                  </p>
                </li>

                <li class="flex items-start">
                  <div class="flex-shrink-0">
                    <!-- Heroicon name: outline/check -->
                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                  </div>
                  <p class="ml-3 text-base text-gray-700">
                    24 hour email support
                  </p>
                </li>
              </ul>
              <div class="rounded-md shadow">
                <a href="<?= $this->Url->build('/sign-up') ?>" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-teal-800 hover:bg-teal-900" aria-describedby="tier-standard">
                  Get started
                </a>
              </div>
            </div>
          </div>

          <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
              <div>
                <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-blue-100 text-blue-600" id="tier-standard">
                  Coming Soon
                </h3>
              </div>
              <div class="mt-4 flex items-baseline text-6xl font-extrabold">
                $99
                <span class="ml-1 text-2xl font-medium text-gray-500">
                  /mo
                </span>
              </div>
              <p class="mt-5 text-lg text-gray-500">
                Everything included in free plus:
              </p>
            </div>
            <div class="flex-1 flex flex-col justify-between px-6 pt-6 pb-8 bg-gray-50 space-y-6 sm:p-10 sm:pt-6">
              <ul role="list" class="space-y-4">
                <li class="flex items-start">
                  <div class="flex-shrink-0">
                    <!-- Heroicon name: outline/check -->
                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                  </div>
                  <p class="ml-3 text-base text-gray-700">
                    50,000 API calls per month
                  </p>
                </li>

                <li class="flex items-start">
                  <div class="flex-shrink-0">
                    <!-- Heroicon name: outline/check -->
                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                  </div>
                  <p class="ml-3 text-base text-gray-700">
                    Faster response times
                  </p>
                </li>

                <li class="flex items-start">
                  <div class="flex-shrink-0">
                    <!-- Heroicon name: outline/check -->
                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                  </div>
                  <p class="ml-3 text-base text-gray-700">
                    Batch annotations
                  </p>
                </li>

                <li class="flex items-start">
                  <div class="flex-shrink-0">
                    <!-- Heroicon name: outline/check -->
                    <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                  </div>
                  <p class="ml-3 text-base text-gray-700">
                    Premium support
                  </p>
                </li>
              </ul>
              <div class="rounded-md shadow">
                <button disabled class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-500 bg-gray-100" aria-describedby="tier-standard">
                  Coming Soon
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-gray-50 mt-16 md:mt-24">
  <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
      <span class="block">What are you waiting for?</span>
      <span class="block text-teal-600">Start your free trial today.</span>
    </h2>
    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
      <div class="inline-flex rounded-md shadow">
        <a href="<?= $this->Url->build('/sign-up') ?>" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700">
          Get started
        </a>
      </div>
      <div class="hidden ml-3 inline-flex rounded-md shadow">
        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-teal-600 bg-white hover:bg-teal-50">
          Learn more
        </a>
      </div>
    </div>
  </div>
</div>