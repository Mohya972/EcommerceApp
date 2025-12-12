    <!-- Promotional Banner -->
<div class="scrolling-banner bg-green-600 text-white overflow-hidden whitespace-nowrap py-3">
    <div class="scrolling-content">
        <p class="text-sm">
        
        @foreach ($banners as $banner)
            {{ $banner->content ?? 'Profitez de nos offres spéciales du moment !' }} <br>
        @endforeach
        
        </p>
    </div>
    
            
</div>