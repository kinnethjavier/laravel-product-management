@include('header')

<div class="bg-white py-12">
  <div class="mx-auto px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-3xl font-medium text-gray-700 mb-7">All Products</h2>
    @if (session('error'))
        <span class="inline-flex items-center rounded-md mb-5 w-full bg-red-50 px-2 py-1 text-base font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/10">
        {{ session('error') }}
        </span>
    @endif
    @if (session('success'))
      <span class="inline-flex items-center rounded-md w-full bg-green-50 px-2 py-1 text-base font-medium text-green-700 ring-1 ring-inset ring-green-600/10 mb-5">
        {{ session('success') }}
      </span>
    @endif
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      @foreach($productList as $product)
        <a href="/products/info/{{ $product->id }}" class="group">
          <div class="h-64 w-full overflow-hidden rounded-lg bg-gray-200">
            <img src="{{ asset('images/products/'. $product->photo) }}" alt="" class="h-full w-full object-cover object-center group-hover:opacity-75">
          </div>
          <h3 class="mt-4 text-base text-gray-700">{{ $product->product_name }}</h3>
          <h3 class="mt-1 text-sm text-gray-500">Added by {{ $product->user->first_name }} {{ $product->user->last_name }}</h3>
          <p class="mt-1 text-lg font-medium text-gray-900">&#8369;{{ $product->price }}</p>
        </a>
      @endforeach
    </div>
  </div>
</div>

@include('footer')