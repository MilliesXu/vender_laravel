<x-layout>
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-12">
        <div class="w-full space-y-8 max-w-sm md:max-w-md lg:max-w-lg">
            <div>
                {{-- <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> --}}
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Login</h2>
                <p class="mt-2 text-center text-sm text-gray-600" />
            </div>
            <form class="mt-8 space-y-6" action="/user/login" method="POST" autocomplete="off">
                @csrf
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Email Address" value={{ old('email') }}>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Your Password" value={{ old('password') }}>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex place-content-end">
                    <a class="ml-auto font-medium text-indigo-600 hover:text-indigo-800" href="/user/register">Don't have an account ?</a>
                </div>

                <div>
                    <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>