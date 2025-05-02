@extends('layouts.app')

@section('title', 'Tentang Kami')

@push('styles')
<style>
    /* Inherit animations from home page */
    .reveal-element {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }
    .reveal-element.active {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* About Specific Styles */
    /* Hero Section */
    .hero-section {
        background-image: url('/images/hero/layer2.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
        min-height: 100vh;
        overflow: hidden;
    }
    .hero-section::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(30,64,175,0.9) 0%, rgba(88,28,135,0.85) 50%, rgba(15,23,42,0.95) 100%);
        z-index: 1;
    }
    .hero-content {position:relative; z-index:2;}
    .vision-mission-card {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .vision-mission-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .vision-mission-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 0;
        background: #3b82f6;
        transition: all 0.4s ease;
    }
    
    .vision-mission-card:hover::before {
        height: 100%;
    }
    
    .history-timeline {
        position: relative;
    }
    
    .history-timeline::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 100%;
        background: #e5e7eb;
    }
    
    .timeline-item {
        position: relative;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        top: 24px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #3b82f6;
        border: 4px solid #e5e7eb;
    }
    
    .timeline-left::before {
        left: calc(50% - 40px);
    }
    
    .timeline-right::before {
        right: calc(50% - 40px);
    }
    
    .team-card {
        transition: all 0.3s ease;
    }
    
    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .team-social {
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }
    
    .team-card:hover .team-social {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .history-timeline::before {
            left: 24px;
        }
        
        .timeline-item::before {
            left: 16px !important;
            right: auto !important;
        }
        
        .timeline-left, .timeline-right {
            padding-left: 56px;
            padding-right: 0;
        }
    }
    /* CTA Section Specific Styles */
    .cta-section {
        perspective: 1000px;
    }

    /* Blob animations */
    @keyframes blob {
        0% { transform: scale(1); }
        33% { transform: scale(1.1) translate(5%, -5%); }
        66% { transform: scale(0.9) translate(-5%, 5%); }
        100% { transform: scale(1); }
    }

    .animate-blob {
        animation: blob 7s infinite ease-in-out;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animation-delay-4000 {
        animation-delay: 4s;
    }

    /* Card hover effect */
    .cta-card {
        transition: transform 0.5s ease;
    }

    .cta-card:hover {
        transform: translateY(-5px);
    }

    /* Button effects */
    .cta-button {
        transition: all 0.3s ease;
    }

    .cta-button:hover::after {
        opacity: 1;
    }

    .cta-button::after {
        content: '';
        position: absolute;
        inset: -5px;
        border-radius: 9999px;
        background: linear-gradient(45deg, #4f46e5, #3b82f6, #8b5cf6, #4f46e5);
        background-size: 200% 200%;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.3s ease;
        animation: gradient-shift 3s ease infinite;
    }

    @keyframes gradient-shift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Feature card hover effect */
    .cta-feature {
        transition: all 0.3s ease;
    }

    /* Text reveal animation */
    .cta-title, .cta-description {
        opacity: 0;
        transform: translateY(20px);
    }

    /* Particle styles */
    .cta-particle {
        position: absolute;
        background-color: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        pointer-events: none;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="particles-container absolute inset-0 z-0"></div>
        <div class="container mx-auto px-4 relative z-10 flex items-center min-h-screen">
            <div class="w-full max-w-5xl mx-auto">
                <!-- Flex Container -->
                <div class="flex flex-col lg:flex-row items-center justify-between">
                    <!-- Left Text Content -->
                    <div class="w-full lg:w-3/5 text-white space-y-8 hero-content">
                        <h1 class="text-5xl md:text-7xl font-bold leading-tight">
                            <span class="hero-title-word block">TENTANG</span>
                            <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">KAMI</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-blue-100 opacity-90 max-w-2xl hero-description">
                            Kepercayaan pelanggan sebelumnya adalah hasil dari kepercayaan pelanggan terhadap kami.
                        </p>
                    </div>
    
                    <!-- Right Logo Image -->
                    {{-- <div class="w-full lg:w-2/5 mt-10 lg:mt-0 flex justify-center lg:justify-end">
                        <img src="{{ asset('images/hero/logo3.png') }}" alt="Logo" class="w-90 h-auto">
                    </div> --}}
                </div>
            </div>
        </div>
    </section>    

    <!-- Visi & Misi Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Visi & Misi</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="vision-mission-card bg-white p-8 rounded-xl shadow-sm border border-gray-100 reveal-element">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Visi Kami</h3>
                    <p class="text-gray-600">Menjadi mitra terdepan dalam transformasi digital yang membawa perubahan signifikan bagi bisnis di Indonesia melalui solusi teknologi inovatif.</p>
                </div>
                
                <div class="vision-mission-card bg-white p-8 rounded-xl shadow-sm border border-gray-100 reveal-element">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-gray-900">Misi Kami</h3>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Memberikan solusi teknologi terkini yang sesuai kebutuhan bisnis</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Menyediakan layanan berkualitas tinggi dengan harga kompetitif</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>Membangun kemitraan jangka panjang dengan klien</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Sejarah Kami Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Sejarah Kami</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
            </div>

            <div class="history-timeline">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach([
                        [
                            'year' => '2015',
                            'title' => 'Pendirian Perusahaan',
                            'description' => 'Ardhan Creative didirikan oleh dua orang founder dengan visi untuk membawa solusi digital yang terjangkau bagi UMKM Indonesia.'
                        ],
                        [
                            'year' => '2017',
                            'title' => 'Ekspansi Tim',
                            'description' => 'Tim berkembang menjadi 10 orang profesional dengan spesialisasi di berbagai bidang teknologi digital.'
                        ],
                        [
                            'year' => '2019',
                            'title' => 'Klien Pertama Korporasi',
                            'description' => 'Mendapatkan proyek pertama dari perusahaan besar sebagai titik balik pertumbuhan bisnis.'
                        ],
                        [
                            'year' => '2021',
                            'title' => 'Peningkatan Kapasitas',
                            'description' => 'Membuka kantor baru dan menambah tim developer untuk memenuhi permintaan pasar yang meningkat.'
                        ],
                        [
                            'year' => '2023',
                            'title' => 'Penghargaan Industri',
                            'description' => 'Mendapatkan penghargaan sebagai Digital Agency Terbaik versi Digital Creative Awards.'
                        ],
                        [
                            'year' => '2024',
                            'title' => 'Ekspansi Layanan',
                            'description' => 'Meluncurkan layanan baru di bidang Artificial Intelligence untuk memberikan solusi lebih komprehensif.'
                        ]
                    ] as $history)
                    <div class="timeline-item {{ $loop->odd ? 'timeline-left pr-8 md:pr-0 md:pl-8' : 'timeline-right pl-8' }} reveal-element">
                        <div class="bg-white p-6 rounded-lg shadow-sm h-full">
                            <div class="text-blue-600 font-bold mb-2">{{ $history['year'] }}</div>
                            <h3 class="text-xl font-bold mb-2 text-gray-900">{{ $history['title'] }}</h3>
                            <p class="text-gray-600">{{ $history['description'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Meet Our Team Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Meet Our Team</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Tim profesional kami siap membantu mewujudkan visi digital bisnis Anda</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([
                    [
                        'name' => 'Anas Zakia Ardhan, S.Kom',
                        'position' => 'CEO & Founder',
                        'image' => 'images/team/anas.jpg',
                        'social' => [
                            'linkedin' => '#',
                            'twitter' => '#',
                            'instagram' => '#'
                        ]
                    ],
                    [
                        'name' => 'Damara Bagas Yhan Winanda, S.M',
                        'position' => 'Head of Design',
                        'image' => 'images/team/anas.jpg',
                        'social' => [
                            'linkedin' => '#',
                            'dribbble' => '#',
                            'behance' => '#'
                        ]
                    ],
                    [
                        'name' => 'Eka Fitriana, S.H',
                        'position' => 'Legal Officer',
                        'image' => 'images/team/anas.jpg',
                        'social' => [
                            'linkedin' => '#',
                            'github' => '#',
                            'twitter' => '#'
                        ]
                    ],
                    [
                        'name' => 'Aris Budi Setyawan, Amd.T',
                        'position' => 'Head Developer',
                        'image' => 'images/team/anas.jpg',
                        'social' => [
                            'linkedin' => '#',
                            'instagram' => '#',
                            'facebook' => '#'
                        ]
                    ],
                    [
                        'name' => 'Ihza Nailan Niam, S.M',
                        'position' => 'Lead Marketing',
                        'image' => 'images/team/anas.jpg',
                        'social' => [
                            'linkedin' => '#',
                            'instagram' => '#',
                            'facebook' => '#'
                        ]
                    ]
                ] as $member)
                <div class="team-card bg-white rounded-xl overflow-hidden shadow-md text-center reveal-element">
                    <div class="relative overflow-hidden h-64">
                        <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" 
                            class="w-full h-full object-cover object-[center_30%] hover:object-[center_40%] transition-all duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                            <div class="team-social absolute bottom-6 left-0 right-0 flex justify-center space-x-4">
                            @foreach($member['social'] as $platform => $url)
                            <a href="{{ $url }}" class="text-white hover:text-blue-300 transition-colors">
                                @if($platform === 'linkedin')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                                @elseif($platform === 'twitter')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                                @elseif($platform === 'instagram')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                                @elseif($platform === 'github')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                                @elseif($platform === 'dribbble')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm9.847 7.929c-.23-.734-2.132-1.065-3.313-.918.766 1.811 1.019 3.901.477 5.713 1.644-.333 2.748-1.731 2.836-4.795zm-6.011 12.215c-.644 1.694-2.075 3.309-4.34 3.309-1.704 0-3.774-1.079-4.935-3.512-.122-.236-.155-.413-.155-.413s3.064.115 6.221-1.527c.229.4.472.786.728 1.159.943 1.223 1.347 2.371 2.481 2.984zm-8.295-7.564s-.341.052-.936.052c-3.225 0-6.201-1.103-6.201-1.103s.184 1.039.553 1.902c.156.368.341.729.552 1.065 1.108-.386 2.312-.6 3.583-.624 0 0-.646-1.292-1.937-2.292zm3.215-6.183c-1.239.013-2.394.204-3.44.548-1.002-1.835-.846-3.669-.846-3.669s2.24.391 3.948 1.753c1.706 1.361 2.298 3.107 2.298 3.107s-.552-.066-1.96-.739zm9.724 1.526c-1.139-.276-2.232-.408-3.282-.408-.494 0-.975.023-1.44.066.024-.266.035-.537.035-.813 0-1.166-.246-2.269-.679-3.255 2.132.184 4.01 1.064 5.181 2.408.067.134.129.272.187.412-.738.26-1.566.4-2.002.49zm-5.518-5.569c.328.814.547 1.72.635 2.684-1.372.133-2.736.44-4.032.913-.781-1.282-1.127-2.615-1.127-2.615s2.253-1.184 4.524-1.184c0 0 .001-.001 0 0 .001 0 .184 0 .528.127-.085.055-.168.112-.248.169-.495.36-.924.8-1.28 1.302 1.152-.184 2.35-.268 3.563-.229-.407-.42-.764-.878-1.063-1.367zm-10.239 7.71c-.198.38-.374.773-.525 1.179-1.834-.613-3.14-1.168-3.14-1.168s.781-1.277 2.052-2.213c1.272-.936 2.667-1.435 2.667-1.435s-1.076 1.548-2.054 3.637z"/>
                                </svg>
                                @elseif($platform === 'behance')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22 7h-7v-2h7v2zm1.726 10c-.442 1.297-2.029 3-5.101 3-3.074 0-5.564-1.729-5.564-5.675 0-3.91 2.325-5.92 5.466-5.92 3.082 0 4.964 1.782 5.375 4.426.078.506.109 1.188.109 2.129h-8.918c.13 3.211 3.483 3.312 4.588 2.029h3.168zm-7.686-4h4.965c-.105-1.547-1.136-2.219-2.477-2.219-1.466 0-2.277.768-2.488 2.219zm-9.574 6.988h-6.466v-14.967h6.953c5.476.081 5.58 5.444 2.72 6.906 3.461 1.26 3.577 8.061-3.207 8.061zm-3.466-8.988h3.584c2.508 0 2.906-3-.312-3h-3.272v3zm3.391 3h-3.391v3.016h3.341c3.055 0 2.868-3.016.05-3.016z"/>
                                </svg>
                                @elseif($platform === 'facebook')
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                                </svg>
                                @endif
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-1 text-gray-900">{{ $member['name'] }}</h3>
                        <p class="text-blue-600">{{ $member['position'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

   <!-- Enhanced CTA Section -->
    <section class="cta-section py-24 relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-700 to-purple-800 z-0"></div>
        <div class="cta-particles absolute inset-0 z-1"></div>
        <div class="cta-blob absolute -right-64 -bottom-64 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob z-1"></div>
        <div class="cta-blob absolute -left-32 -top-32 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000 z-1"></div>
        <div class="cta-blob absolute right-20 top-20 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000 z-1"></div>

        <!-- Content Container -->
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto">
                <!-- Card design -->
                <div class="cta-card bg-white/10 backdrop-blur-lg rounded-3xl p-2 shadow-2xl border border-white/20">
                    <div class="inner-card bg-gradient-to-br from-indigo-900/50 to-purple-900/50 rounded-2xl p-8 md:p-12">
                        <div class="text-center mb-10">
                            <h2 class="cta-title text-4xl md:text-5xl font-bold mb-6 text-white">
                                <span class="inline-block">Siap Untuk Transformasi</span>
                                <span class="inline-block ml-2 relative">
                                    Digital?
                                    <svg class="absolute -bottom-3 left-0 w-full" height="6" viewBox="0 0 100 6" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.5 3C20 -1 40 8 50 3C60 -2 80 6 100 3" stroke="#4F46E5" stroke-width="5" fill="none" stroke-linecap="round"/>
                                    </svg>
                                </span>
                            </h2>
                            <p class="cta-description text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
                                Konsultasikan kebutuhan digital bisnis Anda untuk solusi terbaik yang akan menumbuhkan perusahaan Anda.
                            </p>
                        </div>
                        
                        <!-- Two column layout for options -->
                        <div class="grid md:grid-cols-2 gap-8 mb-10">
                            <div class="cta-feature bg-white/5 hover:bg-white/10 rounded-xl p-6 transition-all transform hover:-translate-y-1 cursor-pointer border border-white/10 hover:border-white/20">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Konsultasi Gratis</h3>
                                <p class="text-blue-100">Diskusikan kebutuhan Anda dengan tim ahli kami tanpa biaya</p>
                            </div>
                            
                            <div class="cta-feature bg-white/5 hover:bg-white/10 rounded-xl p-6 transition-all transform hover:-translate-y-1 cursor-pointer border border-white/10 hover:border-white/20">
                                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center mb-4">
                                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white mb-2">Layanan Cepat</h3>
                                <p class="text-blue-100">Proses pengerjaan efisien dengan hasil berkualitas tinggi</p>
                            </div>
                        </div>
                        
                        <!-- CTA Button -->
                        <div class="text-center">
                            <div class="cta-button-wrapper inline-block relative">
                                <div class="cta-button-glow absolute inset-0 rounded-full bg-blue-500 blur-md opacity-75 group-hover:opacity-100 transition-all animate-pulse"></div>
                                <button id="ctaButton" class="cta-button relative px-8 py-4 bg-gradient-to-r from-indigo-600 to-blue-500 hover:from-indigo-500 hover:to-blue-400 text-white font-semibold text-lg rounded-full shadow-lg hover:shadow-indigo-500/50 transform transition-all hover:-translate-y-1 active:translate-y-0 overflow-hidden group">
                                    <span class="relative z-10 flex items-center justify-center space-x-2">
                                        <span>Hubungi Kami Sekarang</span>
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </span>
                                    <span class="absolute inset-0 bg-gradient-to-r from-indigo-400 to-blue-300 opacity-0 group-hover:opacity-20 transition-opacity"></span>
                                </button>
                            </div>
                            <p class="text-blue-200 mt-6 text-sm">*Tanpa kewajiban, batalkan kapan saja</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll reveal animation
        const revealElements = document.querySelectorAll('.reveal-element');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.1 });
        
        revealElements.forEach(element => {
            observer.observe(element);
        });
        
        // Team card hover effect
        const teamCards = document.querySelectorAll('.team-card');
        teamCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.querySelector('.team-social').style.opacity = '1';
                card.querySelector('.team-social').style.transform = 'translateY(0)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.querySelector('.team-social').style.opacity = '0';
                card.querySelector('.team-social').style.transform = 'translateY(10px)';
            });
        });
    });

    // Script to handle CTA section animations
document.addEventListener('DOMContentLoaded', function() {
    // Reveal animations when section comes into view
    const ctaSection = document.querySelector('.cta-section');
    const ctaTitle = document.querySelector('.cta-title');
    const ctaDesc = document.querySelector('.cta-description');
    const ctaFeatures = document.querySelectorAll('.cta-feature');
    const ctaButton = document.querySelector('.cta-button-wrapper');
    
    // Create intersection observer
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting) {
            // Animate title
            setTimeout(() => {
                ctaTitle.style.transition = 'all 0.8s ease-out';
                ctaTitle.style.opacity = '1';
                ctaTitle.style.transform = 'translateY(0)';
            }, 300);
            
            // Animate description
            setTimeout(() => {
                ctaDesc.style.transition = 'all 0.8s ease-out';
                ctaDesc.style.opacity = '1';
                ctaDesc.style.transform = 'translateY(0)';
            }, 500);
            
            // Animate features
            ctaFeatures.forEach((feature, index) => {
                setTimeout(() => {
                    feature.style.transition = 'all 0.6s ease-out';
                    feature.style.opacity = '0';
                    feature.style.transform = 'translateY(20px)';
                    
                    setTimeout(() => {
                        feature.style.opacity = '1';
                        feature.style.transform = 'translateY(0)';
                    }, 100);
                }, 700 + (index * 200));
            });
            
            // Animate button
            setTimeout(() => {
                ctaButton.style.transition = 'all 0.8s ease-out';
                ctaButton.style.opacity = '0';
                ctaButton.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    ctaButton.style.opacity = '1';
                    ctaButton.style.transform = 'translateY(0)';
                }, 100);
            }, 1200);
            
            // Create particles
            createParticles();
            
            // Disconnect observer after animation
            observer.disconnect();
        }
    }, { threshold: 0.3 });
    
    observer.observe(ctaSection);
    
    // Button pulse effect
    const ctaButtonEl = document.getElementById('ctaButton');
    ctaButtonEl.addEventListener('mouseover', function() {
        this.style.transform = 'translateY(-4px)';
    });
    
    ctaButtonEl.addEventListener('mouseout', function() {
        this.style.transform = 'translateY(0)';
    });
    
    // Create particles
    function createParticles() {
        const particlesContainer = document.querySelector('.cta-particles');
        const particleCount = 20;
        
        for (let i = 0; i < particleCount; i++) {
            const size = Math.random() * 4 + 1;
            const particle = document.createElement('div');
            
            particle.classList.add('cta-particle');
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.opacity = Math.random() * 0.5 + 0.1;
            
            particlesContainer.appendChild(particle);
            
            // Random floating animation
            anime({
                targets: particle,
                translateX: [
                    { value: (Math.random() - 0.5) * 50, duration: 5000 },
                    { value: (Math.random() - 0.5) * 50, duration: 5000 }
                ],
                translateY: [
                    { value: (Math.random() - 0.5) * 50, duration: 5000 },
                    { value: (Math.random() - 0.5) * 50, duration: 5000 }
                ],
                opacity: [
                    { value: Math.random() * 0.5 + 0.5, duration: 2000 },
                    { value: Math.random() * 0.3 + 0.1, duration: 2000 }
                ],
                easing: 'easeInOutQuad',
                direction: 'alternate',
                loop: true
            });
        }
    }
    
    // Modified anime.js micro implementation - just enough for our particles
    function anime(params) {
        const targets = params.targets;
        const duration = params.translateX[0].duration;
        const startX = parseFloat(targets.style.transform.replace(/[^\d.-]/g, '') || 0);
        const startY = parseFloat(targets.style.transform.replace(/[^\d.-]/g, '') || 0);
        const targetX = params.translateX[0].value;
        const targetY = params.translateY[0].value;
        const startOpacity = parseFloat(targets.style.opacity || 0);
        const targetOpacity = params.opacity[0].value;
        
        let startTime;
        
        function animate(time) {
            if (!startTime) startTime = time;
            const elapsed = time - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing function (easeInOutQuad)
            const eased = progress < 0.5 ? 2 * progress * progress : 1 - Math.pow(-2 * progress + 2, 2) / 2;
            
            // Apply transforms
            const currentX = startX + (targetX - startX) * eased;
            const currentY = startY + (targetY - startY) * eased;
            const currentOpacity = startOpacity + (targetOpacity - startOpacity) * eased;
            
            targets.style.transform = `translate(${currentX}px, ${currentY}px)`;
            targets.style.opacity = currentOpacity;
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            } else if (params.direction === 'alternate' && params.loop) {
                // Reverse values and continue animation
                params.translateX = [
                    { value: startX, duration: duration },
                    { value: targetX, duration: duration }
                ];
                params.translateY = [
                    { value: startY, duration: duration },
                    { value: targetY, duration: duration }
                ];
                params.opacity = [
                    { value: startOpacity, duration: duration / 2 },
                    { value: targetOpacity, duration: duration / 2 }
                ];
                anime(params);
            }
        }
        
        requestAnimationFrame(animate);
        
        return {
            pause: function() {},
            play: function() {}
        };
    }
});
</script>
@endpush