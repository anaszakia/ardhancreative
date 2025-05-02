@extends('layouts.app')

@section('title', 'Karir')

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
    
    /* Career Specific Styles */
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
    
    .benefit-card {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .benefit-card:hover {
        transform: translateY(-5px);
    }
    
    .benefit-card::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: #3b82f6;
        transform: scaleX(0);
        transform-origin: left;
        transition: transform 0.4s ease;
    }
    
    .benefit-card:hover::before {
        transform: scaleX(1);
    }
    
    .job-card {
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
    }
    
    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        border-left-color: #3b82f6;
    }
    
    .job-type {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
        border-radius: 9999px;
    }
    
    .full-time {
        background-color: #dbeafe;
        color: #1e40af;
    }
    
    .part-time {
        background-color: #f0fdf4;
        color: #166534;
    }
    
    .internship {
        background-color: #fef2f2;
        color: #991b1b;
    }
    
    .application-form {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .form-input {
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
    }
    
    .form-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }
    
    .file-upload {
        border: 2px dashed #e5e7eb;
        transition: all 0.3s ease;
    }
    
    .file-upload:hover {
        border-color: #3b82f6;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .job-card {
            flex-direction: column;
        }
        
        .job-info {
            border-right: none;
            border-bottom: 1px solid #e5e7eb;
            padding-right: 0;
            padding-bottom: 1rem;
            margin-bottom: 1rem;
        }
    }
    /* Optional Animation Keyframes */
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    
    /* Add this class to elements you want to animate */
    .float-animation {
        animation: float 6s ease-in-out infinite;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="particles-container absolute inset-0 z-0"></div>
        <div class="container mx-auto px-4 relative z-10 flex items-center min-h-screen">
            <div class="w-full max-w-5xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center">
                    <!-- Left Text Content -->
                    <div class="w-full lg:w-3/5 text-white space-y-8 hero-content">
                        <h1 class="text-5xl md:text-7xl font-bold leading-tight">
                            <span class="hero-title-word block">ARDHAN CREATIVE</span>
                            <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">CAREER</span>
                        </h1>
                        <p class="text-xl md:text-2xl text-blue-100 opacity-90 max-w-2xl hero-description">
                            Kepercayaan pelanggan sebelumnya adalah hasil dari kepercayaan pelanggan terhadap kami.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Join Us Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Kenapa Bergabung Dengan Kami?</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Kami menawarkan lingkungan kerja yang dinamis dan kesempatan pengembangan karir yang luas</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="benefit-card bg-white p-8 rounded-xl shadow-sm border border-gray-100 reveal-element">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Lingkungan Kerja Profesional</h3>
                    <p class="text-gray-600">Bekerja dengan tim yang kompeten dan berpengalaman di industri teknologi</p>
                </div>
                
                <div class="benefit-card bg-white p-8 rounded-xl shadow-sm border border-gray-100 reveal-element">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Pengembangan Karir</h3>
                    <p class="text-gray-600">Program pelatihan dan sertifikasi untuk meningkatkan kompetensi Anda</p>
                </div>
                
                <div class="benefit-card bg-white p-8 rounded-xl shadow-sm border border-gray-100 reveal-element">
                    <div class="text-blue-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Tim Yang Solid</h3>
                    <p class="text-gray-600">Budaya kerja kolaboratif dan hubungan antar tim yang baik</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Job Openings Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 reveal-element">
                <h2 class="text-4xl font-bold mb-4 text-gray-900">Lowongan Posisi</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-2xl mx-auto">Temukan posisi yang sesuai dengan keahlian dan minat Anda</p>
            </div>

            <div class="max-w-4xl mx-auto space-y-6">
                @foreach([
                    [
                        'title' => 'Frontend Developer',
                        'type' => 'full-time',
                        'location' => 'Jakarta',
                        'salary' => 'Rp 8 - 12 Juta',
                        'description' => 'Kami mencari Frontend Developer berpengalaman dengan keahlian dalam React.js atau Vue.js untuk bergabung dengan tim pengembangan produk kami.'
                    ],
                    [
                        'title' => 'UI/UX Designer',
                        'type' => 'full-time',
                        'location' => 'Bandung',
                        'salary' => 'Rp 7 - 10 Juta',
                        'description' => 'Bergabunglah sebagai UI/UX Designer dan bantu kami menciptakan pengalaman pengguna yang luar biasa untuk produk digital kami.'
                    ],
                    [
                        'title' => 'Digital Marketing Specialist',
                        'type' => 'full-time',
                        'location' => 'Remote',
                        'salary' => 'Rp 6 - 9 Juta',
                        'description' => 'Kami mencari profesional pemasaran digital yang kreatif untuk memimpin kampanye pemasaran online kami.'
                    ],
                    [
                        'title' => 'Backend Developer Intern',
                        'type' => 'internship',
                        'location' => 'Jakarta',
                        'salary' => 'Rp 3 - 4 Juta',
                        'description' => 'Peluang magang bagi mahasiswa/mahasiswi yang ingin belajar pengembangan backend dengan Node.js dan MongoDB.'
                    ]
                ] as $job)
                <div class="job-card bg-white rounded-lg overflow-hidden shadow-sm reveal-element">
                    <div class="p-6 flex flex-col md:flex-row md:items-center">
                        <div class="job-info md:border-r md:border-gray-200 md:pr-6 md:w-1/2">
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-xl font-bold text-gray-900">{{ $job['title'] }}</h3>
                                <span class="job-type {{ str_replace('-', ' ', $job['type']) }}">{{ ucfirst($job['type']) }}</span>
                            </div>
                            <div class="flex items-center text-gray-600 space-x-4">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>{{ $job['location'] }}</span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $job['salary'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="md:pl-6 md:w-1/2 mt-4 md:mt-0">
                            <p class="text-gray-600 mb-4">{{ $job['description'] }}</p>
                            <button class="apply-btn px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                                    data-job="{{ $job['title'] }}">
                                Lamar Sekarang
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white" id="application-form">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Form Header -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Bergabung Dengan Tim Kami</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto mb-6 rounded-full"></div>
                    <p class="text-gray-600">Satu langkah lagi menuju karir impian Anda</p>
                </div>
                
                <!-- Application Card -->
                <div class="application-form bg-white rounded-2xl overflow-hidden shadow-xl">
                    <!-- Form Header -->
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8 text-white relative overflow-hidden">
                        <!-- Background Pattern -->
                        <div class="absolute top-0 left-0 w-full h-full opacity-10">
                            <svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
                                <defs>
                                    <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                        <circle cx="5" cy="5" r="1" fill="white" />
                                    </pattern>
                                </defs>
                                <rect width="100%" height="100%" fill="url(#grid)" />
                            </svg>
                        </div>
                        
                        <div class="relative z-10">
                            <h2 class="text-2xl md:text-3xl font-bold mb-2">Formulir Lamaran Pekerjaan</h2>
                            <p id="selected-job-text" class="opacity-90 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>Pilih posisi terlebih dahulu</span>
                            </p>
                        </div>
                    </div>
                    
                    <!-- Step Indicator -->
                    <div class="px-8 py-4 bg-gray-50 border-b border-gray-100">
                        <div class="flex items-center justify-between max-w-md mx-auto">
                            <div class="text-center">
                                <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center mx-auto">
                                    1
                                </div>
                                <p class="text-xs mt-1 text-blue-600 font-medium">Data Diri</p>
                            </div>
                            <div class="flex-1 h-1 bg-gray-200 mx-2">
                                <div class="w-0 h-full bg-blue-600"></div>
                            </div>
                            <div class="text-center">
                                <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center mx-auto">
                                    2
                                </div>
                                <p class="text-xs mt-1 text-gray-500">Pengalaman</p>
                            </div>
                            <div class="flex-1 h-1 bg-gray-200 mx-2"></div>
                            <div class="text-center">
                                <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center mx-auto">
                                    3
                                </div>
                                <p class="text-xs mt-1 text-gray-500">Dokumen</p>
                            </div>
                        </div>
                    </div>
                    
                    <form id="career-form" class="p-8">
                        <input type="hidden" id="selected-job" name="position">
                        
                        <!-- Personal Information Section -->
                        <div class="mb-10">
                            <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                                <span class="inline-block w-8 h-8 rounded-full bg-blue-100 text-blue-600 mr-3 flex items-center justify-center text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                Informasi Pribadi
                            </h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="fullname" class="block text-gray-700 text-sm font-medium mb-2">Nama Lengkap</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <input type="text" id="fullname" name="fullname" class="form-input w-full pl-10 p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="Masukkan nama lengkap" required>
                                    </div>
                                </div>
                                <div>
                                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-input w-full pl-10 p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="email@contoh.com" required>
                                    </div>
                                </div>
                                <div>
                                    <label for="phone" class="block text-gray-700 text-sm font-medium mb-2">Nomor Telepon</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <input type="tel" id="phone" name="phone" class="form-input w-full pl-10 p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="+62 800 1234 5678" required>
                                    </div>
                                </div>
                                <div>
                                    <label for="location" class="block text-gray-700 text-sm font-medium mb-2">Domisili</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <input type="text" id="location" name="location" class="form-input w-full pl-10 p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="Kota, Provinsi" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Experience Section -->
                        <div class="mb-10">
                            <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                                <span class="inline-block w-8 h-8 rounded-full bg-blue-100 text-blue-600 mr-3 flex items-center justify-center text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </span>
                                Pengalaman & Profil
                            </h3>
                            
                            <div class="mb-6">
                                <label for="experience" class="block text-gray-700 text-sm font-medium mb-2">Pengalaman Kerja</label>
                                <div class="relative">
                                    <div class="flex items-center">
                                        <input type="range" min="0" max="20" step="1" value="0" id="experience-range" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-blue-600">
                                        <span id="experience-value" class="ml-4 px-3 py-1 bg-blue-600 text-white rounded-lg min-w-[60px] text-center">0 tahun</span>
                                    </div>
                                    <input type="hidden" id="experience" name="experience" value="0">
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label for="portfolio" class="block text-gray-700 text-sm font-medium mb-2">Portfolio/LinkedIn Profile (URL)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                        </svg>
                                    </div>
                                    <input type="url" id="portfolio" name="portfolio" class="form-input w-full pl-10 p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="https://www.linkedin.com/in/username">
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label for="cover-letter" class="block text-gray-700 text-sm font-medium mb-2">Surat Lamaran</label>
                                <div class="relative">
                                    <textarea id="cover-letter" name="cover-letter" rows="4" class="form-input w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" placeholder="Ceritakan tentang diri Anda dan mengapa Anda tertarik dengan posisi ini..." required></textarea>
                                    <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                                        <span id="letter-count">0</span>/500
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Document Upload Section -->
                        <div class="mb-10">
                            <h3 class="text-xl font-semibold text-gray-800 mb-6 flex items-center">
                                <span class="inline-block w-8 h-8 rounded-full bg-blue-100 text-blue-600 mr-3 flex items-center justify-center text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                Upload Dokumen
                            </h3>
                            
                            <div class="mb-8">
                                <label class="block text-gray-700 text-sm font-medium mb-2">Upload CV/Resume (PDF, max 5MB)</label>
                                <div class="file-upload p-8 rounded-lg text-center cursor-pointer border-2 border-dashed border-gray-300 hover:border-blue-500 bg-gray-50 hover:bg-blue-50 transition-colors group">
                                    <input type="file" id="resume" name="resume" class="hidden" accept=".pdf" required>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 group-hover:text-blue-500 mb-4 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="text-gray-600 group-hover:text-gray-800 transition-colors">Drag & drop file CV Anda di sini atau <span class="text-blue-600 font-medium">browse</span></p>
                                    <p class="text-sm text-gray-400 mt-2">Format PDF (max. 5MB)</p>
                                    
                                    <!-- File preview (initially hidden) -->
                                    <div id="file-preview" class="hidden mt-4 bg-white p-3 rounded-lg border border-gray-200 flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <span id="file-name" class="text-sm text-gray-700">document.pdf</span>
                                        </div>
                                        <button type="button" id="remove-file" class="text-gray-400 hover:text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Agreement Section -->
                        <div class="mb-8">
                            <div class="p-4 rounded-lg bg-blue-50 border border-blue-100 flex items-start">
                                <div class="flex-shrink-0 mt-0.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <label class="flex items-center">
                                        <input type="checkbox" id="agree" name="agree" class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500" required>
                                        <span class="ml-2 text-gray-700 text-sm">Saya menyetujui pengolahan data pribadi sesuai <a href="#" class="text-blue-600 hover:underline">kebijakan privasi</a></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-medium py-3.5 px-4 rounded-lg hover:from-blue-700 hover:to-indigo-800 focus:ring-4 focus:ring-blue-300 focus:outline-none transition-all flex items-center justify-center">
                            <span>Kirim Lamaran</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-24 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-80 h-80 bg-white rounded-full blur-3xl transform translate-x-1/4 translate-y-1/4"></div>
        </div>
        
        <!-- Animated Dots Background -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-10 left-10 w-4 h-4 bg-white rounded-full opacity-20"></div>
            <div class="absolute top-20 right-40 w-2 h-2 bg-white rounded-full opacity-30"></div>
            <div class="absolute bottom-40 left-1/4 w-3 h-3 bg-white rounded-full opacity-25"></div>
            <div class="absolute bottom-10 right-1/3 w-5 h-5 bg-white rounded-full opacity-20"></div>
            <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-white rounded-full opacity-30"></div>
        </div>
        
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white/10 backdrop-blur-lg rounded-3xl p-8 md:p-12 shadow-xl border border-white/20">
                    <div class="text-center">
                        <h2 class="text-3xl md:text-5xl font-bold mb-6 text-white leading-tight">
                            Pertanyaan Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 to-blue-100">Rekrutmen?</span>
                        </h2>
                        <p class="text-lg md:text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
                            Tim HR kami siap membantu menjawab pertanyaan Anda tentang proses rekrutmen dan kesempatan karir.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="#" class="inline-flex items-center justify-center px-8 py-4 rounded-full bg-white text-indigo-700 font-medium shadow-lg hover:shadow-indigo-500/30 hover:scale-105 transition-all duration-300 group">
                                <span>Hubungi HR Kami</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                            <a href="#" class="inline-flex items-center justify-center px-8 py-4 rounded-full bg-transparent text-white border border-white/40 font-medium hover:bg-white/10 hover:scale-105 transition-all duration-300">
                                Lihat Lowongan
                            </a>
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
        
        // Job application handling
        const applyButtons = document.querySelectorAll('.apply-btn');
        const selectedJobText = document.getElementById('selected-job-text');
        const selectedJobInput = document.getElementById('selected-job');
        const formSection = document.getElementById('application-form');
        
        applyButtons.forEach(button => {
            button.addEventListener('click', () => {
                const jobTitle = button.dataset.job;
                selectedJobText.textContent = `Melamar untuk posisi: ${jobTitle}`;
                selectedJobInput.value = jobTitle;
                
                // Scroll to form section
                formSection.scrollIntoView({ behavior: 'smooth' });
            });
        });
        
        // File upload styling
        const fileUpload = document.querySelector('.file-upload');
        const fileInput = document.getElementById('resume');
        
        fileUpload.addEventListener('click', () => {
            fileInput.click();
        });
        
        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                fileUpload.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-green-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-gray-700 font-medium">${fileInput.files[0].name}</p>
                    <p class="text-sm text-gray-500 mt-1">${(fileInput.files[0].size / 1024 / 1024).toFixed(2)} MB</p>
                `;
            }
        });
        
        // Drag and drop for file upload
        fileUpload.addEventListener('dragover', (e) => {
            e.preventDefault();
            fileUpload.classList.add('border-blue-500', 'bg-blue-50');
        });
        
        fileUpload.addEventListener('dragleave', () => {
            fileUpload.classList.remove('border-blue-500', 'bg-blue-50');
        });
        
        fileUpload.addEventListener('drop', (e) => {
            e.preventDefault();
            fileUpload.classList.remove('border-blue-500', 'bg-blue-50');
            
            if (e.dataTransfer.files.length > 0) {
                fileInput.files = e.dataTransfer.files;
                const event = new Event('change');
                fileInput.dispatchEvent(event);
            }
        });
        
        // Form submission
        const careerForm = document.getElementById('career-form');
        
        careerForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Validate form
            if (!selectedJobInput.value) {
                alert('Silakan pilih posisi terlebih dahulu');
                return;
            }
            
            // Here you would typically send the form data to your server
            // For demo purposes, we'll just show an alert
            alert(`Lamaran untuk posisi ${selectedJobInput.value} berhasil dikirim!`);
            careerForm.reset();
            fileUpload.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <p class="text-gray-500">Drag & drop file atau <span class="text-blue-600">browse</span></p>
                <p class="text-sm text-gray-400 mt-1">Format PDF (max. 5MB)</p>
            `;
            selectedJobText.textContent = 'Pilih posisi terlebih dahulu';
            selectedJobInput.value = '';
        });
    });
    // Experience range slider
