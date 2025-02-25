@include('header')

<div class="bg-white py-12">
  <div class="mx-auto px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
    <div class="flex justify-between items-center mb-7">
        <h2 class="text-3xl font-medium text-gray-700 ">Categories</h2>
        @if(Auth::check())
            @if(auth()->user()->category_management === 1)
            <a href="/categories/add" class="rounded-md border border-transparent bg-primary px-8 py-3 text-base font-medium text-white hover:bg-dark-primary">New category</a>
            @endif
        @endif
    </div>
    <div class="mt-8 flow-root">
        @if(Auth::check())
            @if(auth()->user()->category_management === 0) 
                <span class="inline-flex items-center rounded-md mb-5 w-full bg-red-50 px-2 py-1 text-base font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/10">
                You don't have permission to manage a category. Wait until the Admin granted you a permission.
                </span>
            @endif
        @endif
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
                    <tr>
                    <td class="py-4 pl-4 pr-3 text-base font-medium text-gray-900 sm:pl-0 min-w-44">Other</td>
                    <td class="px-3 py-4 text-base text-gray-500 min-w-80">
                        This is a default generated category.
                    </td>
                    <td class="px-3 py-4 text-base text-gray-500 min-w-48">System</td>
                    <td class="px-3 py-4 text-base text-gray-500 min-w-48">July 23, 2024 12:00 pm</td>
                    <td class="relative py-4 pl-3 pr-4 text-right text-base font-medium sm:pr-0 min-w-32">
                    </td>
                    </tr>
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
                        <td class="px-3 py-4 text-base text-gray-500 min-w-48">{{ $category->user->first_name }} {{ $category->user->last_name }}</td>
                        <td class="px-3 py-4 text-base text-gray-500 min-w-48">{{ $category->created_at->format('F j, Y g:i a') }}</td>
                        <td class="relative py-4 pl-3 pr-4 text-base font-medium sm:pr-0 min-w-32">
                            @if(Auth::check())
                                @if(auth()->user()->category_management === 1)
                                <div class="flex justify-end">
                                    <a href="/categories/edit/{{ $category->id }}" class="text-primary hover:text-dark-primary">Edit</a>
                                    <form action="{{ route('categories.delete', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-dark-red-700 ml-4">Delete</button>
                                    </form>
                                </div>
                                @endif
                            @endif
                        </td>
                        </tr>
                        @endforeach
                    @else
                        <div></div>
                    @endif
                    
                </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>

@include('footer')