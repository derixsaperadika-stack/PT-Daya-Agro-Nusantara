@props([
    'height' => 44,
    'showText' => true,
    'textColor' => 'text-dark',
    'subColor' => 'text-muted'
])

<div {{ $attributes->merge(['class' => 'd-inline-flex align-items-center text-decoration-none gap-2']) }}>
    <!-- SVG Langsung di Navbar / Header: Tajam di semua resolusi & tanpa dependensi file eksternal -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 160" width="{{ $height }}" height="{{ $height }}" class="flex-shrink-0" style="filter: drop-shadow(0 2px 4px rgba(22, 101, 52, 0.2));">
        <defs>
            <linearGradient id="danGreenGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#15803D" />
                <stop offset="50%" stop-color="#166534" />
                <stop offset="100%" stop-color="#14532D" />
            </linearGradient>
            <linearGradient id="danGoldGrad" x1="0%" y1="100%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#D97706" />
                <stop offset="100%" stop-color="#FBBF24" />
            </linearGradient>
            <linearGradient id="danLeafGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                <stop offset="0%" stop-color="#4ADE80" />
                <stop offset="100%" stop-color="#16A34A" />
            </linearGradient>
        </defs>
        
        <!-- Background Shield / Hexagon Soft -->
        <rect x="8" y="8" width="144" height="144" rx="36" fill="#F0FDF4" stroke="#DCFCE7" stroke-width="3"/>
        
        <!-- Stylized Letter 'D' Body -->
        <!-- Stem -->
        <rect x="36" y="32" width="22" height="96" rx="11" fill="url(#danGreenGrad)"/>
        
        <!-- Curved Arch of 'D' representing Agro Sun Arc -->
        <path d="M 48 32 H 88 C 122 32, 134 56, 134 80 C 134 104, 122 128, 88 128 H 48" 
              fill="none" 
              stroke="url(#danGreenGrad)" 
              stroke-width="22" 
              stroke-linecap="round" 
              stroke-linejoin="round"/>
        
        <!-- Agricultural Sprout / Golden Harvest inside the D -->
        <!-- Sun/Earth Arc -->
        <path d="M 68 96 Q 84 76 102 96" fill="none" stroke="url(#danGoldGrad)" stroke-width="7" stroke-linecap="round"/>
        
        <!-- Sprouting Green Leaf -->
        <path d="M 76 88 C 76 66, 96 58, 96 58 C 96 58, 98 78, 86 86 Z" fill="url(#danLeafGrad)"/>
        <!-- Small Sprout Leaf -->
        <path d="M 74 76 C 62 70, 64 58, 64 58 C 64 58, 76 62, 75 74 Z" fill="url(#danGoldGrad)"/>
        
        <!-- Center Seed Dot -->
        <circle cx="85" cy="104" r="5" fill="#D97706" />
    </svg>

    @if($showText)
        <div class="d-flex flex-column text-start leading-tight">
            <span class="fw-bold tracking-tight text-uppercase {{ $textColor }}" style="font-size: 1.05rem; letter-spacing: 0.5px; line-height: 1.15;">
                <span style="color: #166534;">Daya Agro</span> <span style="color: #D97706;">Nusantara</span>
            </span>
            <small class="{{ $subColor }}" style="font-size: 0.72rem; letter-spacing: 0.8px;">
                PANGAN &amp; PERTANIAN LOKAL
            </small>
        </div>
    @endif
</div>
