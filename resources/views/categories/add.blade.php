@include("header")

<div class="bg-white pt-12 pb-2">
    <div class="mx-auto px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-3xl font-medium text-gray-700 mb-7">New Category</h2>
        <form class="grid grid-cols-2 gap-x-20 gap-y-6" action="{{ route('categories.add') }}" method="POST">
            @csrf
            <div class="space-y-6 col-span-2 lg:col-span-1">
                <!-- Product name -->
                <div>
                    <label for="category" class="block text-base font-medium leading-6 text-gray-900">Category Name *</label>
                    <div class="mt-2">
                    <input id="category" name="category" type="text" required class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
                    </div>
                </div>
                <!-- Description -->
                <div>
                    <label for="description" class="block text-base font-medium leading-6 text-gray-900">Description (Optional)</label>
                    <div class="mt-2">
                    <textarea rows="6" id="description" name="description" class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6"></textarea>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row items-center gap-4 mt-2 md:mt-5">
                    <a href="/categories" class="rounded-md w-full md:w-auto text-center border border-transparent bg-gray-500 px-8 py-3 text-base font-medium text-white hover:bg-gray-600">Cancel</a>
                    <button type="submit" class="rounded-md w-full md:w-auto border border-transparent bg-primary px-8 py-3 text-base font-medium text-white hover:bg-dark-primary">Save</button>
                </div>
            </div>
        </form>
    <div>
</div>

@include("footer")