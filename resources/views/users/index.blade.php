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
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-base font-semibold text-gray-900 sm:pl-0">Name</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-base font-semibold text-gray-900">Email</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-base font-semibold text-gray-900">Role</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-base font-semibold text-gray-900">Permissions</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-base font-semibold text-gray-900">Created at</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0 text-right text-base font-semibold text-gray-900">
                        Action
                    </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($userList as $user)
                    <tr>
                    <td class="py-4 pl-4 pr-3 text-base font-medium text-gray-900 sm:pl-0 min-w-44">{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td class="px-3 py-4 text-base text-gray-500 min-w-60">
                        {{ $user->email }}
                    </td>
                    <td class="px-3 py-4 text-base text-gray-500 min-w-32">{{ $user->role }}</td>
                    <td class="px-3 py-4 text-base text-gray-500 min-w-48">
                        <form action="{{ route('users.update.pm', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex items-center space-x-3">
                            <input id="cb-product" name="product_management" type="checkbox" class="cb-product h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" {{ $user->role === "Admin" ? 'checked disabled readonly' : ($user->product_management === 1 ? 'checked' : '') }}>
                            <label for="cb-product" class="text-gray-500">Product Management</label>
                        </div>
                        </form>
                        <form action="{{ route('users.update.cm', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex items-center space-x-3">
                            <input id="cb-category" type="checkbox" class="cb-category h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" {{ $user->role === "Admin" ? 'checked disabled readonly' : ($user->category_management === 1 ? 'checked' : '') }}>
                            <label for="cb-category" class="text-gray-500">Category Management</label>
                        </div>
                        </form>
                    </td>
                    <td class="px-3 py-4 text-base text-gray-500 min-w-48">{{ $user->created_at->format('F j, Y g:i a') }}</td>
                    <td class="relative py-4 pl-3 pr-4 text-right text-base font-medium sm:pr-0 min-w-32">
                    @if($user->role === 'User')
                    <form action="{{ route('users.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-dark-red-700 ml-4">Delete</button>
                    </form>
                    @endif
                    
                    </td>
                    </tr>   
                    @endforeach
                        
                </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- External script -->
<script type="text/javascript" src="{{ asset('js/users/update.js') }}"></script>

@include('footer')