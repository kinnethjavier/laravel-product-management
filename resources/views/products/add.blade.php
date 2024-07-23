@include("header")

<div class="bg-white pt-12 pb-2">
    <div class="mx-auto px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-3xl font-medium text-gray-700 mb-7">New Product</h2>
        <form class="grid grid-cols-2 gap-x-20 gap-y-6" action="{{ route('products.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6 col-span-2 lg:col-span-1">
                <!-- Product name -->
                <div>
                    <label for="product_name" class="block text-base font-medium leading-6 text-gray-900">Product Name *</label>
                    <div class="mt-2">
                    <input id="product_name" name="product_name" type="text" required class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
                    </div>
                </div>
                <!-- Description -->
                <div>
                    <label for="description" class="block text-base font-medium leading-6 text-gray-900">Description *</label>
                    <div class="mt-2">
                    <textarea rows="6" id="description" name="description" required class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6"></textarea>
                    </div>
                </div>
                <!-- Price -->
                <div>
                    <label for="price" class="block text-base font-medium leading-6 text-gray-900">Price (PHP) *</label>
                    <div class="mt-2">
                    <input id="price" name="price" type="number" required class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
                    </div>
                </div>
                <!-- Product photo -->
                <div>
                    <label for="photo" class="block text-base font-medium leading-6 text-gray-900">Product Photo *</label>
                    <div class="mt-2">
                    <input id="photo" name="photo" type="file" required class="block w-full rounded-md border-0 px-2.5 py-[3px] text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
                    </div>
                </div>
                <!-- Photo preview -->
                <div>
                    <h4 class="block text-base font-medium leading-6 text-gray-900">Photo Preview</h4>
                    <img id="preview" src="" alt="">
                </div>
            </div>
            <div class="space-y-6 col-span-2 lg:col-span-1">
                <!-- Category -->
                <div>
                    <h4 class="block text-base font-medium leading-6 text-gray-900">Category (Select all that apply) *</h4>
                    <div class="grid grid-cols-2 md:grid-cols-3 mt-1.5 gap-2">
                        <div class="flex items-center space-x-3">
                        <input id="category" name="category[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="Other">
                        <label for="category" class="text-gray-900">Other</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="category" name="category[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="Cloth">
                        <label for="category" class="text-gray-900">Cloth</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="category" name="category[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="Shoes">
                        <label for="category" class="text-gray-900">Shoes</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="category" name="category[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="Phone">
                        <label for="category" class="text-gray-900">Phone</label>
                        </div>
                    </div>
                </div>
                <!-- Color -->
                <div>
                    <h4 class="block text-base font-medium leading-6 text-gray-900">Color (Optional)</h4>
                    <div class="grid grid-cols-2 md:grid-cols-3 mt-1.5 gap-2">
                        <div class="flex items-center space-x-3">
                        <input id="color-white" name="color[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="#FFFFFF">
                        <label for="color-white" class="text-gray-900">White</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="color-black" name="color[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="#000000">
                        <label for="color-black" class="text-gray-900">Black</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="color-gray" name="color[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="#808080">
                        <label for="color-gray" class="text-gray-900">Gray</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="color-red" name="color[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="#FF0000">
                        <label for="color-red" class="text-gray-900">Red</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="color-blue" name="color[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="#0000FF">
                        <label for="color-blue" class="text-gray-900">Blue</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="color-yellow" name="color[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="#FFFF00">
                        <label for="color-yellow" class="text-gray-900">Yellow</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="color-green" name="color[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="#008000">
                        <label for="color-green" class="text-gray-900">Green</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="color-purple" name="color[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="#A020F0">
                        <label for="color-purple" class="text-gray-900">Purple</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="color-orange" name="color[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="#FFA500">
                        <label for="color-orange" class="text-gray-900">Orange</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="color-pink" name="color[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="#FFC0CB">
                        <label for="color-pink" class="text-gray-900">Pink</label>
                        </div>
                       
                    </div>
                </div>
                <!-- Size -->
                <div>
                    <h4 class="block text-base font-medium leading-6 text-gray-900">Size (Optional)</h4>
                    <div class="grid grid-cols-2 md:grid-cols-3 mt-1.5 gap-2">
                        <div class="flex items-center space-x-3">
                        <input id="size" name="size[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="XXS">
                        <label for="size" class="text-gray-900">XXS</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="size" name="size[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="XS">
                        <label for="size" class="text-gray-900">XS</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="size" name="size[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="S">
                        <label for="size" class="text-gray-900">S</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="size" name="size[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="M">
                        <label for="size" class="text-gray-900">M</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="size" name="size[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="L">
                        <label for="size" class="text-gray-900">L</label>
                        </div>
                        <div class="flex items-center space-x-3">
                        <input id="size" name="size[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" value="XL">
                        <label for="size" class="text-gray-900">XL</label>
                        </div>
                    </div>
                </div>
                <!-- Specification -->
                <div>
                    <label for="specification" class="block text-base font-medium leading-6 text-gray-900">Specification (optional)</label>
                    <div id="specs" class="mt-2 space-y-3">
                       <!-- container only for specifications -->
                    </div>
                    <button id="btn-add-spec" type="button" class="flex mt-3 md:w-auto items-center justify-center rounded-md border border-transparent bg-green-600 px-3 py-[5px] text-base font-medium text-white hover:bg-green-700">Add specification</button>
                </div>
            </div>
            <div class="col-span-2 flex flex-col md:flex-row items-center justify-end gap-4 mt-2 md:mt-5">
                <a href="#" class="rounded-md w-full md:w-auto text-center border border-transparent bg-gray-500 px-8 py-3 text-base font-medium text-white hover:bg-gray-600">Cancel</a>
                <button type="submit" class="rounded-md w-full md:w-auto border border-transparent bg-primary px-8 py-3 text-base font-medium text-white hover:bg-dark-primary">Save</button>
            </div>
        </form>
    <div>
</div>

<!-- External script -->
<script type="text/javascript" src="{{ asset('js/products/add.js') }}"></script>

@include("footer")