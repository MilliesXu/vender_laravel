<x-layout>
    <div class="bg-white-shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Materials</h1>
        </div>
    </div>

    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <a class="bg-indigo-600 px-5 py-3 text-white hover:bg-indigo-800 cursor-pointer" href="/material/create">Create Material</a>
    </div>
    @unless (count($materials) == 0)
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-10">
            <table class="table bg-gray-800 text-white w-full overflow-x-auto">
                <thead>
                    <th scope="col" class="py-4 px-2">
                        Name
                    </th>
                    <th scope="col" class="py-4 px-2">
                        Description
                    </th>
                    <th scope="col" class="py-4 px-2">
                        UOM
                    </th>
                    <th scope="col" class="py-4 px-2">
                        Unit Price
                    </th>
                    <th scope="col" colspan="3" class="py-4 px-2">
                        Action
                    </th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    @else
        <div class="relative px-6 lg:px-8">
            <div class="mx-auto max-w-3xl pt-20 pb-32 sm:pt-48 sm:pb-40">
                <div>
                    <div>
                        <h1 class="text-4xl font-bold tracking-tight text-center sm:text-6xl">Materials Not Found</h1>
                    </div>
                </div>
            </div>
        </div>
    @endunless

</x-layout>