<header class="bg-blue-900 py-5 sticky top-0 z-50 transition-colors duration-300 w-full" id="main-header">
    <div class="container mx-auto px-8 flex justify-between items-center">
        <!-- Text Logo -->
        <a href="#" class="logo flex items-center">
            <span class="text-white font-bold text-2xl transition-colors duration-300">Ardhan</span>
            <span class="bg-gradient-to-r from-blue-400 to-purple-500 text-transparent bg-clip-text font-bold text-2xl ml-1 transition-colors duration-300">Creative</span>
        </a>

        <!-- Navigation Menu -->
        <nav class="hidden md:flex items-center space-x-10">
            <a href="{{ route('beranda') }}" class="text-white hover:text-blue-400 transition-all duration-300 font-bold relative nav-link">
                Beranda
            </a>
            <div class="relative group">
                <a href="#" class="text-white hover:text-blue-400 flex items-center transition-all duration-300 font-bold relative nav-link">
                    Layanan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
                <div class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-gray-800 ring-1 ring-black ring-opacity-5 hidden group-hover:block transform transition-all duration-300 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-700 transition-all duration-200">Website Development</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-700 transition-all duration-200">Mobile App Development</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-700 transition-all duration-200">UI/UX & Brand Design</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-700 transition-all duration-200">SEO</a>
                        <a href="#" class="block px-4 py-2 text-sm text-white hover:bg-gray-700 transition-all duration-200">Sosial Media ADS</a>
                    </div>
                </div>
            </div>
            <a href="{{ route('portfolio') }}" class="text-white hover:text-blue-400 transition-all duration-300 font-bold relative nav-link">
                Portfolio
            </a>
            <a href="{{ route('tentang-kami') }}" class="text-white hover:text-blue-400 transition-all duration-300 font-bold relative nav-link">
                Tentang Kami
            </a>
            <a href="{{ route('karir') }}" class="text-white hover:text-blue-400 transition-all duration-300 font-bold relative nav-link">
                Karir
            </a>
            <a href="{{ route('blog') }}" class="text-white hover:text-blue-400 transition-all duration-300 font-bold relative nav-link">
                Blog
            </a>
            <a href="#" class="search-toggle text-white hover:text-blue-400 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </a>
        </nav>

        <!-- Mobile menu button -->
        <div class="md:hidden flex items-center">
            <button type="button" class="mobile-menu-button text-white transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Consultation Button -->
        <div class="hidden md:block">
            <a href="#" class="bg-blue-400 hover:bg-blue-500 text-white font-medium py-2 px-8 rounded-full transition duration-300">
                Konsultasi Sekarang
            </a>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu hidden md:hidden bg-gray-900 mt-2">
        <div class="container mx-auto px-4 py-2">
            <a href="{{ route('beranda') }}" class="block py-2 text-white hover:text-blue-400 font-bold">Beranda</a>
            <div class="mobile-dropdown">
                <div class="flex justify-between items-center py-2 text-white hover:text-blue-400 font-bold">
                    <span>Layanan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
                <div class="mobile-dropdown-content hidden pl-4">
                    <a href="#" class="block py-2 text-white hover:text-blue-400">Website Development</a>
                    <a href="#" class="block py-2 text-white hover:text-blue-400">Mobile App Development</a>
                    <a href="#" class="block py-2 text-white hover:text-blue-400">UI/UX & Brand Design</a>
                    <a href="#" class="block py-2 text-white hover:text-blue-400">SEO</a>
                    <a href="#" class="block py-2 text-white hover:text-blue-400">Sosial Media ADS</a>
                </div>
            </div>
            <a href="{{ route('portfolio') }}" class="block py-2 text-white hover:text-blue-400 font-bold">Portfolio</a>
            <a href="#" class="block py-2 text-white hover:text-blue-400 font-bold">Tentang Kami</a>
            <a href="#" class="block py-2 text-white hover:text-blue-400 font-bold">Karir</a>
            <a href="#" class="block py-2 text-white hover:text-blue-400 font-bold">Blog</a>
            <a href="#" class="block py-2 text-white hover:bg-blue-400 font-bold bg-blue-500 px-4 rounded">Konsultasi Sekarang</a>
        </div>
    </div>
</header>

<style>
    /* Initial state - blue background */
    #main-header {
        background-color: #1e3a8a; /* Tailwind's blue-900 */
        transition: all 0.3s ease;
    }
    
    /* Header scroll effect styles */
    header.scrolled {
        background-color: white !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    header.scrolled a:not(.bg-blue-400):not(.bg-blue-500),
    header.scrolled button {
        color: #1a202c;
    }
    
    header.scrolled a:hover:not(.bg-blue-400):not(.bg-blue-500) {
        color: #3182ce;
    }
    
    header.scrolled .logo span:first-child {
        color: #1a202c;
    }
    
    /* Make dropdown more visible on white background when scrolled */
    header.scrolled .group .absolute {
        background-color: white;
        color: #1a202c;
    }
    
    header.scrolled .group .absolute a {
        color: #1a202c;
    }
    
    header.scrolled .group .absolute a:hover {
        background-color: #f7fafc;
        color: #3182ce;
    }
    
    /* Mobile menu styles */
    .mobile-menu {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    /* Ensure mobile menu text is white when header is scrolled */
    header.scrolled .mobile-menu {
        background-color: #1e3a8a; /* Keep dark background for mobile menu even when header is white */
    }
    
    header.scrolled .mobile-menu a:not(.bg-blue-400):not(.bg-blue-500),
    header.scrolled .mobile-menu .mobile-dropdown div,
    header.scrolled .mobile-menu svg {
        color: white !important; /* Force white text in mobile menu at all times */
    }
    
    /* Nav link animation */
    .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -4px;
        left: 0;
        background-color: #60a5fa; /* blue-400 */
        transition: width 0.3s ease;
    }
    
    .nav-link:hover::after {
        width: 100%;
    }
    
    header.scrolled .nav-link::after {
        background-color: #3182ce; /* blue-500 */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }
        
        // Mobile dropdown toggle
        const mobileDropdowns = document.querySelectorAll('.mobile-dropdown');
        mobileDropdowns.forEach(dropdown => {
            const toggleBtn = dropdown.querySelector('div');
            const content = dropdown.querySelector('.mobile-dropdown-content');
            
            toggleBtn.addEventListener('click', function() {
                content.classList.toggle('hidden');
                // Rotate arrow when dropdown is toggled
                const arrow = toggleBtn.querySelector('svg');
                if (arrow) {
                    arrow.style.transform = content.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
                    arrow.style.transition = 'transform 0.3s ease';
                }
            });
        });
        
        // Scroll effect
        const header = document.getElementById('main-header');
        
        // Check scroll position on page load
        if (window.scrollY > 10) {
            header.classList.add('scrolled');
        }
        
        // Add scroll event listener
        window.addEventListener('scroll', function() {
            if (window.scrollY > 10) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        
        // Page load animation
        const navLinks = document.querySelectorAll('.nav-link');
        setTimeout(() => {
            navLinks.forEach((link, index) => {
                setTimeout(() => {
                    link.style.opacity = '1';
                    link.style.transform = 'translateY(0)';
                }, 100 * index);
            });
        }, 300);
    });
</script>