@include("header")

<div class="bg-white pt-12 pb-2">
    <div class="mx-auto px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-3xl font-medium text-gray-700 mb-7">Edit Product</h2>
        @if($productInfo)
            <form class="grid grid-cols-2 gap-x-20 gap-y-6" action="{{ route('products.update', $productInfo->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-6 col-span-2 lg:col-span-1">
                    <!-- Product name -->
                    <div>
                        <label for="product_name" class="block text-base font-medium leading-6 text-gray-900">Product Name *</label>
                        <div class="mt-2">
                        <input id="product_name" name="product_name" type="text" required value="{{ $productInfo->product_name }}" class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
                        </div>
                    </div>
                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-base font-medium leading-6 text-gray-900">Description *</label>
                        <div class="mt-2">
                        <textarea rows="6" id="description" name="description" required class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">{{ $productInfo->description }}</textarea>
                        </div>
                    </div>
                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-base font-medium leading-6 text-gray-900">Price (PHP) *</label>
                        <div class="mt-2">
                        <input id="price" name="price" type="number" required value="{{ $productInfo->price }}" class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
                        </div>
                    </div>
                    <!-- Product photo -->
                    <div>
                        <label for="photo" class="block text-base font-medium leading-6 text-gray-900">Change Photo</label>
                        <div class="mt-2">
                        <input id="photo" name="photo" type="file" class="block w-full rounded-md border-0 px-2.5 py-[3px] text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
                        </div>
                    </div>
                    <!-- Photo preview -->
                    <div>
                        <h4 class="block text-base font-medium leading-6 text-gray-900">Photo Preview</h4>
                        <img id="preview" src="{{ asset('images/products/'. $productInfo->photo) }}" alt="" class="rounded-md h-80 w-full mt-2 object-cover object-center">
                    </div>
                </div>
                <div class="space-y-6 col-span-2 lg:col-span-1">
                    <!-- Category -->
                    <div>
                        <h4 class="block text-base font-medium leading-6 text-gray-900">Category (Select all that apply) *</h4>
                        <div class="grid grid-cols-2 md:grid-cols-3 mt-1.5 gap-2">
                            @foreach(['Other', 'Cloth', 'Shoes', 'Phone'] as $category)
                                <div class="flex items-center space-x-3">
                                    <input id="category" name="category[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="{{ $category }}" {{ in_array($category, $productInfo->category) ? 'checked' : '' }}>
                                    <label for="category" class="text-gray-900">{{ $category }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Color -->
                    <div>
                        <h4 class="block text-base font-medium leading-6 text-gray-900">Color (Optional)</h4>
                        <div class="grid grid-cols-2 md:grid-cols-3 mt-1.5 gap-2">
                        @php
                            $colors = [
                                ['id' => 'color-white', 'value' => '#FFFFFF', 'label' => 'White'],
                                ['id' => 'color-black', 'value' => '#000000', 'label' => 'Black'],
                                ['id' => 'color-gray', 'value' => '#808080', 'label' => 'Gray'],
                                ['id' => 'color-red', 'value' => '#FF0000', 'label' => 'Red'],
                                ['id' => 'color-blue', 'value' => '#0000FF', 'label' => 'Blue'],
                                ['id' => 'color-yellow', 'value' => '#FFFF00', 'label' => 'Yellow'],
                                ['id' => 'color-green', 'value' => '#008000', 'label' => 'Green'],
                                ['id' => 'color-purple', 'value' => '#A020F0', 'label' => 'Purple'],
                                ['id' => 'color-orange', 'value' => '#FFA500', 'label' => 'Orange'],
                                ['id' => 'color-pink', 'value' => '#FFC0CB', 'label' => 'Pink'],
                            ];
                        @endphp
                        @foreach($colors as $color)
                            <div class="flex items-center space-x-3">
                                <input id="color-black" name="color[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="{{ $color['value'] }}"
                                @if(in_array($color['value'], $productInfo->color ?? [])) checked @endif>
                                <label for="color-black" class="text-gray-900">{{ $color['label'] }}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <!-- Size -->
                    <div>
                        <h4 class="block text-base font-medium leading-6 text-gray-900">Size (Optional)</h4>
                        <div class="grid grid-cols-2 md:grid-cols-3 mt-1.5 gap-2">
                            @foreach(['XXS', 'XS', 'S', 'L', 'M', 'XL'] as $size)
                                <div class="flex items-center space-x-3">
                                <input id="size" name="size[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="{{ $size }}" 
                                @if(in_array($size, $productInfo->size ?? [])) checked @endif>
                                <label for="size" class="text-gray-900">{{ $size }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Specification -->
                    <div>
                        <label for="specification" class="block text-base font-medium leading-6 text-gray-900">Specification (optional)</label>
                        <div id="specs" class="mt-2 space-y-3">
                        @if($productInfo->specification)
                            @foreach($productInfo->specification as $spec)
                                <div id='spec-row' class='flex items-center space-x-2'> 
                                    <input name='specification[]' type='text' required value="{{ $spec }}" class='block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6'>
                                    <button type='button' id='btn-remove-spec' class='flex md:w-auto items-center justify-center rounded-md border border-transparent bg-red-600 px-2 py-[5px] text-base font-medium text-white hover:bg-red-700'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='lucide lucide-trash-2'><path d='M3 6h18'/><path d='M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6'/><path d='M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2'/><line x1='10' x2='10' y1='11' y2='17'/><line x1='14' x2='14' y1='11' y2='17'/></svg>
                                    </button> 
                                </div>
                            @endforeach
                        @endif
                        </div>
                        <button id="btn-add-spec" type="button" class="flex mt-3 md:w-auto items-center justify-center rounded-md border border-transparent bg-green-600 px-3 py-[5px] text-base font-medium text-white hover:bg-green-700">Add specification</button>
                    </div>
                </div>
                <div class="col-span-2 flex flex-col md:flex-row items-center justify-end gap-4 mt-2 md:mt-5">
                    <a href="/products/own" class="rounded-md w-full md:w-auto text-center border border-transparent bg-gray-500 px-8 py-3 text-base font-medium text-white hover:bg-gray-600">Cancel</a>
                    <button type="submit" class="rounded-md w-full md:w-auto border border-transparent bg-primary px-8 py-3 text-base font-medium text-white hover:bg-dark-primary">Save</button>
                </div>
            </form>
        @else
            <h1>No data found.</h1>
        @endif
    <div>
</div>

<!-- External script -->
<script type="text/javascript" src="{{ asset('js/products/edit.js') }}"></script>

@include("footer")