const experienceRange = document.getElementById('experience-range');
const experienceValue = document.getElementById('experience-value');
const experienceInput = document.getElementById('experience');

experienceRange.addEventListener('input', function() {
    const value = this.value;
    experienceValue.textContent = value + ' tahun';
    experienceInput.value = value;
});

// Character counter for cover letter
const coverLetter = document.getElementById('cover-letter');
const letterCount = document.getElementById('letter-count');

coverLetter.addEventListener('input', function() {
    const count = this.value.length;
    letterCount.textContent = count;
    
    if (count > 500) {
        letterCount.classList.add('text-red-500');
    } else {
        letterCount.classList.remove('text-red-500');
    }
});

// File upload preview
const fileInput = document.getElementById('resume');
const filePreview = document.getElementById('file-preview');
const fileName = document.getElementById('file-name');
const removeFile = document.getElementById('remove-file');
const fileUpload = document.querySelector('.file-upload');

fileInput.addEventListener('change', function() {
    if (this.files && this.files[0]) {
        fileName.textContent = this.files[0].name;
        filePreview.classList.remove('hidden');
        fileUpload.classList.add('border-blue-500', 'bg-blue-50');
    }
});

removeFile.addEventListener('click', function() {
    fileInput.value = '';
    filePreview.classList.add('hidden');
    fileUpload.classList.remove('border-blue-500', 'bg-blue-50');
});

// Make the file upload area also respond to drag and drop
fileUpload.addEventListener('dragover', function(e) {
    e.preventDefault();
    this.classList.add('border-blue-500', 'bg-blue-50');
});

fileUpload.addEventListener('dragleave', function(e) {
    e.preventDefault();
    if (!fileInput.files || !fileInput.files[0]) {
        this.classList.remove('border-blue-500', 'bg-blue-50');
    }
});

fileUpload.addEventListener('drop', function(e) {
    e.preventDefault();
    
    if (e.dataTransfer.files && e.dataTransfer.files[0]) {
        fileInput.files = e.dataTransfer.files;
        fileName.textContent = e.dataTransfer.files[0].name;
        filePreview.classList.remove('hidden');
    }
});

fileUpload.addEventListener('click', function() {
    fileInput.click();
});
</script>
@endpush