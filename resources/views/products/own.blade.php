@include('header')

<div class="bg-white py-12">
  <div class="mx-auto px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
    <div class="flex justify-between items-center mb-7">
      <h2 class="text-3xl font-medium text-gray-700 ">My Products</h2>
      @if(Auth::check())
          @if(auth()->user()->product_management === 1)
          <a href="/products/add" class="rounded-md border border-transparent bg-primary px-8 py-3 text-base font-medium text-white hover:bg-dark-primary">New product</a>
          @endif
      @endif
    </div>
    @if(Auth::check())
        @if(auth()->user()->category_management === 0) 
            <span class="inline-flex items-center rounded-md mb-5 w-full bg-red-50 px-2 py-1 text-base font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/10">
            You don't have permission to manage a product. Wait until the Admin granted you a permission.
            </span>
        @endif
    @endif
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
    @foreach($productList as $product)
      <a href="info/{{ $product->id }}" class="group">
        <div class="h-64 w-full overflow-hidden rounded-lg bg-gray-200">
          <img src="{{ asset('images/products/'. $product->photo) }}" alt="" class="h-full w-full object-cover object-center group-hover:opacity-75">
        </div>
        <h3 class="mt-4 text-base text-gray-700">{{ $product->product_name }}</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">&#8369;{{ $product->price }}</p>
      </a>
    @endforeach
    </div>
  </div>
</div>

@include('footer')