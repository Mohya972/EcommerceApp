
@extends('layouts.boutique')

@section('content')

    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900"> Produits Vedettes </h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @forelse ($featuredProducts as $featuredProduct)
                    <x-card-product :product="$featuredProduct" />
                @empty
                    Bientôt les nouveautés !
                @endforelse
                    
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900"> Nouveautés </h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @forelse ($newProducts as $newProduct)
                    <x-card-product :product="$newProduct" />
                @empty
                    Bientôt les nouveautés !
                @endforelse
                    
            </div>
        </div>
    </div>

    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900"> En solde ! </h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                @forelse ($saleProducts as $saleProduct)
                    <x-card-product :product="$saleProduct" />
                @empty
                    Bientôt les nouveautés !
                @endforelse
                    
            </div>
        </div>
    </div>


@endsection