@include('header')

<div class="bg-white py-12">
  <div class="mx-auto px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-3xl font-medium text-gray-700 mb-7">Categories</h2>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                <thead>
                    <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-base font-semibold text-gray-900 sm:pl-0">Category name</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-base font-semibold text-gray-900">Description</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-base font-semibold text-gray-900">Added by</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-base font-semibold text-gray-900">Created at</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 text-right text-base font-semibold text-gray-900">
                        Actions
                    </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if($categoryList)
                        @foreach($categoryList as $category)
                        <tr>
                        <td class="py-4 pl-4 pr-3 text-base font-medium text-gray-900 sm:pl-0 min-w-44">{{ $category->category }}</td>
                        <td class="px-3 py-4 text-base text-gray-500 min-w-80">
                            @if($category->description)
                            {{ $category->description }}
                            @else
                            No description available.
                            @endif
                        </td>
                        <td class="px-3 py-4 text-base text-gray-500 min-w-48">lindsay.walton@example.com</td>
                        <td class="px-3 py-4 text-base text-gray-500 min-w-48">July 24, 2002 9:00 am</td>
                        <td class="relative py-4 pl-3 pr-4 text-right text-base font-medium sm:pr-0 min-w-32">
                            <a href="#" class="text-primary hover:text-dark-primary">Edit</a>
                            <a href="#" class="text-red-600 hover:text-dark-red-700 ml-4">Delete</a>
                        </td>
                        </tr>
                        @endforeach
                    @else
                    <h1>Hello</h1>
                    @endif
                    
                </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>

@include('footer')