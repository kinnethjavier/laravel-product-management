@include('header')

<div class="bg-white pt-24 pb-20">
  @if($productInfo)
  <div class="pt-6">
    <nav aria-label="Breadcrumb">
      <ol role="list" class="mx-auto flex max-w-2xl items-center space-x-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <li>
          <div class="flex items-center">
            <a href="/" class="mr-2 text-sm font-medium text-gray-900">Divisoria</a>
            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
              <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
            </svg>
          </div>
        </li>
        <li>
          <div class="flex items-center">
            <h4 class="mr-2 text-sm font-medium text-gray-900">{{ $productInfo->user->first_name }} {{ $productInfo->user->last_name }}</h4>
            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="h-5 w-4 text-gray-300">
              <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
            </svg>
          </div>
        </li>

        <li class="text-sm">
          <h4 class="font-medium text-gray-500 hover:text-gray-600">{{ $productInfo->product_name }}</h4>
        </li>
      </ol>
    </nav>

    <div class="mx-auto mt-6 max-w-2xl sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
      <!-- Product Image -->
      <div class="aspect-h-5 aspect-w-4 lg:aspect-h-4 lg:aspect-w-3 sm:overflow-hidden sm:rounded-lg">
        <img src="{{ asset('images/products/'. $productInfo->photo) }}" alt="" class="h-full w-full object-cover object-center bg-gray-100">
      </div>
      <div class=" sm:text-3xl mt-4 lg:mt-0 px-4 sm:px-0">
        <!-- Title -->
        <h1 class="text-2xl font-bold tracking-tight text-gray-900">{{ $productInfo->product_name }}</h1>
        <!-- Price -->
        <p class="text-3xl tracking-tight text-gray-900 mt-2">&#8369;{{ $productInfo->price }}</p>
        <!-- Description -->
        <p class="text-base mt-4 text-gray-900">{{ $productInfo->description }}</p>
        <!-- Category -->
        <div class="mt-8 flex items-center">
          <h3 class="text-base font-medium text-gray-900">Category: </h3>
          <h3 class="ml-2 text-base text-gray-900">{{ implode(', ', $productInfo->category) }}</h3>
        </div>
        <!-- Specifications -->
        <div class="mt-8">
          <h3 class="text-base font-medium text-gray-900">Specification</h3>
          <div class="mt-4">
            @if($productInfo->specification)
              <ul role="list" class="list-disc space-y-2 pl-4 text-base">
                @foreach($productInfo->specification as $spec)
                  <li class="text-gray-400"><span class="text-gray-600">{{ $spec }}</span></li>
                @endforeach
              </ul>
            @else
              <h4 class="text-base text-gray-600">No specification available.</h4>
            @endif
          </div>
        </div>
        <!-- Colors -->
        <div class="mt-8">
          <h3 class="text-base font-medium text-gray-900">Color</h3>
          <fieldset aria-label="Choose a color" class="mt-4">
            <div class="flex items-center space-x-3">
            @if($productInfo->color)
              @foreach($productInfo->color as $color)
                <div aria-label="White" class="relative -m-0.5 flex items-center justify-center rounded-full p-0.5 ring-gray-400 focus:outline-none">
                  <span aria-hidden="true" class="h-8 w-8 rounded-full border border-black border-opacity-10 bg-[{{ $color }}]"></span>
                </div>
              @endforeach
            @else
              <h4 class="text-base text-gray-600">Color is not available.</h4>
            @endif
            </div>
          </fieldset>
        </div>
        <!-- Sizes -->
        <div class="mt-8">
          <h3 class="text-base font-medium text-gray-900">Size</h3>
          <fieldset aria-label="Choose a size" class="mt-4">
              @if($productInfo->size)
                <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                  @foreach($productInfo->size as $size)
                    <label class="group relative flex items-center justify-center rounded-md border bg-white px-4 py-3 text-sm font-medium uppercase text-gray-900 shadow-sm focus:outline-none sm:flex-1 sm:py-6">
                      <span>{{ $size }}</span>
                      <span class="pointer-events-none absolute -inset-px rounded-md" aria-hidden="true"></span>
                    </label>
                  @endforeach
                </div>
              @else
                <h4 class="text-base text-gray-600">Size is not available.</h4>
              @endif
          </fieldset>
        </div>
        <!-- Check if user is the creator of the product -->
        @if(auth()->user()->id)
          @if(auth()->user()->id == $productInfo->added_by)
            <div class="flex flex-col md:flex-row items-center justify-end gap-4 mt-10">
              <a href="/products/edit/{{ $productInfo->id }}" class="flex w-full md:w-auto items-center justify-center rounded-md border border-transparent bg-green-600 px-8 py-3 text-base font-medium text-white hover:bg-green-700">Edit Product</a>
              <a href="#" class="flex w-full md:w-auto items-center justify-center rounded-md border border-transparent bg-red-600 px-8 py-3 text-base font-medium text-white hover:bg-red-700">Delete Product</a>
            </div>
          @endif
        @endif
      </div>
    </div>
  </div>
  @else
    <h1>No data found</h1>
  @endif
  
</div>

@include('footer')