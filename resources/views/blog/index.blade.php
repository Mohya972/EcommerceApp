<!-- Blog Inspirations -->
@extends('layouts.boutique')

@section('title', 'Blog - Inspirations')    

@section('content')

<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-green-800 mb-4">Notre Blog Fleuri</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Découvrez nos conseils, inspirations et histoires autour des fleurs
        </p>
    </div>

    <!-- Carrousel vertical - Version HTML/CSS pure -->
    <div class="max-w-4xl mx-auto">
        <div class="relative">
            <!-- Conteneur du carrousel -->
            <div class="overflow-hidden h-[600px]">
                <div class="h-full overflow-y-auto snap-y snap-mandatory scroll-smooth">
                    @foreach($posts as $post)
                    <div class="snap-start min-h-[600px] flex items-center justify-center py-8">
                        <article class="bg-white rounded-2xl shadow-lg overflow-hidden max-w-2xl w-full mx-4">
                            @if($post->image)
                            <div class="h-48 overflow-hidden">
                                <img 
                                    src="{{ asset('storage/' . $post->image) }}" 
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-500"
                                >
                            </div>
                            @endif
                            
                            <div class="p-8">
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <span class="mr-4">
                                        {{ $post->published_at->format('d M Y') }}
                                    </span>
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $post->comments->count() }} commentaires
                                    </span>
                                </div>
                                
                                <h2 class="text-2xl font-bold text-gray-800 mb-4">
                                    {{ $post->title }}
                                </h2>
                                
                                <div class="text-gray-600 mb-6 line-clamp-3">
                                    {{ $post->excerpt }}
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <a 
                                        href="{{ route('blog.show', $post) }}"
                                        class="inline-flex items-center text-green-700 hover:text-green-800 font-medium"
                                    >
                                        Lire l'article complet
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>
                                    
                                    <span class="text-xs px-3 py-1 bg-green-100 text-green-800 rounded-full">
                                        Boutique Florale
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Newsletter invitation (dans chaque article du carrousel) -->
                            <div class="bg-green-50 p-6 border-t border-green-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-semibold text-green-800">
                                            Abonnez-vous à notre newsletter
                                        </h3>
                                        <p class="text-sm text-green-600">
                                            Recevez nos conseils fleuris directement dans votre boîte mail
                                        </p>
                                    </div>
                                    <form action="{{ route('blog.subscribe') }}" method="POST" class="flex">
                                        @csrf
                                        <input 
                                            type="email" 
                                            name="email"
                                            placeholder="Votre email"
                                            required
                                            class="px-4 py-2 border border-green-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                        >
                                        <button 
                                            type="submit"
                                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-r-lg transition-colors"
                                        >
                                            S'abonner
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Indicateurs de navigation (facultatifs) -->
            <div class="flex justify-center mt-8 space-x-2">
                @foreach($posts as $index => $post)
                <a 
                    href="#article-{{ $index }}"
                    class="w-3 h-3 rounded-full bg-green-300 hover:bg-green-500 transition-colors"
                ></a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    /* Styles pour le carrousel vertical */
    .snap-y {
        scroll-snap-type: y mandatory;
    }
    .snap-start {
        scroll-snap-align: start;
    }
    .scroll-smooth {
        scroll-behavior: smooth;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Personnalisation de la scrollbar */
    .overflow-y-auto::-webkit-scrollbar {
        width: 6px;
    }
    .overflow-y-auto::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .overflow-y-auto::-webkit-scrollbar-thumb {
        background: #10b981;
        border-radius: 10px;
    }
    .overflow-y-auto::-webkit-scrollbar-thumb:hover {
        background: #059669;
    }
</style>

@endsection