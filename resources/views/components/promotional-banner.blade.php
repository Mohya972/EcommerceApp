    <!-- Promotional Banner -->
<div class="bg-green-600 text-white text-center py-2 px-4">
    <p class="text-sm">
        
        @foreach ($banners as $banner)
            {{ $banner->content ?? 'Profitez de nos offres spéciales du moment !' }} <br>
        @endforeach
        
    </p>
            
</div>