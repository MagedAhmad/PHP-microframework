<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/output.css">
    <title>Trending Repositories</title>
</head>
<body class="flex items-center justify-center tracking-wider leading-normal" style="background: #edf2f7;">
<div class="font-sans bg-grey-lighter flex flex-col min-h-screen w-full">
  <div>
    <nav class="flex items-center justify-between flex-wrap bg-blue-600 p-6">
      <div class="flex items-center flex-shrink-0 text-white mr-6">
        <span class="font-semibold text-xl tracking-tight">Trending Repositories</span>
      </div>
      <div class="block lg:hidden">
        <button  onclick="toggle()" class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
          <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
      </div>
      <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto hidden" id="menu">
        <div class="text-sm lg:flex-grow">
          <a href="#" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">
            Docs
          </a>
          <a href="https://github.com/MagedAhmad/PHP-microframework" target="_blank" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">
            Project on Github
          </a>
        </div>

      </div>
    </nav>
    <div class="hidden bg-blue-dark md:block md:bg-white md:border-b">
      <div class="container mx-auto px-4">
        <div class="md:flex">
          <div class="flex -mb-px mr-8">
            <a href="/" class="no-underline text-black md:text-blue-600 flex items-center py-4 border-b border-blue-400">
              <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M3.889 3h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H3.89A.9.9 0 0 1 3 12.09V3.91A.9.9 0 0 1 3.889 3zM3.889 15h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H3.89C3.398 21 3 20.616 3 20.143v-4.286c0-.473.398-.857.889-.857zM13.889 11h6.222a.9.9 0 0 1 .889.91v8.18a.9.9 0 0 1-.889.91H13.89a.9.9 0 0 1-.889-.91v-8.18a.9.9 0 0 1 .889-.91zM13.889 3h6.222c.491 0 .889.384.889.857v4.286c0 .473-.398.857-.889.857H13.89C13.398 9 13 8.616 13 8.143V3.857c0-.473.398-.857.889-.857z"/></svg>              Dashboard
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="flex-grow mx-auto sm:px-4 pt-6 pb-8">