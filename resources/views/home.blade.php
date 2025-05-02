@extends('layouts.app')

@section('title', 'Beranda')

@push('styles')
<style>
     /* Hero Section with Background Image */
    .hero-section {
        background-image: url('/images/hero/layer2.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, 
                rgba(30, 64, 175, 0.9) 0%, 
                rgba(88, 28, 135, 0.85) 50%, 
                rgba(15, 23, 42, 0.95) 100%);
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .hero-title span {
        display: inline-block;
        opacity: 0;
        transform: translateY(30px);
    }
    
    .hero-description {
        opacity: 0;
        transform: translateY(20px);
    }
    
    .hero-buttons {
        opacity: 0;
    }
    
    .hero-images img {
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    
    /* CTA Section with Background Image */
    .cta-section {
        background-image: url('/images/backgrounds/tech-pattern.jpg');
        background-size: cover;
        background-position: center;
        position: relative;
    }
    
    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.9) 0%, rgba(67, 56, 202, 0.95) 100%);
        z-index: 1;
    }
    
    .cta-content {
        position: relative;
        z-index: 2;
    }
    
    .cta-title {
        opacity: 0;
        transform: translateY(20px);
    }
    
    .cta-description {
        opacity: 0;
        transform: translateY(20px);
    }
    
    .cta-counters {
        opacity: 0;
    }
    
    .cta-form {
        opacity: 0;
        transform: translateX(30px);
    }
    
    .cta-form-input {
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    
    .cta-form-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }
    
    /* Particle animation */
    .particles-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }
    
    .particle {
        position: absolute;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.2);
        pointer-events: none;
    }
    /* Base Animation & Effects */
    .reveal-element {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }
    .reveal-element.active {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Hero Section */
    .hero-gradient {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    }
    
    /* Service Cards */
    .service-card {
        transition: all 0.4s ease;
    }
    .service-card:hover {
        transform: translateY(-10px);
    }
    
    /* Client Logos */
    .logo-container {
        display: flex;
        overflow: hidden;
    }
    .logo-slider {
        display: flex;
        animation: slide 20s linear infinite;
    }
    .logo-slider:hover {
        animation-play-state: paused;
    }
    @keyframes slide {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    
    /* Counter Animation */
    .counter {
        transition: all 0.5s ease;
    }
    
    /* Testimonials */
    .testimonial-card {
        transition: all 0.3s ease;
    }
    .testimonial-card:hover {
        transform: translateY(-5px);
    }

    /* CTA Section */
    .cta-button {
        transition: all 0.3s ease;
    }
    .cta-button:hover {
        transform: translateY(-3px);
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .animate-fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
    }
    
    @keyframes fadeIn {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }

    /* Custom animations */
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes scaleX {
        from {
            transform: scaleX(0);
        }
        to {
            transform: scaleX(1);
        }
    }
    
    @keyframes pulseSlow {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }
    
    @keyframes bounceSlow {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    
    @keyframes spinSlow {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }
    
    @keyframes tadaSlow {
        0% {
            transform: scale(1);
        }
        10%, 20% {
            transform: scale(0.9) rotate(-3deg);
        }
        30%, 50%, 70%, 90% {
            transform: scale(1.1) rotate(3deg);
        }
        40%, 60%, 80% {
            transform: scale(1.1) rotate(-3deg);
        }
        100% {
            transform: scale(1) rotate(0);
        }
    }
    
    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }
        50% {
            opacity: 1;
            transform: scale(1.05);
        }
        70% {
            transform: scale(0.9);
        }
        100% {
            transform: scale(1);
        }
    }
    
    /* Animation classes */
    .animate-fade-in-down {
        animation: fadeInDown 1s ease-out forwards;
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 1s ease-out forwards;
    }
    
    .animate-fade-in-left {
        animation: fadeInLeft 1s ease-out forwards;
    }
    
    .animate-fade-in-right {
        animation: fadeInRight 1s ease-out forwards;
    }
    
    .animate-scale-x {
        animation: scaleX 0.8s ease-out forwards;
    }
    
    .animate-pulse-slow {
        animation: pulseSlow 3s infinite;
    }
    
    .animate-bounce-slow {
        animation: bounceSlow 3s infinite;
    }
    
    .animate-spin-slow {
        animation: spinSlow 8s linear infinite;
    }
    
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
    
    .animate-tada-slow {
        animation: tadaSlow 2s ease-in-out infinite;
    }
    
    .animate-bounce-in {
        animation: bounceIn 1s ease-out forwards;
    }
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section relative min-h-screen overflow-hidden">
        <div class="particles-container"></div>
        <div class="container mx-auto px-4 relative z-10 flex items-center min-h-screen">
            <div class="w-full max-w-5xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center">
                    <!-- Left Text Content -->
                    <div class="w-full lg:w-3/5 text-white space-y-8 hero-content">
                        <div class="inline-flex items-center px-4 py-2 rounded-full bg-white bg-opacity-10 backdrop-filter backdrop-blur-sm border border-white border-opacity-20 mb-4 hero-badge">
                            <span class="w-3 h-3 rounded-full bg-blue-400 mr-2"></span>
                            <span class="text-sm font-medium">Solusi Digitalisasi</span>
                        </div>
                        
                        <h1 class="text-5xl md:text-7xl font-bold leading-tight hero-title">
                            <span class="hero-title-word">TRANSFORMASI</span>
                            <span class="hero-title-word">DIGITALISASI</span>
                            <span class="hero-title-word text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">DIMULAI</span>
                            <span class="hero-title-word text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">DARI</span>
                            <span class="hero-title-word text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">SINI</span>
                        </h1>
                        
                        <p class="text-xl md:text-2xl text-blue-100 opacity-90 max-w-2xl hero-description">
                            Solusi digital terkini untuk bisnis Anda yang siap meraih kesuksesan di era digital.
                        </p>
                        
                        <div class="flex flex-wrap gap-6 mt-4 hero-buttons">
                            <a href="#" class="px-8 py-4 rounded-full bg-white text-blue-800 font-medium shadow-lg hover:shadow-blue-500/30 hover:scale-105 transition-all">
                                Konsultasi Gratis
                            </a>
                            
                            <a href="{{ route('portfolio') }}" class="px-8 py-4 rounded-full border border-white font-medium text-white hover:bg-white hover:bg-opacity-10 transition-all">
                                Lihat Portfolio
                            </a>
                        </div>
                    </div>
                    
                    {{-- <!-- Right Images -->
                    <div class="w-full lg:w-2/5 mt-16 lg:mt-0 relative h-96 hero-images">
                        <div class="relative w-full h-full">
                            <div class="absolute top-0 right-0 w-64 h-auto transform rotate-6 hero-image" data-delay="0.3">
                                <img src="{{ asset('images/layanan/web.jpg') }}" alt="Laptop Mockup" class="w-full h-auto">
                            </div>
                            
                            <div class="absolute bottom-0 left-10 w-40 h-auto transform -rotate-12 hero-image" data-delay="0.6">
                                <img src="{{ asset('images/layanan/mob.jpg') }}" alt="Mobile Mockup" class="w-full h-auto">
                            </div>
                            
                            <div class="absolute top-1/4 left-0 w-48 h-auto transform -rotate-6 hero-image" data-delay="0.9">
                                <img src="{{ asset('images/layanan/ui.jpg') }}" alt="Tablet Mockup" class="w-full h-auto">
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- Client Logo Slider -->
    <section class="py-10 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-center mb-8 text-gray-800">Dipercaya oleh</h2>
            
            <div class="logo-container">
                <div class="logo-slider">
                    <div class="px-4 flex items-center justify-center">
                        <img src="{{ asset('images/clients/pol.png') }}" alt="Client Logo 1" class="h-16 grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="px-4 flex items-center justify-center">
                        <img src="{{ asset('images/clients/rad.png') }}" alt="Client Logo 2" class="h-16 grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="px-4 flex items-center justify-center">
                        <img src="{{ asset('images/hero/logoasli.png') }}" alt="Client Logo 3" class="h-16 grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="px-4 flex items-center justify-center">
                        <img src="{{ asset('images/clients/kpu.png') }}" alt="Client Logo 4" class="h-16 grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="px-4 flex items-center justify-center">
                        <img src="{{ asset('images/clients/smg.png') }}" alt="Client Logo 5" class="h-16 grayscale hover:grayscale-0 transition-all">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Utama -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Layanan Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Solusi digital komprehensif untuk membantu bisnis Anda tumbuh lebih cepat</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 reveal-element">
                @foreach(['MOBILE APP DEVELOPMENT', 'WEB DEVELOPMENT', 'SEO', 'SOSIAL MEDIA ADS', 'UI/UX DESIGN & BRAND DESIGN'] as $service)
                <div class="service-card bg-gradient-to-b from-transparent to-black relative rounded-lg overflow-hidden group h-96">
                    <img src="{{ asset('images/layanan/mob.jpg') }}" alt="{{ $service }}" class="w-full h-full object-cover absolute inset-0">
                    <div class="absolute inset-0 bg-black bg-opacity-40 group-hover:bg-opacity-50 transition-all"></div>
                    <div class="relative z-10 flex flex-col justify-end h-full p-6">
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $service }}</h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Proses Kerja Sama -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Alur Produksi di Ardhan Creative</h2>
            </div>

            <div class="relative">
                <div class="mb-16">
                    <h3 class="text-4xl font-light text-gray-400 mb-10">Tahap Pra Produksi</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @foreach([
                            '01' => 'Pembahasan Perancangan',
                            '02' => 'Analisis Permintaan',
                            '03' => 'Spesifikasi Sistem',
                            '04' => 'Kesepakatan SLA'
                        ] as $num => $title)
                        <div class="bg-white p-6 rounded-lg shadow-sm reveal-element">
                            <div class="text-xl font-semibold text-gray-500 mb-2">{{ $num }}</div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">{{ $title }}</h4>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="flex justify-end mt-4">
                        <div class="bg-gray-200 p-6 rounded-lg shadow-sm reveal-element max-w-xs">
                            <div class="text-xl font-semibold text-gray-500 mb-2">05</div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">Deal</h4>
                        </div>
                    </div>
                </div>
                
                <div class="mb-16">
                    <h3 class="text-4xl font-light text-gray-400 mb-10">Tahap Produksi</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @foreach([
                            '09' => 'Desain UI/UX',
                            '08' => 'Pemrograman',
                            '07' => 'Testing',
                            '06' => 'Revisi'
                        ] as $num => $title)
                        <div class="bg-white p-6 rounded-lg shadow-sm reveal-element">
                            <div class="text-xl font-semibold text-gray-500 mb-2">{{ $num }}</div>
                            <h4 class="text-xl font-semibold text-gray-800 mb-2">{{ $title }}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div>
                    <h3 class="text-4xl font-light text-gray-400 mb-10">Tahap Pasca Produksi</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @foreach([
                            '13' => 'Deployment',
                            '12' => 'Pelatihan User',
                            '11' => 'Implementasi',
                            '10' => 'Final Testing & Maintinance'
                        ] as $num => $title)
                        <div class="{{ $num == '10' ? 'bg-blue-600 text-white' : 'bg-white' }} p-6 rounded-lg shadow-sm reveal-element">
                            <div class="text-xl font-semibold mb-2">{{ $num }}</div>
                            <h4 class="text-xl font-semibold mb-2">{{ $title }}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Kenapa Memilih Kami -->
    <section id="why-choose-us" class="why-choose-us py-16 bg-gray-50 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 transform transition-all duration-500 ease-in-out hover:scale-105">
                <h2 class="text-3xl font-bold mb-4 text-gray-800 animate-fade-in-down">Kenapa Memilih Kami</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6 animate-scale-x"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto animate-fade-in-up">Kami memberikan layanan terbaik dengan kualitas yang terjamin dan profesionalisme tinggi</p>
            </div>
            
            <!-- First row - 3 cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Card 1: Terpercaya -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-left">
                    <div class="flex items-center p-6">
                        <!-- Icon container with pulse animation -->
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-pulse-slow">
                            <div class="w-full h-full bg-blue-100 rounded-full flex items-center justify-center">
                                <!-- Replace with your actual icon image -->
                                <img src="{{ asset('images/hero/percaya.jpg') }}" alt="Terpercaya Icon" class="w-16 h-16" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Terpercaya</h3>
                            <p class="text-gray-600">Jasa Pembuatan aplikasi mobile terpercaya & memberikan jaminan pengawasan</p>
                        </div>
                    </div>
                </div>
                
                <!-- Card 2: Respon Cepat -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-down">
                    <div class="flex items-center p-6">
                        <!-- Icon container with bounce animation -->
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-bounce-slow">
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                                <!-- Replace with your actual icon image -->
                                <img src="{{ asset('images/hero/respon.jpg') }}" alt="Respon Cepat Icon" class="w-16 h-16" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-white">Respon Cepat</h3>
                            <p class="text-white">Kami menjadikan kepuasan pelanggan sebagai prioritas kami. Kami siap melayani anda dengan cepat dan gesit.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Card 3: SDM Profesional -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-right">
                    <div class="flex items-center p-6">
                        <!-- Icon container with spin animation -->
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-spin-slow">
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                                <!-- Replace with your actual icon image -->
                                <img src="{{ asset('images/hero/pro.jpg') }}" alt="SDM Profesional Icon" class="w-16 h-16" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-white">SDM Profesional</h3>
                            <p class="text-white">SDM berpengalaman dan profesional memberikan hasil berkualitas dan terjamin</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Second row - 3 cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 4: Berkualitas -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-left">
                    <div class="flex items-center p-6">
                        <!-- Icon container with float animation -->
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-float">
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                                <!-- Replace with your actual icon image -->
                                <img src="{{ asset('images/hero/kualitas.jpg') }}" alt="Berkualitas Icon" class="w-16 h-16" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-white">Berkualitas</h3>
                            <p class="text-white">Kami tidak hanya melayani, tapi memberikan solusi dan menyelesaikan masalah Anda</p>
                        </div>
                    </div>
                </div>
                
                <!-- Card 5: Inovatif -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-up">
                    <div class="flex items-center p-6">
                        <!-- Icon container with tada animation -->
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-tada-slow">
                            <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                                <!-- Replace with your actual icon image -->
                                <img src="{{ asset('images/hero/inovatif.png') }}" alt="Inovatif Icon" class="w-16 h-16" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-white">Inovatif</h3>
                            <p class="text-white">Kami selalu berinovasi untuk memberikan solusi terbaik dan terkini.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Card 6: Kreatif -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-2 animate-fade-in-right">
                    <div class="flex items-center p-6">
                        <!-- Icon container with pulse animation -->
                        <div class="w-24 h-24 flex-shrink-0 mr-4 animate-pulse-slow">
                            <div class="w-full h-full bg-blue-100 rounded-full flex items-center justify-center">
                                <!-- Replace with your actual icon image -->
                                <img src="{{ asset('images/hero/kreatif.png') }}" alt="Kreatif Icon" class="w-16 h-16" />
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2 text-gray-800">Kreatif</h3>
                            <p class="text-gray-600">Kami menghadirkan solusi kreatif yang berbeda dan penuh inspirasi.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- CTA Button with animation -->
            <div class="text-center mt-10 animate-bounce-in">
                <a href="#" class="inline-block bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    Yuk Diskusi Dengan Kami
                </a>
            </div>
        </div>
    </section>
  
    <!-- Testimonial Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Apa Kata Klien</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">Testimoni dari mereka yang telah merasakan manfaat layanan kami</p>
            </div>

            <div class="max-w-4xl mx-auto reveal-element">
                <div class="testimonial-slider overflow-hidden">
                    <div id="testimonial-container" class="flex transition-all duration-500">
                        <!-- Testimonials will be generated by JS -->
                    </div>
                </div>
                
                <div class="flex justify-center mt-10 gap-2">
                    <button id="prev-btn" class="p-3 rounded-full bg-gray-100 hover:bg-blue-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <div id="pagination" class="flex items-center gap-2">
                        <!-- Pagination dots will be generated by JS -->
                    </div>
                    <button id="next-btn" class="p-3 rounded-full bg-gray-100 hover:bg-blue-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-24 relative overflow-hidden">
        <div class="particles-container"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <!-- Text Content -->
                <div class="lg:w-1/2 mb-10 lg:mb-0 text-center lg:text-left cta-content">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white leading-tight cta-title">
                        <span class="block">Siap <span class="text-yellow-300">Transformasi</span></span>
                        <span class="block"><span class="text-yellow-300">Digital</span> Bisnis Anda?</span>
                    </h2>
                    <p class="text-xl text-blue-100 mb-8 max-w-lg mx-auto lg:mx-0 cta-description">
                        Konsultasikan kebutuhan bisnis Anda dengan tim ahli kami untuk solusi terbaik.
                    </p>
                    
                    <!-- Counters -->
                    <div class="grid grid-cols-3 gap-4 mb-10 cta-counters">
                        @foreach([
                            '50' => '++ Proyek Selesai',
                            '45' => '++ Klien Puas',
                            '5' => '++ Ahli'
                        ] as $count => $label)
                        <div class="counter-item">
                            <span class="text-4xl font-bold text-white counter" data-target="{{ $count }}">0</span>
                            <span class="text-lg text-blue-200 block">{{ $label }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Form Card -->
                <div class="lg:w-5/12 w-full cta-form">
                    <div class="bg-white p-8 rounded-2xl shadow-lg">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6">Mulai Proyek Anda</h3>
                        
                        <form id="cta-form">
                            <div class="mb-4">
                                <label class="text-gray-700 mb-2 block">Nama Anda</label>
                                <input type="text" placeholder="Masukkan nama lengkap" class="cta-form-input w-full p-3 border border-gray-300 rounded-lg focus:outline-none">
                            </div>
                            
                            <div class="mb-4">
                                <label class="text-gray-700 mb-2 block">Email</label>
                                <input type="email" placeholder="email@perusahaan.com" class="cta-form-input w-full p-3 border border-gray-300 rounded-lg focus:outline-none">
                            </div>
                            
                            <div class="mb-6">
                                <label class="text-gray-700 mb-2 block">Jenis Layanan</label>
                                <select class="cta-form-input w-full p-3 border border-gray-300 rounded-lg focus:outline-none">
                                    <option value="">Pilih layanan yang dibutuhkan</option>
                                    <option value="web">Web Development</option>
                                    <option value="app">Mobile Development</option>
                                    <option value="seo">SEO</option>
                                    <option value="design">UI/UX & Brand Design</option>
                                    <option value="sosmedads">Sosial Media ADS</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="cta-button w-full bg-blue-600 text-white font-medium py-3 rounded-lg hover:bg-blue-700 transform transition-all">
                                Konsultasi Gratis
                            </button>
                        </form>
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
        const setupRevealElements = function() {
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
        };
        setupRevealElements();
        
        // Testimonial slider
        const setupTestimonials = function() {
            const testimonials = [
                {
                    name: "Erika",
                    position: "CEO PT. Maju Jaya",
                    image: "/images/testi/1.jpg",
                    text: "Kerjasama dengan tim sangat menyenangkan! Website kami kini tampil modern dan trafik meningkat drastis.",
                    rating: 5
                },
                {
                    name: "Sari Anjani",
                    position: "Marketing Manager",
                    image: "/images/testi/2.jpg",
                    text: "Aplikasi mobile yang dikembangkan sangat user-friendly dan sesuai dengan kebutuhan bisnis kami.",
                    rating: 5
                },
                {
                    name: "Andi Rahman",
                    position: "Founder Startup",
                    image: "/images/testi/3.jpg",
                    text: "Layanan SEO yang luar biasa! Kami sekarang berada di halaman pertama Google untuk keyword utama.",
                    rating: 4
                },
                {
                    name: "Amran Hadi",
                    position: "Founder UMKM",
                    image: "/images/testi/4.jpg",
                    text: "Layanan SEO yang luar biasa! Kami sekarang berada di halaman pertama Google untuk keyword utama.",
                    rating: 2
                }
            ];
            
            const testimonialContainer = document.getElementById('testimonial-container');
            const pagination = document.getElementById('pagination');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            
            if (testimonialContainer && pagination && prevBtn && nextBtn) {
                let currentIndex = 0;
                let autoSlideInterval;
                
                // Generate testimonial cards
                testimonials.forEach((testimonial, index) => {
                    const testimonialCard = document.createElement('div');
                    testimonialCard.className = 'testimonial-card min-w-full px-4';
                    
                    let starsHTML = '';
                    for (let i = 0; i < 5; i++) {
                        starsHTML += `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ${i < testimonial.rating ? 'text-yellow-400' : 'text-gray-300'}" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>`;
                    }
                    
                    testimonialCard.innerHTML = `
                        <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                            <div class="flex items-center mb-6">
                                <img src="${testimonial.image}" alt="${testimonial.name}" class="w-16 h-16 rounded-full object-cover mr-4">
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-900">${testimonial.name}</h4>
                                    <p class="text-gray-600">${testimonial.position}</p>
                                </div>
                            </div>
                            <div class="flex mb-4">
                                ${starsHTML}
                            </div>
                            <blockquote class="text-gray-700 italic">
                                "${testimonial.text}"
                            </blockquote>
                        </div>
                    `;
                    
                    testimonialContainer.appendChild(testimonialCard);
                    
                    // Add pagination dot
                    const dot = document.createElement('button');
                    dot.className = `w-3 h-3 rounded-full ${index === 0 ? 'bg-blue-500' : 'bg-gray-300'}`;
                    dot.addEventListener('click', () => {
                        goToSlide(index);
                    });
                    pagination.appendChild(dot);
                });
                
                // Testimonial slider navigation
                function updateSlider() {
                    testimonialContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
                    
                    // Update pagination dots
                    const dots = pagination.querySelectorAll('button');
                    dots.forEach((dot, index) => {
                        if (index === currentIndex) {
                            dot.classList.remove('bg-gray-300');
                            dot.classList.add('bg-blue-500');
                        } else {
                            dot.classList.remove('bg-blue-500');
                            dot.classList.add('bg-gray-300');
                        }
                    });
                }
                
                function goToSlide(index) {
                    currentIndex = index;
                    updateSlider();
                    resetAutoSlide();
                }
                
                function resetAutoSlide() {
                    clearInterval(autoSlideInterval);
                    autoSlideInterval = setInterval(() => {
                        currentIndex = (currentIndex + 1) % testimonials.length;
                        updateSlider();
                    }, 5000);
                }
                
                prevBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
                    updateSlider();
                    resetAutoSlide();
                });
                
                nextBtn.addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % testimonials.length;
                    updateSlider();
                    resetAutoSlide();
                });
                
                // Start auto slide
                resetAutoSlide();
            }
        };
        setupTestimonials();
        
        // Counter animation
        const setupCounters = function() {
            const counters = document.querySelectorAll('.counter');
            
            counters.forEach(counter => {
                const target = counter.getAttribute('data-target') || counter.getAttribute('data-count');
                if (!target) return;
                
                const numTarget = +target;
                const increment = numTarget / 200;
                
                let currentCount = 0;
                const updateCount = () => {
                    if (currentCount < numTarget) {
                        currentCount += increment;
                        counter.innerText = Math.ceil(currentCount);
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = numTarget;
                    }
                };
                
                updateCount();
            });
        };
        
        // Initialize counters when they come into view
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setupCounters();
                    counterObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        
        document.querySelectorAll('.counter-section, .cta-section, .why-choose-us').forEach(section => {
            counterObserver.observe(section);
        });
        
        // Client logo slider
        const logoSlider = document.querySelector('.logo-slider');
        if (logoSlider) {
            const logos = document.querySelectorAll('.logo-slider > div');
            
            // Clone all logos and append them to create the illusion of infinite scrolling
            logos.forEach(logo => {
                const clone = logo.cloneNode(true);
                logoSlider.appendChild(clone);
            });
        }
    });
     document.addEventListener('DOMContentLoaded', function() {
        // Add these to your existing DOMContentLoaded function
        
        // Hero section animations
        setTimeout(() => {
            animateHeroSection();
            createParticles();
        }, 100);
        
        // CTA section animations
        const ctaSection = document.querySelector('.cta-section');
        if (ctaSection) {
            const ctaObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCTASection();
                        ctaObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.3 });
            
            ctaObserver.observe(ctaSection);
        }
    });

    // Hero Section Animation
    function animateHeroSection() {
        // Animate badge
        const heroBadge = document.querySelector('.hero-badge');
        if (heroBadge) {
            heroBadge.style.opacity = '0';
            heroBadge.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                heroBadge.style.transition = 'all 0.6s cubic-bezier(0.215, 0.61, 0.355, 1)';
                heroBadge.style.opacity = '1';
                heroBadge.style.transform = 'translateY(0)';
            }, 200);
        }
        
        // Animate title words with delay
        const titleWords = document.querySelectorAll('.hero-title-word');
        titleWords.forEach((word, index) => {
            setTimeout(() => {
                word.style.transition = 'all 0.7s cubic-bezier(0.215, 0.61, 0.355, 1)';
                word.style.opacity = '1';
                word.style.transform = 'translateY(0)';
            }, 300 + (index * 150));
        });
        
        // Animate description
        const heroDesc = document.querySelector('.hero-description');
        if (heroDesc) {
            setTimeout(() => {
                heroDesc.style.transition = 'all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1)';
                heroDesc.style.opacity = '1';
                heroDesc.style.transform = 'translateY(0)';
            }, 1000);
        }
        
        // Animate buttons
        const heroButtons = document.querySelector('.hero-buttons');
        if (heroButtons) {
            setTimeout(() => {
                heroButtons.style.transition = 'all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1)';
                heroButtons.style.opacity = '1';
            }, 1200);
        }
        
        // Animate images
        const heroImages = document.querySelectorAll('.hero-image');
        heroImages.forEach(img => {
            const delay = parseFloat(img.getAttribute('data-delay')) || 0;
            setTimeout(() => {
                img.querySelector('img').style.opacity = '1';
                img.querySelector('img').style.transform = 'scale(1)';
            }, 1200 + (delay * 1000));
        });
    }
    
    // CTA Section Animation
    function animateCTASection() {
        // Animate title
        const ctaTitle = document.querySelector('.cta-title');
        if (ctaTitle) {
            ctaTitle.style.transition = 'all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1)';
            ctaTitle.style.opacity = '1';
            ctaTitle.style.transform = 'translateY(0)';
        }
        
        // Animate description
        const ctaDesc = document.querySelector('.cta-description');
        if (ctaDesc) {
            setTimeout(() => {
                ctaDesc.style.transition = 'all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1)';
                ctaDesc.style.opacity = '1';
                ctaDesc.style.transform = 'translateY(0)';
            }, 200);
        }
        
        // Animate counters
        const ctaCounters = document.querySelector('.cta-counters');
        if (ctaCounters) {
            setTimeout(() => {
                ctaCounters.style.transition = 'all 0.8s cubic-bezier(0.215, 0.61, 0.355, 1)';
                ctaCounters.style.opacity = '1';
                
                // Start counter animation
                const counters = ctaCounters.querySelectorAll('.counter');
                counters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-target'), 10);
                    const increment = target / 60;
                    let currentCount = 0;
                    
                    const updateCount = () => {
                        if (currentCount < target) {
                            currentCount += increment;
                            counter.textContent = Math.ceil(currentCount);
                            setTimeout(updateCount, 30);
                        } else {
                            counter.textContent = target;
                        }
                    };
                    
                    updateCount();
                });
            }, 400);
        }
        
        // Animate form
        const ctaForm = document.querySelector('.cta-form');
        if (ctaForm) {
            setTimeout(() => {
                ctaForm.style.transition = 'all 0.9s cubic-bezier(0.215, 0.61, 0.355, 1)';
                ctaForm.style.opacity = '1';
                ctaForm.style.transform = 'translateX(0)';
            }, 600);
            
            // Add form input animation
            const formInputs = ctaForm.querySelectorAll('.cta-form-input');
            formInputs.forEach((input, index) => {
                input.style.transform = 'translateY(20px)';
                input.style.opacity = '0';
                
                setTimeout(() => {
                    input.style.transition = 'all 0.5s ease';
                    input.style.transform = 'translateY(0)';
                    input.style.opacity = '1';
                }, 800 + (index * 100));
            });
            
            // Add button animation
            const formButton = ctaForm.querySelector('.cta-button');
            if (formButton) {
                formButton.style.transform = 'translateY(20px)';
                formButton.style.opacity = '0';
                
                setTimeout(() => {
                    formButton.style.transition = 'all 0.5s ease';
                    formButton.style.transform = 'translateY(0)';
                    formButton.style.opacity = '1';
                }, 1200);
                
                // Add button hover effect
                formButton.addEventListener('mouseenter', () => {
                    formButton.style.transform = 'translateY(-5px)';
                });
                
                formButton.addEventListener('mouseleave', () => {
                    formButton.style.transform = 'translateY(0)';
                });
            }
        }
    }
    
    // Create floating particles for background effect
    function createParticles() {
        const containers = document.querySelectorAll('.particles-container');
        
        containers.forEach(container => {
            const numParticles = 30;
            
            for (let i = 0; i < numParticles; i++) {
                const size = Math.random() * 5 + 2;
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random position
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                
                // Random opacity and size
                const opacity = Math.random() * 0.5 + 0.1;
                
                // Set styles
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.left = posX + '%';
                particle.style.top = posY + '%';
                particle.style.opacity = opacity;
                
                // Add to container
                container.appendChild(particle);
                
                // Animate
                animateParticle(particle);
            }
        });
    }
    
    function animateParticle(particle) {
        const duration = Math.random() * 20 + 10;
        const offsetX = Math.random() * 40 - 20;
        const offsetY = Math.random() * 40 - 20;
        
        particle.style.transition = `transform ${duration}s linear, opacity 3s ease-in-out`;
        
        setTimeout(() => {
            particle.style.transform = `translate(${offsetX}px, ${offsetY}px)`;
        }, 100);
        
        // Reset animation periodically for continuous effect
        setTimeout(() => {
            particle.style.opacity = '0';
            
            setTimeout(() => {
                // Reset position
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                particle.style.transition = 'none';
                particle.style.transform = 'translate(0, 0)';
                particle.style.left = posX + '%';
                particle.style.top = posY + '%';
                
                setTimeout(() => {
                    particle.style.opacity = Math.random() * 0.5 + 0.1;
                    animateParticle(particle);
                }, 300);
            }, 3000);
        }, duration * 1000 - 3000);
    }
</script>
@endpush