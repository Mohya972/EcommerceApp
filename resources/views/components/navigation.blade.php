    <!-- Navigation Component -->
<div class="bg-white">

        <!-- Mobile menu -->
    <el-dialog>
        <dialog id="mobile-menu" class="backdrop:bg-transparent lg:hidden">
            <el-dialog-backdrop class="fixed inset-0 bg-black/25 transition-opacity duration-300 ease-linear data-closed:opacity-0"></el-dialog-backdrop>
            <div tabindex="0" class="fixed inset-0 flex focus:outline-none">
                <el-dialog-panel class="relative flex w-full max-w-xs transform flex-col overflow-y-auto bg-white pb-12 shadow-xl transition duration-300 ease-in-out data-closed:-translate-x-full">
                    <div class="flex px-4 pt-5 pb-2">

                        <button type="button" command="close" commandfor="mobile-menu" class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-green-400">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Close menu</span>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>

                    <!-- Links -->

                    <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                        <div class="flow-root">
                            <a href="{{ route('club.home') }}" class="-m-2 block p-2 font-medium text-gray-900"> Le Club </a>
                        </div>
                        <div class="flow-root">
                            <a href="{{ route('products.index') }}" class="-m-2 block p-2 font-medium text-gray-900"> Boutique </a>
                        </div>
                        <div class="flow-root">
                            <a href="#" class="-m-2 block p-2 font-medium text-gray-900"> Conseils d'expert </a>
                        </div>
                        
                        <div class="flow-root">
                            <a href="{{ route('blog.index') }}" class="-m-2 block p-2 font-medium text-gray-900"> Inspirations </a>
                        </div>
                        <!-- Cart -->
                        <div class="ml-4 flow-root lg:ml-6">
                    <a href="{{ route('cart.index') }}" class="group -m-2 flex items-center p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 shrink-0 text-green-400 group-hover:text-green-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>

                <span class="ml-2 text-sm font-medium text-green-700 group-hover:text-green-800">
                    @auth
                        @if(auth()->user()->cart && auth()->user()->cart->total_items > 0)
                            {{ auth()->user()->cart->total_items }}
                        @else
                            0
                        @endif
                    @else
                        0
                    @endauth
                </span>
                <span class="sr-only">items in cart, view bag</span>
                    </a>
                        </div>
                    </div>

                    <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                        @guest
                            <div class="flow-root">
                                <a href="{{ route('login') }}" class="-m-2 block p-2 font-medium text-gray-900"> Connexion </a>
                            </div>
                        @endguest
                
                        @auth
                            <div class="flow-root">
                                <a href="{{ route('profile.edit') }}" class="-m-2 block p-2 font-medium text-gray-900"> Mon Compte </a>
                            </div>
                            <div class="flow-root">
                                <a href="#" class="-m-2 block p-2 font-medium text-gray-900"> Ma liste d'envies </a>
                            </div>
                        @endauth
                
                    </div>

                </el-dialog-panel>
            </div>
        </dialog>
    </el-dialog>

    <header class="relative bg-white">
    
    <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200">
            <div class="flex h-16 items-center">

                    <!-- Début Bouton menu mobile -->
                <button type="button" command="show-modal" commandfor="mobile-menu" class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                    <!-- Fin Bouton menu mobile -->

                    <!-- Logo -->
                <div class="ml-4 flex lg:ml-0">
                    <a href="{{ route('home') }}">
                        <span class="sr-only"> Mohya'Floral </span>
                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=green&shade=600" alt="" class="h-8 w-auto" />
                    </a>
                </div>
                    <!-- Fin Logo -->

                    <!-- Début Navigation principale -->
                <div class="ml-auto flex items-center">
                    <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">

                        <a href="{{ route('club.home') }}" class="text-sm font-medium text-gray-700 hover:text-gray-800"> Le Club </a>

                        <span aria-hidden="true" class="h-6 w-px bg-gray-200"></span>

                        <a href="{{ route('products.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-800"> Boutique </a>

                        <span aria-hidden="true" class="h-6 w-px bg-gray-200"></span>

                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800"> Conseils d'expert </a>

                        <span aria-hidden="true" class="h-6 w-px bg-gray-200"></span>

                        <a href="{{ route('blog.index') }}" class="text-sm font-medium text-gray-700 hover:text-gray-800"> Inspirations </a>

                        <span aria-hidden="true" class="h-6 w-px bg-gray-200"></span>

                        @guest
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-gray-800"> Connexion </a>
                        @endguest
            
                        @auth
                            <a href="{{ route('profile.edit') }}" class="text-sm font-medium text-gray-700 hover:text-gray-800"> Mon Compte </a>

                            <span aria-hidden="true" class="h-6 w-px bg-gray-200"></span>

                            <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800"> Ma liste d'envies </a>
                        @endauth
            
                    </div>
                    <!-- Fin Navigation principale -->
            
                    <!-- Cart -->
                    <div class="ml-4 flow-root lg:ml-6">
                <a href="{{ route('cart.index') }}" class="group -m-2 flex items-center p-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 shrink-0 text-green-400 group-hover:text-green-500">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>

            <span class="ml-2 text-sm font-medium text-green-700 group-hover:text-green-800">
                @auth
                    @if(auth()->user()->cart && auth()->user()->cart->total_items > 0)
                        {{ auth()->user()->cart->total_items }}
                    @else
                        0
                    @endif
                @else
                    0
                @endauth
            </span>
            <span class="sr-only">items in cart, view bag</span>
                </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    </header>
</div>
