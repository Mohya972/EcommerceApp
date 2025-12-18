
@extends('layouts.boutique')

@section('content')

    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">

            <h1 class="text-3xl font-bold mb-4">
                Nos offres du moment
            </h1>

            <p class="mb-8">
        Découvrez notre sélection d'offres du moment dans nos univers Jardin & potager, 
        décoration de la maison, animalerie, bien-être, alimentation bio et aménagement extérieur. 
        
        Pour jardiner au naturel, 
        composer votre potager en extérieur comme en intérieur, décorer votre maison, 
        prendre soin de votre animal et de votre bien-être. 
        
        De quoi vous faire plaisir toute l'année ! 
        
        Vous êtes membres de notre programme de fidélité ? 
        Bénéficiez toute l’année et sur tous les rayons de nos prix exclusifs Club botanic®. 
        Ces avantages sont exclusivement réservés à nos clients Club !
            </p>
        </div>
    </div>





    <!-- Sidebar Filtres -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-lg shadow p-6 sticky top-4">
            <h2 class="font-bold text-lg mb-4">🔍 Filtres</h2>

                <form method="GET" action="{{ route('products.index') }}">
                    
                    <!-- Catégorie -->
                    <div class="mb-6">
                        <label class="block font-semibold mb-2">Catégorie</label>
                        <select name="category" class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring focus:ring-green-200">
                            <option value="">Toutes les catégories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }} ({{ $category->active_products_count }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Prix -->
                    <div class="mb-6">
                        <label class="block font-semibold mb-2">Prix (€)</label>
                        <div class="grid grid-cols-2 gap-2">
                            <input type="number" 
                                name="min_price" 
                                placeholder="Min" 
                                value="{{ request('min_price') }}"
                                step="0.01"
                                class="border-gray-300 rounded-lg focus:border-green-500 focus:ring focus:ring-green-200">
                            <input type="number" 
                                name="max_price" 
                                placeholder="Max"
                                value="{{ request('max_price') }}"
                                step="0.01"
                                class="border-gray-300 rounded-lg focus:border-green-500 focus:ring focus:ring-green-200">
                        </div>
                    </div>

                    <!-- Options -->
                    <div class="mb-6 space-y-2">
                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" 
                                name="in_stock" 
                                value="1" 
                                {{ request('in_stock') ? 'checked' : '' }}
                                class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                            <span class="ml-2 text-sm">En stock uniquement</span>
                        </label>

                        <label class="flex items-center cursor-pointer">
                            <input type="checkbox" 
                                name="on_sale" 
                                value="1"
                                {{ request('on_sale') ? 'checked' : '' }}
                                class="rounded border-gray-300 text-green-600 focus:ring-green-500">
                            <span class="ml-2 text-sm">En promotion</span>
                        </label>
                    </div>

                    <!-- Tri -->
                    <div class="mb-6">
                        <label class="block font-semibold mb-2">Trier par</label>
                        <select name="sort" class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring focus:ring-green-200">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>
                                Plus récents
                            </option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                Prix croissant
                            </option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                Prix décroissant
                            </option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>
                                Nom (A-Z)
                            </option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>
                                Nom (Z-A)
                            </option>
                        </select>
                    </div>

                    <!-- Boutons -->
                    <div class="space-y-2">
                        <button type="submit" 
                                class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg transition font-semibold shadow hover:shadow-lg">
                            Appliquer les filtres
                        </button>

                        <a href="{{ route('products.index') }}" 
                            class="block w-full text-center bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 rounded-lg transition font-semibold">
                                Réinitialiser
                        </a>
                    </div>
                </form>
            </div>
        </div>
    <!-- Fin Sidebar Filtres -->
                    
                
    <!-- Produits -->

    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900"> Nos Produits </h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @forelse ($products as $product)
                    <x-card-product :product="$product" />
                @empty
                    Bientôt en ligne !
                @endforelse

            </div>
        </div>
        {{ $products->links() }}
    </div>
    <!-- Fin Produits -->


@endsection