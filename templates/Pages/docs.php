<?php

/**
 * @var \App\View\AppView $this
 */
$apiUrl = $this->Url->build('/api/images:annotate', ['fullBase' => true]);
?>

<div class="relative py-16 bg-white overflow-hidden">
  <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
    <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
      <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
        <defs>
          <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
      </svg>
      <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
        <defs>
          <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
      </svg>
      <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
        <defs>
          <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
          </pattern>
        </defs>
        <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
      </svg>
    </div>
  </div>
  <div class="relative px-4 sm:px-6 lg:px-8">
    <div class="text-lg max-w-prose mx-auto">
      <h1>
        <span class="hidden text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">Introducing</span>
        <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
          Documentation
        </span>
      </h1>
      <p class="mt-8 text-xl text-gray-500 leading-8">
        To start filtering content on your site using our API, you'll need an API key.
        If you don't have one already, you can
        <a class="text-teal-600 font-medium hover:text-teal-700 transition duration-200" href="<?= $this->Url->build('/sign-up') ?>">get one here</a>.
      </p>
    </div>
    <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
      <div>
        <span class="block font-semibold text-gray-700">Endpoint</span>
        <pre style="margin-top: 10px;"><span><span class="text-cyan-400">POST</span> https://filterd.cloud/api/images:annotate</span></pre>
      </div>
      <div>
        <span class="block font-semibold text-gray-700">Headers</span>
        <table style="margin-top: 0.5em;" class="min-w-full divide-y divide-gray-200 table-auto sm:table-fixed">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                <!-- Name -->
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Value
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                Authorization
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                Bearer &lt;your-api-key-here&gt;
              </td>
            </tr>

            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                Content-Type
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                multipart/form-data
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div>
        <span class="block font-semibold text-gray-700">Body</span>
        <table style="margin-top: 0.5em;" class="min-w-full divide-y divide-gray-200 table-auto sm:table-fixed">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Key
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Value
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                image
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                your image
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div>
        <span class="block font-semibold text-gray-700">Example (cURL)</span>
        <pre style="margin-top: 10px;">
curl \
  -F "image=@/yourPath/yourImageFile.jpg" \
  -H "Authorization: Bearer &lt;your-api-key-here&gt;"
  'https://filterd.cloud/api/images:annotate'</pre>
      </div>

      <div>
        <span class="block font-semibold text-gray-700">Response</span>
        <pre style="margin-top: 10px;">
200 OK
{
  <span class="text-yellow-500">"suggestion": "reject",</span> <span class="text-gray-500">// accept, reject, or review</span>
  <span class="text-yellow-500">"concerns": </span>{
    <span class="text-yellow-500">"adult": "VERY_LIKELY",</span>
    <span class="text-yellow-500">"racy": "LIKELY",</span>
    <span class="text-yellow-500">"violence": "POSSIBLE"</span>
  }
}</pre>
      </div>
  </div>
</div>