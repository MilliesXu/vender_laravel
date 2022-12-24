<x-layout>
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-12">
        <div class="w-full space-y-8 max-w-sm md:max-w-md lg:max-w-lg">
            <div>
                {{-- <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> --}}
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Create Tag</h2>
                <p class="mt-2 text-center text-sm text-gray-600" />
            </div>
            <form class="mt-8 space-y-6" action="/tag/store" method="POST" autocomplete="off">
                @csrf
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Tag Name" value={{ old('name') }}>
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>