@extends('layouts.app')

@section('title', 'Portfolio')

@push('styles')
<style>
    /* Core animations */
    .fade-in {opacity:0; transform:translateY(20px); transition:all 0.6s ease;}
    .fade-in.visible {opacity:1; transform:translateY(0);}
    
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
    
    /* Project Cards & Categories */
    .category-btn {
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    .category-btn.active {background-color:#4f46e5; color:white;}
    .project-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
    }
    .project-card.hidden {display:none;}
    .project-card:hover {transform:translateY(-8px); box-shadow:0 15px 30px rgba(0,0,0,0.1);}
    .card-overlay {
        position: absolute;
        inset: 0;
        background: rgba(79,70,229,0.9);
        opacity: 0;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .project-card:hover .card-overlay {opacity:1;}
    
    /* Modal */
    .project-modal {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.8);
        z-index: 50;
        display: none;
        overflow-y: auto;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .project-modal.open {opacity:1;}
    .modal-box {
        background: white;
        margin: 5vh auto;
        width: 90%;
        max-width: 900px;
        border-radius: 1rem;
        overflow: hidden;
        transform: scale(0.95);
        opacity: 0;
        transition: all 0.3s ease;
    }
    .project-modal.open .modal-box {transform:scale(1); opacity:1;}
    
    /* Particles */
    .particle {
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,0.3);
        pointer-events: none;
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
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <!-- Left Text Content -->
                <div class="w-full lg:w-3/5 text-white space-y-8 hero-content">
                    <h1 class="text-5xl md:text-7xl font-bold leading-tight">
                        <span class="hero-title-word block">PROJECT</span>
                        <span class="hero-title-word block">YANG TELAH</span>
                        <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">KAMI</span>
                        <span class="hero-title-word block text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-purple-400">SELESAIKAN</span>
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


<!-- Portfolio Section -->
<section class="py-16 bg-gray-50 projects-section">
    <div class="container mx-auto px-4">
        <!-- Filter -->
        <div class="flex justify-center mb-12 fade-in">
            <div class="inline-flex p-1 bg-white rounded-full shadow-md">
                @foreach(['Semua', 'Web', 'Mobile', 'SEO', 'Design'] as $filter)
                <button class="category-btn px-6 py-3 rounded-full font-medium {{ $loop->first ? 'active' : '' }}" 
                        data-filter="{{ strtolower($filter) }}">
                    {{ $filter }}
                </button>
                @endforeach
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 fade-in">
            @foreach([
                ['title' => 'Aplikasi E-Commerce', 'category' => 'mobile', 'image' => 'images/portfolio/mobile1.jpg'],
                ['title' => 'Website Perusahaan', 'category' => 'web', 'image' => 'images/portfolio/web1.jpg'],
                ['title' => 'Branding Produk', 'category' => 'design', 'image' => 'images/portfolio/design1.jpg'],
                ['title' => 'Optimasi SEO', 'category' => 'seo', 'image' => 'images/portfolio/seo1.jpg'],
                ['title' => 'Aplikasi Fintech', 'category' => 'mobile', 'image' => 'images/portfolio/mobile2.jpg'],
                ['title' => 'Portal Berita', 'category' => 'web', 'image' => 'images/portfolio/web2.jpg']
            ] as $project)
            <div class="project-card bg-white shadow-md relative" data-category="{{ $project['category'] }}">
                <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}" class="w-full h-60 object-cover">
                <div class="p-6">
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold 
                        {{ $project['category'] == 'mobile' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $project['category'] == 'web' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $project['category'] == 'design' ? 'bg-purple-100 text-purple-800' : '' }}
                        {{ $project['category'] == 'seo' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                        {{ ucfirst($project['category']) }}
                    </span>
                    <h3 class="text-xl font-bold mt-2">{{ $project['title'] }}</h3>
                </div>
                <div class="card-overlay">
                    <h3 class="text-white text-2xl font-bold mb-4">{{ $project['title'] }}</h3>
                    <button class="detail-btn px-6 py-3 bg-white text-indigo-600 rounded-full font-medium" 
                            data-project="{{ json_encode($project) }}">
                        Lihat Detail
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
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

<!-- Modal -->
<div id="project-modal" class="project-modal">
    <div class="modal-box">
        <button id="close-modal" class="absolute top-4 right-4 bg-gray-100 p-2 rounded-full hover:bg-gray-200 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="h-64 lg:h-full">
                <img id="modal-image" src="" alt="" class="w-full h-full object-cover">
            </div>
            <div class="p-8">
                <span id="modal-category" class="inline-block px-3 py-1 rounded-full text-xs font-semibold mb-4"></span>
                <h3 id="modal-title" class="text-3xl font-bold mb-4"></h3>
                <p class="text-gray-600 mb-6">
                    Proyek ini dikembangkan dengan fokus pada kebutuhan klien dan user experience yang optimal.
                </p>
                
                <div class="mb-6">
                    <h4 class="font-bold text-lg mb-2">Teknologi</h4>
                    <div id="modal-tech" class="flex flex-wrap gap-2"></div>
                </div>
                
                <a href="#" class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-all">
                    Lihat Proyek
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tech stack data
    const techStacks = {
        mobile: ['Flutter', 'Firebase', 'Swift', 'React Native'],
        web: ['Laravel', 'React', 'Tailwind CSS', 'Next.js'],
        design: ['Figma', 'Adobe XD', 'Photoshop', 'Illustrator'],
        seo: ['Analytics', 'SEMrush', 'Ahrefs', 'Search Console']
    };
    
    // ==================== HERO ANIMATIONS ====================
    function animateHero() {
        const titleWords = document.querySelectorAll('.hero-title-word');
        const heroDesc = document.querySelector('.hero-description');
        const heroButtons = document.querySelectorAll('.hero-buttons a');
        // const heroImages = document.querySelectorAll('.hero-images img');
        
        // Simple animation function that mimics GSAP
        function animateElement(el, delay = 0) {
            setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, delay);
        }
        
        // Apply initial styles
        titleWords.forEach(word => {
            word.style.opacity = '0';
            word.style.transform = 'translateY(50px)';
            word.style.transition = 'all 0.6s ease';
        });
        
        heroDesc.style.opacity = '0';
        heroDesc.style.transform = 'translateY(30px)';
        heroDesc.style.transition = 'all 0.6s ease';
        
        heroButtons.forEach(btn => {
            btn.style.opacity = '0';
            btn.style.transform = 'translateY(30px)';
            btn.style.transition = 'all 0.6s ease';
        });
        
        // heroImages.forEach(img => {
        //     img.style.opacity = '0';
        //     img.style.transform = 'translateY(60px)';
        //     img.style.transition = 'all 0.8s ease';
        // });
        
        // Animate elements with delays
        titleWords.forEach((word, i) => animateElement(word, 300 + i * 100));
        animateElement(heroDesc, 800);
        heroButtons.forEach((btn, i) => animateElement(btn, 1200 + i * 200));
        // heroImages.forEach((img, i) => animateElement(img, 500 + i * 300));
        
        // Add floating animation
        // heroImages.forEach((img, i) => {
        //     const direction = i % 2 === 0 ? -1 : 1;
        //     const amount = 10 + (i * 5);
            
        //     setInterval(() => {
        //         img.style.transform = `translateY(${direction * amount}px)`;
        //         setTimeout(() => {
        //             img.style.transform = 'translateY(0)';
        //         }, 1500);
        //     }, 3000);
        // });
        
        // // Create particles
        // createParticles();
    }
    
    // Create particle effect
    function createParticles() {
        const container = document.querySelector('.particles-container');
        if (!container) return;
        
        const particleCount = 20; // Reduced from 30
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            
            // Random size between 2px and 5px
            const size = Math.random() * 3 + 2;
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            
            // Random position
            particle.style.left = `${Math.random() * 100}%`;
            particle.style.top = `${Math.random() * 100}%`;
            particle.style.opacity = Math.random() * 0.3 + 0.1;
            
            container.appendChild(particle);
            
            // Simple particle animation
            setInterval(() => {
                const x = (Math.random() - 0.5) * 50;
                const y = (Math.random() - 0.5) * 50;
                particle.style.transform = `translate(${x}px, ${y}px)`;
                particle.style.transition = 'transform 15s ease-in-out';
            }, 15000);
        }
    }
    
    // Scroll animations
    function handleScrollAnimations() {
        const fadeElements = document.querySelectorAll('.fade-in');
        
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        fadeElements.forEach(el => observer.observe(el));
    }
    
    // Project filtering
    function initProjectFiltering() {
        const filterBtns = document.querySelectorAll('.category-btn');
        const projects = document.querySelectorAll('.project-card');
        
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Update active button
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                const filter = this.dataset.filter;
                
                // Filter projects
                projects.forEach(project => {
                    const category = project.dataset.category;
                    
                    if (filter === 'semua' || category === filter) {
                        project.classList.remove('hidden');
                        project.style.opacity = '1';
                        project.style.transform = 'translateY(0)';
                    } else {
                        project.classList.add('hidden');
                    }
                });
            });
        });
    }
    
    // Modal handling
    function initModal() {
        const modal = document.getElementById('project-modal');
        const closeBtn = document.getElementById('close-modal');
        const detailBtns = document.querySelectorAll('.detail-btn');
        
        // Open modal
        detailBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const project = JSON.parse(this.dataset.project);
                
                // Update modal content
                document.getElementById('modal-title').textContent = project.title;
                document.getElementById('modal-image').src = project.image;
                
                // Update category
                const categoryEl = document.getElementById('modal-category');
                categoryEl.textContent = project.category.toUpperCase();
                
                // Set category color
                const colorClasses = {
                    mobile: 'bg-blue-100 text-blue-800',
                    web: 'bg-green-100 text-green-800',
                    design: 'bg-purple-100 text-purple-800',
                    seo: 'bg-yellow-100 text-yellow-800'
                };
                categoryEl.className = `inline-block px-3 py-1 rounded-full text-xs font-semibold mb-4 ${colorClasses[project.category]}`;
                
                // Update tech stack
                const techEl = document.getElementById('modal-tech');
                techEl.innerHTML = '';
                techStacks[project.category].forEach(tech => {
                    const badge = document.createElement('span');
                    badge.className = 'px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm';
                    badge.textContent = tech;
                    techEl.appendChild(badge);
                });
                
                // Show modal with animation
                modal.style.display = 'block';
                setTimeout(() => {
                    modal.classList.add('open');
                }, 10);
            });
        });
        
        // Close modal
        function closeModal() {
            modal.classList.remove('open');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
        }
        
        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', function(e) {
            if (e.target === this) closeModal();
        });
    }
    
    // Initialize all functions
    animateHero();
    handleScrollAnimations();
    initProjectFiltering();
    initModal();
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