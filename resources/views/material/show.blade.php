<x-layout>
    <div class="bg-white-shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 md:px-0">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $material->name }}</h1>
        </div>
    </div>

    <div class="mx-auto max-w-7xl py-6 px-4 md:px-0">
        <div class="flex gap-x-2">
            <a class="bg-yellow-500 px-5 py-3 text-white cursor-pointer border-2 border-transparent hover:bg-white hover:text-yellow-500 hover:border-yellow-500" href="/material/{{ $material->id }}/edit">Edit</a>
            <button class="bg-red-500 px-5 py-3 text-white cursor-pointer border-2 border-transparent hover:bg-white hover:text-red-500 hover:border-red-500" data-bs-toggle="modal" data-bs-target="#modal_delete_material{{ $material->id }}">Delete</button>
        </div>
    </div>

    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8 bg-gray-100">

        <div class="flex flex-col gap-x-2 md:flex-row">
            <div class="flex flex-start gap-2 grow flex-wrap mb-2 md:mb-0">
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex gap-x-2">
                    <p class="my-auto">
                        Black
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Aluminium
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
                <div class="pl-5 pr-3 rounded-lg text-white bg-gray-700 flex ap-x-2">
                    <p class="my-auto">
                        Window
                    </p>
                    <button class="px-2 text-white hover:text-gray-300">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </div>
            <div class="flex max-h-20">
                <button class="whitespace-nowrap bg-indigo-500 px-5 py-3 text-white cursor-pointer border-2 border-transparent hover:bg-white hover:text-indigo-500 hover:border-indigo-500 text-center" data-bs-toggle="modal" data-bs-target="#modal_add_tag{{ $material->id }}" >Add Tag</button>
            </div>
        </div>

        <div class="mt-8 grid grid-cols-1 place-content-center gap-2 md:grid-cols-2">
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="uom">Uom</label>
                    <input id="uom" name="uom" type="text" class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Uom" readonly value="{{ $material->uom }}">
                </div>
            </div>

            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="unit_price">Unit Price</label>
                    <input id="unit_price" name="unit_price" type="text" requiindigo class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Unit Price" readonly value="{{ number_format($material->unit_price, 2) }}">
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="description">Description</label>
                    <textarea id="description" name="description" type="text" class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Material Description" rows="5" readonly>{{ $material->description }}</textarea>
                </div>
            </div>
        </div>
        <div class="mt-2">
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="author">Author</label>
                    <input id="author name="author type="text" class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Author" readonly value="{{ $material->user->name }}">
                </div>
            </div>
        </div>
        <div class="mt-2 grid grid-cols-1 place-content-center gap-2 md:grid-cols-2">
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="created">Created At</label>
                    <input id="created" name="created" type="date" class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Created" readonly value={{ $material->created_at }}>
                </div>
            </div>

            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <label for="updated">Updated At</label>
                    <input id="updated" name="updated" type="date" class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Updated" readonly value={{ $material->updated_at }}>
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modal_delete_material{{ $material->id }}">
        <!--
          Background backdrop, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!--
                Modal panel, show/hide based on modal state.

                Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                                <!-- Heroicon name: outline/exclamation-triangle -->
                                <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Delete {{ $material->name }}</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Do you want to delete this?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <form action="/material/{{ $material->id }}/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
                        </form>
                        <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" data-bs-toggle="modal_close" data-bs-target="#modal_delete_material{{ $material->id }}">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modal_add_tag{{ $material->id }}">
        <!--
          Background backdrop, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!--
                Modal panel, show/hide based on modal state.

                Entering: "ease-out duration-300"
                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    To: "opacity-100 translate-y-0 sm:scale-100"
                Leaving: "ease-in duration-200"
                    From: "opacity-100 translate-y-0 sm:scale-100"
                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                -->
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all w-10/12">
                    <form class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" action="/material/{{ $material->id }}/delete" method="post">
                        @csrf
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add Tags</label>
                        <div class="flex flex-col gap-2 md:flex-row">
                            <select id="tags" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                <option selected>Choose a tag</option>
                                @foreach($tags as $tag)
                                    <option id="tag_options" value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <button id="add_tag" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Add</button>
                        </div>

                        <input type="hidden" id="tag_ids" name="tag_ids">

                        <div id="tags_box" class="flex flex-start gap-2 grow flex-wrap mt-4 mb-2 md:mb-0"></div>

                        <div class="bg-gray-50 py-3 sm:flex sm:flex-row-reverse sm:px-6 md:px-0">
                            <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
                            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" data-bs-toggle="modal_close" data-bs-target="#modal_add_tag{{ $material->id }}">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
