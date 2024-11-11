<nav id="navbar" class="fixed top-0 left-0 right-0 z-10 bg-transparent {{ request()->is('movies') ? 'dark' : '' }} transition-colors duration-300">
    <div class="container mx-auto px-4 flex justify-between items-center h-20">
        <a id="navbar-title" href="{{ route('movies') }}" class="text-3xl font-bold text-gray-700 dark:text-gray-200 transition-colors duration-300">Movies</a>

        <div class="flex items-center space-x-4">
            <button id="theme-toggle" class="text-gray-700 dark:text-gray-200 text-sm font-semibold leading-6 transition-colors duration-300">
                <span id="theme-icon"></span>
            </button>

            @auth
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button 
                    type="submit" 
                    id="logout-button"
                    class="text-sm font-semibold leading-6 text-gray-700 dark:text-gray-200 border border-gray-400 dark:border-gray-200 rounded px-3 py-1 
                    hover:bg-gray-300 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white transition duration-300">
                    Logout
                </button>
            </form>
            @endauth
        </div>
    </div>
</nav>

<script>
    function handleNavbarBackground() {
        const navbar = document.getElementById('navbar');
        const navbarTitle = document.getElementById('navbar-title');
        const themeToggle = document.getElementById('theme-toggle');
        const logoutButton = document.getElementById('logout-button');

        if (window.scrollY > 0) {
            navbar.classList.add('shadow');

            if (document.documentElement.classList.contains('dark')) {
                navbar.classList.add('bg-gray-900');
                navbar.classList.remove('bg-transparent');
                navbarTitle.style.color = '';
                themeToggle.style.color = '';
                logoutButton.style.color = '';
            } else {
                navbar.classList.add('bg-white');
                navbar.classList.remove('bg-transparent');
                navbarTitle.style.color = '#000000';
                themeToggle.style.color = '#000000';
                logoutButton.style.color = '#000000';
            }
        } else {
            navbar.classList.remove('bg-white', 'bg-gray-900', 'shadow');
            navbar.classList.add('bg-transparent');
            navbarTitle.style.color = '';
            themeToggle.style.color = '';
            logoutButton.style.color = '';
        }
    }

    window.addEventListener('scroll', handleNavbarBackground);

    handleNavbarBackground();
</script>
