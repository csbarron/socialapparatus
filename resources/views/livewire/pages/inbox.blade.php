<div x-data="{
    showaside:false
}" class="flex h-full flex-col">

    <div class="flex min-h-0 flex-1 ">
        <nav class=" flex-shrink-0  overflow-y-auto bg-gray-800">
            <div class="relative flex w-20 flex-col space-y-3 p-3">
                <button class="bg-gray-900 text-white flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
                    <x-icons.menu class="h-6 w-6"></x-icons.menu>
                </button>
                <a  href="#"
                   class="bg-gray-900 text-white flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
                    <!-- Heroicon name: outline/inbox -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z"/>
                    </svg>
                </a>

                <a href="#"
                   class="text-gray-400 hover:bg-gray-700 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
                    <!-- Heroicon name: outline/archive-box -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                    </svg>
                </a>


                <a href="#"
                   class="text-gray-400 hover:bg-gray-700 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
                    <!-- Heroicon name: outline/flag -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5"/>
                    </svg>
                </a>


                <a href="#"
                   class="text-gray-400 hover:bg-gray-700 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
                    <!-- Heroicon name: outline/pencil-square -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                    </svg>
                </a>
            </div>
        </nav>

        <!-- Main area -->
        <main class="min-w-0 flex-1 border-t border-gray-200 xl:flex">
            <aside :class="showaside ? 'absolute block':'sm:hidden'" class=" xl:block  flex-shrink-0">
                <div class="relative flex h-full w-96 flex-col border-r border-gray-200 bg-gray-100">
                    <div class="flex-shrink-0">
                        <div class="flex h-16 flex-col justify-center bg-white px-6">
                            <div class="flex items-baseline space-x-3">
                                <h2 class="text-lg font-medium text-gray-900">Inbox</h2>
                                <p class="text-sm font-medium text-gray-500">10 messages</p>
                            </div>
                        </div>
                        <div
                            class="border-t border-b border-gray-200 bg-gray-50 px-6 py-2 text-sm font-medium text-gray-500">
                            <select class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600">Sort By</select>
                            Sorted by date
                        </div>
                    </div>
                    <nav aria-label="Message list" class="min-h-0 flex-1 overflow-y-auto">
                        <ul role="list" class="divide-y divide-gray-200 border-b border-gray-200">
                            <li class="relative bg-white py-5 px-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 hover:bg-gray-50">
                                <div class="flex justify-between space-x-3">
                                    <div class="min-w-0 flex-1">
                                        <a href="#" class="block focus:outline-none">
                                            <span class="absolute inset-0" aria-hidden="true"></span>
                                            <p class="truncate text-sm font-medium text-gray-900">Gloria Roberston</p>
                                            <p class="truncate text-sm text-gray-500">Velit placeat sit ducimus non
                                                sed</p>
                                        </a>
                                    </div>
                                    <time datetime="2021-01-27T16:35"
                                          class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">1d ago
                                    </time>
                                </div>
                                <div class="mt-1">
                                    <p class="text-sm text-gray-600 line-clamp-2">Doloremque dolorem maiores assumenda
                                        dolorem facilis. Velit vel in a rerum natus facere. Enim rerum eaque qui
                                        facilis. Numquam laudantium sed id dolores omnis in. Eos reiciendis deserunt
                                        maiores et accusamus quod dolor.</p>
                                </div>
                            </li>


                        </ul>
                    </nav>
                </div>
            </aside>
            <section aria-labelledby="message-heading"
                     class="flex h-full min-w-0 flex-1 flex-col overflow-hidden ">
                <!-- Top section -->
                <div class="flex-shrink-0 border-b border-gray-200 bg-white">
                    <!-- Toolbar-->
                    <div class="flex h-16 flex-col justify-center">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-end py-3">
                                <!-- Left buttons -->
                                <div>
                                    <div
                                        class="relative z-0 inline-flex rounded-md shadow-sm sm:space-x-3 sm:shadow-none">
                    <span class="inline-flex sm:shadow-sm">
                      <button type="button"
                              class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600">
                        <!-- Heroicon name: mini/arrow-uturn-left -->
                        <svg class="mr-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd"
                                d="M7.793 2.232a.75.75 0 01-.025 1.06L3.622 7.25h10.003a5.375 5.375 0 010 10.75H10.75a.75.75 0 010-1.5h2.875a3.875 3.875 0 000-7.75H3.622l4.146 3.957a.75.75 0 01-1.036 1.085l-5.5-5.25a.75.75 0 010-1.085l5.5-5.25a.75.75 0 011.06.025z"
                                clip-rule="evenodd"/>
                        </svg>
                        <span>Reply</span>
                      </button>


                    </span>

                                        <span class="hidden space-x-3 lg:flex">
                      <button type="button"
                              class="relative -ml-px hidden items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600 sm:inline-flex">
                        <!-- Heroicon name: mini/archive-box -->
                        <svg class="mr-2.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                          <path d="M2 3a1 1 0 00-1 1v1a1 1 0 001 1h16a1 1 0 001-1V4a1 1 0 00-1-1H2z"/>
                          <path fill-rule="evenodd"
                                d="M2 7.5h16l-.811 7.71a2 2 0 01-1.99 1.79H4.802a2 2 0 01-1.99-1.79L2 7.5zM7 11a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z"
                                clip-rule="evenodd"/>
                        </svg>
                        <span>Archive</span>
                      </button>

                    </span>

                                        <div class="relative -ml-px block sm:shadow-sm lg:hidden">
                                            <div>
                                                <button type="button"
                                                        class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 focus:z-10 focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600 sm:rounded-md sm:px-3"
                                                        id="menu-2-button" aria-expanded="false" aria-haspopup="true">
                                                    <span class="sr-only sm:hidden">More</span>
                                                    <span class="hidden sm:inline">More</span>
                                                    <!-- Heroicon name: mini/chevron-down -->
                                                    <svg class="h-5 w-5 text-gray-400 sm:ml-2 sm:-mr-1"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                              d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!--
                                              Dropdown menu, show/hide based on menu state.

                                              Entering: "transition ease-out duration-100"
                                                From: "transform opacity-0 scale-95"
                                                To: "transform opacity-100 scale-100"
                                              Leaving: "transition ease-in duration-75"
                                                From: "transform opacity-100 scale-100"
                                                To: "transform opacity-0 scale-95"
                                            -->
                                            <div
                                                class="absolute right-0 mt-2 w-36 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                role="menu" aria-orientation="vertical" aria-labelledby="menu-2-button"
                                                tabindex="-1">
                                                <div class="py-1" role="none">
                                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm"
                                                       role="menuitem" tabindex="-1" id="menu-2-item-2">Archive</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- Message header -->
                </div>

                <div class="min-h-0 flex-1 overflow-y-auto">
                    <div class="bg-white pt-5 pb-6 shadow">
                        <div class="px-4 sm:flex sm:items-baseline sm:justify-between sm:px-6 lg:px-8">
                            <div class="sm:w-0 sm:flex-1">
                                <h1 id="message-heading" class="text-lg font-medium text-gray-900">Re: New pricing for
                                    existing customers</h1>
                                <p class="mt-1 truncate text-sm text-gray-500">joearmstrong@example.com</p>
                            </div>

                        </div>
                    </div>
                    <!-- Thread section-->
                    <ul role="list" class="space-y-2 py-4 sm:space-y-4 sm:px-6 lg:px-8">
                        <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
                            <div class="sm:flex sm:items-baseline sm:justify-between">
                                <h3 class="text-base font-medium">
                                    <span class="text-gray-900">Joe Armstrong</span>
                                    <span class="text-gray-600">wrote</span>
                                </h3>
                                <p class="mt-1 whitespace-nowrap text-sm text-gray-600 sm:mt-0 sm:ml-3">
                                    <time datetime="2021-01-28T19:24">Yesterday at 7:24am</time>
                                </p>
                            </div>
                            <div class="mt-4 space-y-6 text-sm text-gray-800"><p>Thanks so much! Can't wait to try it
                                    out.</p></div>
                        </li>

                        <li class="bg-white px-4 py-6 shadow sm:rounded-lg sm:px-6">
                            <div class="sm:flex sm:items-baseline sm:justify-between">
                                <h3 class="text-base font-medium">
                                    <span class="text-gray-900">Monica White</span>
                                    <span class="text-gray-600">wrote</span>
                                </h3>
                                <p class="mt-1 whitespace-nowrap text-sm text-gray-600 sm:mt-0 sm:ml-3">
                                    <time datetime="2021-01-27T16:35">Wednesday at 4:35pm</time>
                                </p>
                            </div>
                            <div class="mt-4 space-y-6 text-sm text-gray-800">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Malesuada at ultricies
                                    tincidunt elit et, enim. Habitant nunc, adipiscing non fermentum, sed est a,
                                    aliquet. Lorem in vel libero vel augue aliquet dui commodo.</p>
                                <p>Nec malesuada sed sit ut aliquet. Cras ac pharetra, sapien purus vitae vestibulum
                                    auctor faucibus ullamcorper. Leo quam tincidunt porttitor neque, velit sed. Tortor
                                    mauris ornare ut tellus sed aliquet amet venenatis condimentum. Convallis accumsan
                                    et nunc eleifend.</p>
                                <p><strong style="font-weight: 600">Monica White</strong><br>Customer Service</p>
                            </div>
                        </li>

                    </ul>
                </div>
            </section>

            <!-- Message list-->

        </main>
    </div>
</div>
