<x-layout>
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-12">
        <div class="w-full space-y-8 max-w-sm md:max-w-md lg:max-w-lg">
            <div>
                {{-- <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"> --}}
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Create Material</h2>
            </div>
            <form class="mt-8 space-y-6" action="/material/store" method="POST" autocomplete="off">
                @csrf
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Material Name" value={{ old('name') }}>
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="description">Description</label>
                        <textarea id="description" name="description" class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Material Description" rows="5">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="uom">Uom</label>
                        <input id="uom" name="uom" type="text" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Material Uom" value={{ old('uom') }}>
                    </div>
                    @error('uom')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="unit_price">Unit Price</label>
                        <input id="unit_price" name="unit_price" type="number" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Material Unit Price" value={{ old('unit_price') }}>
                    </div>
                    @error('unit_price')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="rounded-md shadow-sm">
                    <input type="text" id="tag_ids" name="tag_ids">

                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add Tags</label>
                    <div class="flex flex-col gap-2 md:flex-row mb-2">
                        <select id="tags" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                            <option selected>Choose a tag</option>
                            @foreach($tags as $tag)
                                <option id="tag_options" value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        <button id="add_tag" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto sm:text-sm">Add</button>
                    </div>

                    <div id="tags_box" class="flex flex-start gap-2 grow flex-wrap mt-4 mb-2 md:mb-0"></div>
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
