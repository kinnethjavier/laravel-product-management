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
</head>
<body>
<div class="flex h-screen flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="{{ asset('images/divisoria-logo.png') }}" alt="Divisoria">
    <h2 class="mt-8 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="{{ route('login') }}" method="POST">
      @if (session('success'))
        <span class="inline-flex items-center rounded-md w-full bg-green-50 px-2 py-1 text-base font-medium text-green-700 ring-1 ring-inset ring-green-600/10">
          {{ session('success') }}
        </span>
      @endif

      @if (session('error'))
        <span class="inline-flex items-center rounded-md w-full bg-red-50 px-2 py-1 text-base font-medium text-red-700 ring-1 ring-inset ring-red-600/10">
          {{ session('error') }}
        </span>
      @endif

      @csrf
      <div>
        <label for="email" class="block text-base font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
        </div>
      </div>

      <div>
        <label for="password" class="block text-base font-medium leading-6 text-gray-900">Password</label>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
        </div>
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-primary px-3 py-1.5 text-base font-semibold leading-6 text-white shadow-sm hover:bg-dark-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">Sign in</button>
      </div>
    </form>

    <p class="mt-10 text-center text-base text-gray-500">
      Don't have an account?
      <a href="/register" class="font-semibold leading-6 text-primary hover:text-dark-primary">Sign up</a>.
    </p>
  </div>
</div>
</body>
</html>