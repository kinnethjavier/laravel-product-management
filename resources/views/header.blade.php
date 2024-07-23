<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisoria</title>
    <!-- Offline use Tailwind script -->
    <script type="text/javascript" src="{{ asset('js/tailwind.min.js') }}"></script>
    <!-- Custom config Tailwind -->
    <script type="text/javascript" src="{{ asset('js/tailwind-config.js') }}"></script>
    <!-- Offline use JQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Offline use Sweet Alert -->
    <script ype="text/javascript" src="{{ asset('js/sweet-alert.min.js') }}"></script>
    <!-- Sweet Alert CSS -->
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
<nav class="w-full fixed bg-white shadow z-[999]">
  <div class="mx-auto max-w-7xl px-2 sm:px-4 lg:px-8">
    <div class="flex h-16 justify-between">
      <div class="flex px-2 lg:px-0">
        <div class="flex flex-shrink-0 items-center">
          <img class="h-8 w-auto" src="{{ asset('images/divisoria-logo.png') }}" alt="Divisoria">
        </div>
        <div class="hidden lg:ml-6 lg:flex lg:space-x-8">
          <a href="/products" class="inline-flex items-center border-b-2 border-primary px-1 pt-1 text-base font-medium text-gray-900">Products</a>
          <a href="/categories" class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-base font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Categories</a>
          <a href="/products/own" class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-base font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">My Products</a>
          @if(Auth::check())
            @if(auth()->user()->role === "Admin")
            <a href="/users" class="inline-flex items-center border-b-2 border-transparent px-1 pt-1 text-base font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">Users</a>
            @endif
          @endif
        </div>
      </div>
      <div class="flex items-center lg:hidden">
        @if(Auth::check())
        <button id="btn-mobile-menu" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none outline-0 focus:ring-2 focus:ring-inset focus:ring-primary" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>

          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>

          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        @else
        <div>
        <a href="/login" class="rounded-md border border-transparent bg-primary px-4 py-1.5 text-base font-medium text-white hover:bg-dark-primary">Sign in</a>
        </div>
        @endif
      </div>
      @if(Auth::check()) 
      <div class="hidden lg:ml-4 lg:flex lg:items-center">
        <!-- Profile dropdown -->
        <div class="relative ml-4 flex-shrink-0">
          <div>
            <button id="btn-account-menu" type="button" class="relative flex items-center rounded-full bg-white text-base focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <span class="text-base text-white bg-primary py-1 px-3 rounded-full">{{ substr(auth()->user()->first_name, 0, 1) }}</span>
              <span class="text-base text-gray-900 ml-2.5">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span>
            </button>
          </div>

          <div id="account-menu" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <a href="/users/password" class="block px-4 py-2 text-base text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Change password</a>
            <form action="{{ route('logout') }}" method="GET">
              <button type="submit" class="block px-4 py-2 text-base text-gray-700">Sign out</button>
            </form>
          </div>
        </div>
      </div>
      @else
      <div class="hidden lg:ml-4 lg:flex lg:items-center">
      <a href="/login" class="rounded-md border border-transparent bg-primary px-4 py-1.5 text-base font-medium text-white hover:bg-dark-primary">Sign in</a>
      </div>
      @endif
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  @if(Auth::check()) 
  <div class="hidden lg:hidden" id="mobile-menu">
    <div class="space-y-1 pb-3 pt-2">
      <a href="/products" class="block border-l-4 border-primary bg-blue-50 py-2 pl-3 pr-4 text-base font-medium text-primary">Products</a>
      <a href="/categories" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800">Categories</a>
      <a href="/products/own" class="block border-l-4 border-transparent py-2 pl-3 pr-4 text-base font-medium text-gray-600 hover:border-gray-300 hover:bg-gray-50 hover:text-gray-800">My Products</a>
    </div>
    <div class="border-t border-gray-200 pb-3 pt-4">
      <div class="flex items-center px-4">
        <div class="flex-shrink-0">
        <span class="text-base text-white bg-primary py-1.5 px-3 rounded-full">{{ substr(auth()->user()->first_name, 0, 1) }}</span>
        </div>
        <div class="ml-3">
          <div class="text-base font-medium text-gray-800">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
          <div class="text-base font-medium text-gray-500">{{ auth()->user()->email }}</div>
        </div>
      </div>
      <div class="mt-3 space-y-1">
        <a href="/users/password" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Change password</a>
        <form action="{{ route('logout') }}" method="GET">
        <button type="submit" class="block px-4 py-2 text-base font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800">Sign out</button>
        </form>
      </div>
    </div>
  </div>
  @endif
</nav>

<!-- External script -->
<script type="text/javascript" src="{{ asset('js/users/index.js') }}"></script>