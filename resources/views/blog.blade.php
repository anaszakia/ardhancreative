@extends('layouts.app')

@section('title', 'Blog')

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
    
    /* Blog Specific Styles */
    .blog-hero {
        background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
    }
    
    .blog-card {
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }
    
    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .category-badge {
        font-size: 0.75rem;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        display: inline-block;
    }
    
    .technology { background-color: #DBEAFE; color: #1E40AF; }
    .design { background-color: #FCE7F3; color: #831843; }
    .marketing { background-color: #D1FAE5; color: #065F46; }
    .business { background-color: #EFF6FF; color: #1E40AF; }
    
    .blog-image {
        transition: all 0.5s ease;
    }
    
    .blog-card:hover .blog-image {
        transform: scale(1.05);
    }
    
    .author-avatar {
        transition: all 0.3s ease;
    }
    
    .blog-card:hover .author-avatar {
        transform: scale(1.1);
    }
    
    .pagination .page-item {
        margin: 0 0.25rem;
    }
    
    .pagination .page-link {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        border: 1px solid #E5E7EB;
        color: #4B5563;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .pagination .page-link:hover {
        background-color: #EFF6FF;
        color: #1E40AF;
    }
    
    .pagination .active .page-link {
        background-color: #3B82F6;
        color: white;
        border-color: #3B82F6;
    }
    
    /* Newsletter Section */
    .newsletter-form {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }
    
    .newsletter-input {
        transition: all 0.3s ease;
    }
    
    .newsletter-input:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }
    
    /* Sidebar */
    .sidebar-widget {
        transition: all 0.3s ease;
    }
    
    .sidebar-widget:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    
    .tag-item {
        transition: all 0.3s ease;
    }
    
    .tag-item:hover {
        background-color: #3B82F6;
        color: white;
    }
    
    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .sidebar {
            margin-top: 4rem;
        }
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="blog-hero min-h-[50vh] flex items-center relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="container mx-auto px-4 relative z-10 py-20">
            <div class="text-center text-white reveal-element">
                <h1 class="text-5xl font-bold mb-6">Blog Ardhan Creative</h1>
                <p class="text-xl max-w-2xl mx-auto">Temukan artikel terbaru seputar teknologi, desain, dan strategi digital untuk bisnis Anda</p>
            </div>
        </div>
    </section>

    <!-- Blog Content -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Main Content -->
                <div class="lg:w-2/3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach([
                            [
                                'title' => 'Trend UI/UX Design 2024 yang Harus Anda Ketahui',
                                'excerpt' => 'Pelajari trend desain terbaru yang akan mendominasi tahun 2024 dan bagaimana menerapkannya dalam produk digital Anda.',
                                'category' => 'design',
                                'date' => '15 Januari 2024',
                                'read_time' => '5 min read',
                                'author' => 'Sarah Wijaya',
                                'author_image' => 'images/team/team2.jpg',
                                'image' => 'images/blog/design.jpg'
                            ],
                            [
                                'title' => 'Optimasi SEO untuk Website E-commerce',
                                'excerpt' => 'Strategi praktis meningkatkan visibilitas toko online Anda di mesin pencari dan mendongkrak penjualan.',
                                'category' => 'marketing',
                                'date' => '10 Januari 2024',
                                'read_time' => '8 min read',
                                'author' => 'Budi Santoso',
                                'author_image' => 'images/team/team3.jpg',
                                'image' => 'images/blog/seo.jpg'
                            ],
                            [
                                'title' => 'Mengenal Teknologi Web Terbaru: WebAssembly',
                                'excerpt' => 'Bagaimana WebAssembly dapat merevolusi pengembangan web dan meningkatkan performa aplikasi secara signifikan.',
                                'category' => 'technology',
                                'date' => '5 Januari 2024',
                                'read_time' => '10 min read',
                                'author' => 'Ahmad Fauzi',
                                'author_image' => 'images/team/team1.jpg',
                                'image' => 'images/blog/tech.jpg'
                            ],
                            [
                                'title' => 'Strategi Konten untuk Meningkatkan Engagement',
                                'excerpt' => 'Teknik pembuatan konten yang menarik perhatian audiens dan meningkatkan interaksi di media sosial.',
                                'category' => 'marketing',
                                'date' => '28 Desember 2023',
                                'read_time' => '6 min read',
                                'author' => 'Dewi Lestari',
                                'author_image' => 'images/team/team4.jpg',
                                'image' => 'images/blog/content.jpg'
                            ],
                            [
                                'title' => 'Panduan Lengkap Memilih Framework JavaScript',
                                'excerpt' => 'Perbandingan mendalam antara React, Vue, dan Angular untuk membantu Anda memilih framework terbaik.',
                                'category' => 'technology',
                                'date' => '20 Desember 2023',
                                'read_time' => '12 min read',
                                'author' => 'Ahmad Fauzi',
                                'author_image' => 'images/team/team1.jpg',
                                'image' => 'images/blog/framework.jpg'
                            ],
                            [
                                'title' => 'Transformasi Digital untuk UMKM',
                                'excerpt' => 'Langkah-langkah praktis yang dapat dilakukan UMKM untuk memulai transformasi digital bisnis mereka.',
                                'category' => 'business',
                                'date' => '15 Desember 2023',
                                'read_time' => '7 min read',
                                'author' => 'Dewi Lestari',
                                'author_image' => 'images/team/team4.jpg',
                                'image' => 'images/blog/umkm.jpg'
                            ]
                        ] as $post)
                        <div class="blog-card bg-white rounded-xl overflow-hidden reveal-element">
                            <div class="relative overflow-hidden h-48">
                                <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" class="blog-image w-full h-full object-cover">
                                <div class="absolute top-4 right-4">
                                    <span class="category-badge {{ $post['category'] }}">{{ ucfirst($post['category']) }}</span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <span>{{ $post['date'] }}</span>
                                    <span class="mx-2">•</span>
                                    <span>{{ $post['read_time'] }}</span>
                                </div>
                                <h3 class="text-xl font-bold mb-3 text-gray-900">{{ $post['title'] }}</h3>
                                <p class="text-gray-600 mb-4">{{ $post['excerpt'] }}</p>
                                <div class="flex items-center">
                                    <img src="{{ asset($post['author_image']) }}" alt="{{ $post['author'] }}" class="author-avatar w-10 h-10 rounded-full object-cover mr-3">
                                    <span class="text-sm font-medium text-gray-700">{{ $post['author'] }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-12 reveal-element">
                        <nav class="flex justify-center">
                            <ul class="pagination flex">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="lg:w-1/3 sidebar">
                    <!-- About Widget -->
                    <div class="sidebar-widget bg-white p-6 rounded-xl shadow-sm mb-8 reveal-element">
                        <h3 class="text-xl font-bold mb-4 text-gray-900">Tentang Blog Ini</h3>
                        <p class="text-gray-600 mb-4">Blog Ardhan Creative berisi artikel terbaru seputar pengembangan web, desain UI/UX, strategi digital marketing, dan perkembangan teknologi terkini.</p>
                        <div class="flex space-x-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-blue-600 hover:text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Popular Posts -->
                    <div class="sidebar-widget bg-white p-6 rounded-xl shadow-sm mb-8 reveal-element">
                        <h3 class="text-xl font-bold mb-4 text-gray-900">Artikel Populer</h3>
                        <div class="space-y-4">
                            @foreach([
                                [
                                    'title' => '10 Tools Desain Terbaik untuk 2024',
                                    'date' => '5 Jan 2024',
                                    'image' => 'images/blog/tools.jpg'
                                ],
                                [
                                    'title' => 'Cara Meningkatkan Conversion Rate',
                                    'date' => '20 Des 2023',
                                    'image' => 'images/blog/conversion.jpg'
                                ],
                                [
                                    'title' => 'Panduan Lengkap SEO untuk Pemula',
                                    'date' => '15 Des 2023',
                                    'image' => 'images/blog/seo-guide.jpg'
                                ]
                            ] as $post)
                            <div class="flex items-start">
                                <img src="{{ asset($post['image']) }}" alt="{{ $post['title'] }}" class="w-16 h-16 rounded-lg object-cover mr-3">
                                <div>
                                    <h4 class="font-medium text-gray-900 mb-1">{{ $post['title'] }}</h4>
                                    <p class="text-sm text-gray-500">{{ $post['date'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Categories -->
                    <div class="sidebar-widget bg-white p-6 rounded-xl shadow-sm mb-8 reveal-element">
                        <h3 class="text-xl font-bold mb-4 text-gray-900">Kategori</h3>
                        <div class="space-y-2">
                            @foreach([
                                ['name' => 'Technology', 'count' => 12, 'category' => 'technology'],
                                ['name' => 'UI/UX Design', 'count' => 8, 'category' => 'design'],
                                ['name' => 'Digital Marketing', 'count' => 15, 'category' => 'marketing'],
                                ['name' => 'Business Strategy', 'count' => 5, 'category' => 'business']
                            ] as $category)
                            <a href="#" class="flex justify-between items-center py-2 px-3 rounded-lg hover:bg-gray-50 transition-colors">
                                <span class="text-gray-700">{{ $category['name'] }}</span>
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">{{ $category['count'] }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Tags -->
                    <div class="sidebar-widget bg-white p-6 rounded-xl shadow-sm mb-8 reveal-element">
                        <h3 class="text-xl font-bold mb-4 text-gray-900">Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach(['React', 'Vue', 'SEO', 'Figma', 'Laravel', 'Node.js', 'Branding', 'Content', 'Social Media', 'Analytics'] as $tag)
                            <a href="#" class="tag-item text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full hover:bg-blue-600 hover:text-white transition-colors">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Newsletter -->
                    <div class="sidebar-widget bg-gradient-to-br from-blue-600 to-indigo-800 p-6 rounded-xl shadow-sm text-white reveal-element">
                        <h3 class="text-xl font-bold mb-3">Newsletter</h3>
                        <p class="text-blue-100 mb-4">Dapatkan update artikel terbaru langsung ke email Anda</p>
                        <form class="newsletter-form">
                            <input type="email" placeholder="Alamat email Anda" class="newsletter-input w-full p-3 rounded-lg mb-3 text-gray-900">
                            <button type="submit" class="w-full bg-white text-blue-800 font-medium py-3 rounded-lg hover:bg-gray-100 transition-colors">Berlangganan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-gradient-to-br from-blue-600 to-indigo-900 relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center reveal-element">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white leading-tight">
                    Siap Transformasi Digital Bisnis Anda?
                </h2>
                <p class="text-xl text-blue-100 mb-8">
                    Konsultasikan kebutuhan digital bisnis Anda dengan tim ahli kami untuk solusi terbaik.
                </p>
                <a href="#" class="inline-block px-8 py-4 rounded-full bg-white text-blue-800 font-medium shadow-lg hover:shadow-blue-500/30 hover:scale-105 transition-all">
                    Hubungi Kami Sekarang
                </a>
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
        
        // Newsletter form submission
        const newsletterForm = document.querySelector('.newsletter-form');
        
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const emailInput = newsletterForm.querySelector('input[type="email"]');
                
                if (emailInput.value) {
                    alert('Terima kasih telah berlangganan newsletter kami!');
                    emailInput.value = '';
                }
            });
        }
    });
</script>
@endpush