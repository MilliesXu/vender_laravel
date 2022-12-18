<x-layout>
    <div class="bg-white-shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
        </div>
    </div>

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 mt-10">

        <div class="px-4 py-6 sm:px-0">
            <div class="grid gap-4 grid-cols-1 justify-center align-center md:grid-cols-2 lg:grid-cols-4">
                <button class="bg-white border-4 border-green-500 w-50 h-80 text-center text-green-500 hover:bg-green-500 hover:text-white md:w-35">
                    <i class="fa-10x fa-solid fa-cart-plus mb-5"></i>
                    <p>Create New Order</p>
                </button>
                <button class="bg-white border-4 border-blue-500 w-50 h-80 text-center text-blue-500 hover:bg-blue-500 hover:text-white">
                    <a href="/material/create">
                        <i class="fa-10x fa-duotone fa-solid fa-city mb-5"></i>
                        <p>Create New Material</p>
                    </a>
                </button>
                <button class="bg-white border-4 border-yellow-500 w-50 h-80 text-center text-yellow-500 hover:bg-yellow-500 hover:text-white">
                    <i class="fa-10x fa-duotone fa-solid fa-tags mb-5"></i>
                    <p>Create New Tag</p>
                </button>
                <button class="bg-white border-4 border-red-500 w-50 h-80 text-center text-red-500 hover:bg-red-500 hover:text-white">
                    <i class="fa-10x fa-duotone fa-solid fa-door-open mb-5"></i>
                    <p>Sign Out</p>
                </button>
            </div>
        </div>

    </div>
</x-layout>