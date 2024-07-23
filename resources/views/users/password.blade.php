@include("header")

<div class="bg-white pt-12 pb-2">
    <div class="mx-auto px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-3xl font-medium text-gray-700 mb-7">Change Password</h2>
        @if ($errors->has('password'))
            <span class="inline-flex items-center rounded-md mb-5 w-full bg-red-50 px-2 py-1 text-base font-medium text-red-700 ring-1 ring-inset ring-red-600/10">
            {{ $errors->first('password') }}
            </span>
        @endif
        <form class="grid grid-cols-2 gap-x-20 gap-y-6" action="{{ route('users.update.password') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6 col-span-2 lg:col-span-1">
                <!-- New password -->
                <div>
                    <label for="password" class="block text-base font-medium leading-6 text-gray-900">New password *</label>
                    <div class="mt-2">
                    <input id="password" name="password" type="password" minlength="8" required class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
                    </div>
                </div>
                <!-- Confirm password -->
                <div>
                    <label for="password_confirmation" class="block text-base font-medium leading-6 text-gray-900">Confirm password *</label>
                    <div class="mt-2">
                    <input id="password_confirmation" name="password_confirmation" type="password" minlength="8" required class="block w-full rounded-md border-0 px-2.5 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 outline-0 focus:ring-2 focus:ring-inset focus:ring-primary sm:leading-6">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-center gap-4 mt-2 md:mt-5">
                    <a href="/products" class="rounded-md w-full md:w-auto text-center border border-transparent bg-gray-500 px-8 py-3 text-base font-medium text-white hover:bg-gray-600">Cancel</a>
                    <button type="submit" class="rounded-md w-full md:w-auto border border-transparent bg-primary px-8 py-3 text-base font-medium text-white hover:bg-dark-primary">Save</button>
                </div>
            </div>
        </form>
    <div>
</div>

@include("footer")