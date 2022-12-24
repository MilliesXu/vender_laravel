<x-layout>
    <div class="bg-white-shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Tags</h1>
        </div>
    </div>

    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <a class="bg-indigo-600 px-5 py-3 text-white hover:bg-indigo-800 cursor-pointer" href="/tag/create">Create Tag</a>
    </div>

    @include('partials._search')
    @unless (count($tags) == 0)
        <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8 mt-5">
            <table class="table-fixed bg-gray-800 text-white w-full overflow-x-auto">
                <thead>
                    <th scope="col" class="py-4 px-5">
                        Name
                    </th>
                    <th scope="col" colspan="2">
                        Action
                    </th>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr class="bg-gray-300 text-black hover:bg-gray-800 hover:text-white cursor-pointer">
                            <td class="text-start" scope="row">
                                <a href="/tag/{{ $tag->id }}" class="w-full block py-4 px-2 ">
                                    {{ $tag->name }}
                                </a>
                            </td>
                            <td class="py-4 px-1 text-center">
                                <a class="font-medium px-5 py-2 bg-yellow-500 border-2 border-transparent text-white hover:bg-white hover:text-yellow-500 hover:border-yellow-500" href="/tag/{{ $tag->id }}/edit">Edit</a>
                            </td>
                            <td class="py-4 px-1 text-center">
                                <button class="font-medium px-2 py-2 bg-red-500 text-white border-2 border-transparent hover:bg-white hover:text-red-500 hover:border-red-500" data-bs-toggle="modal" data-bs-target="#modal_delete_tag{{ $tag->id }}">Delete</button>
                            </td>
                        </tr>

                        <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modal_delete_tag{{ $tag->id }}">
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
                                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                    <!-- Heroicon name: outline/exclamation-triangle -->
                                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                                                    </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Delete {{ $tag->name }}</h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">Do you want to delete this?</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                            <form action="/tag/{{ $tag->id }}/delete" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Delete</button>
                                            </form>
                                            <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" data-bs-toggle="modal_close" data-bs-target="#modal_delete_tag{{ $tag->id }}">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="relative px-6 lg:px-8">
            <div class="mx-auto max-w-3xl pt-20 pb-32 sm:pt-48 sm:pb-40">
                <div>
                    <div>
                        <h1 class="text-4xl font-bold tracking-tight text-center sm:text-6xl">Tags Not Found</h1>
                    </div>
                </div>
            </div>
        </div>
    @endunless
</x-layout>