@extends('base.base')

@section('title', 'Movies | Cinema')

@section('content')
<div class="relative h-screen overflow-hidden">
    <div id="slideshow" class="absolute inset-0 transition-opacity duration-1000">
        <div class="slide bg-cover bg-center h-full w-full opacity-100 transition-opacity duration-1000" style="background-image: url('{{ asset('img/inception.png') }}');">
            <div class="absolute inset-0 bg-black opacity-30"></div>
        </div>
        <div class="slide bg-cover bg-center h-full w-full opacity-0 transition-opacity duration-1000" style="background-image: url('{{ asset('img/the_matrix.png') }}');">
            <div class="absolute inset-0 bg-black opacity-30"></div>
        </div>
        <div class="slide bg-cover bg-center h-full w-full opacity-0 transition-opacity duration-1000" style="background-image: url('{{ asset('img/interstellar.png') }}');">
            <div class="absolute inset-0 bg-black opacity-30"></div>
        </div>
        <div class="slide bg-cover bg-center h-full w-full opacity-0 transition-opacity duration-1000" style="background-image: url('{{ asset('img/the_dark_knight.png') }}');">
            <div class="absolute inset-0 bg-black opacity-30"></div>
        </div>
        <div class="slide bg-cover bg-center h-full w-full opacity-0 transition-opacity duration-1000" style="background-image: url('{{ asset('img/endgame.png') }}');">
            <div class="absolute inset-0 bg-black opacity-30"></div>
        </div>
    </div>
</div>

<div class="container mx-auto my-10 px-4">
    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @php
        $movies = [
            ['id' => 1, 'title' => 'Inception', 'poster' => 'img/inception.png', 'year' => 2010, 'duration' => '148m', 'synopsis' => 'Cobb, a master spy, steals information from his targets by entering their dreams. He is being hunted for the murder of his wife, and the only way to atone for all this, is with Inception.'],
            ['id' => 2, 'title' => 'The Matrix', 'poster' => 'img/the_matrix.png', 'year' => 1999, 'duration' => '136m', 'synopsis' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.'],
            ['id' => 3, 'title' => 'Interstellar', 'poster' => 'img/interstellar.png', 'year' => 2014, 'duration' => '169m', 'synopsis' => 'A team of intergalactic explorers must travel through a wormhole and become trapped in a time-space dimension in an attempt to ensure the survival of humanity on planet Earth.'],
            ['id' => 4, 'title' => 'The Dark Knight', 'poster' => 'img/the_dark_knight.png', 'year' => 2008, 'duration' => '152m', 'synopsis' => 'Batman has a new enemy, the Joker, a criminal mastermind bent on destroying Gotham City. Together with Gordon and Harvey Dent, Batman must fight to stop him before it\'s too late.'],
            ['id' => 5, 'title' => 'Avengers: Endgame', 'poster' => 'img/endgame.png', 'year' => 2019, 'duration' => '181m', 'synopsis' => 'Continuing Avengers: Infinity War, where the events after Thanos managed to get all the infinity stones and destroy 50% of all living things in the universe. Will the Avengers succeed in defeating Thanos?'],
            ['id' => 6, 'title' => 'No Time to Die', 'poster' => 'img/no_time_to_die.png', 'year' => 2021, 'duration' => '163m', 'synopsis' => 'James Bond has retired and is living a quiet life in Jamaica. However, all that is interrupted when his old friend Felix Leiter from the CIA shows up and asks for his help. A mission to rescue a kidnapped scientist turns out to be riskier than expected, leading Bond on the trail of a mysterious villain armed with deadly new technology.'],
            ['id' => 7, 'title' => 'Top Gun: Maverick', 'poster' => 'img/maverick.png', 'year' => 2022, 'duration' => '131m', 'synopsis' => 'After more than 30 years of service as one of the Navy\'s best aviators, Pete “Maverick” Mitchell was in the position he had always dreamed of, performing groundbreaking stunts as a daring test pilot, and turning down every chance for promotion because it would have left him unable to fly his planes.'],
            ['id' => 8, 'title' => 'Spider-Man: No Way Home', 'poster' => 'img/no_way_home.png', 'year' => 2021, 'duration' => '148m', 'synopsis' => 'For the first time in Spider-Man\'s big-screen history, the affable hero\'s true identity is revealed, causing his superpowered responsibilities to clash with his normal life, and putting everyone closest to him at risk.'],
        ];
        @endphp

        @foreach($movies as $movie)
        <div onclick="showModal({{ json_encode($movie) }})" class="movie-item relative bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 cursor-pointer">
            <div class="relative overflow-hidden rounded-lg">
                <img src="{{ asset($movie['poster']) }}" alt="{{ $movie['title'] }}" class="w-full h-80 object-cover sm:h-96 md:h-96 lg:h-[28rem] transition-transform duration-500 ease-in-out transform hover:scale-105">
                <div class="absolute bottom-0 w-full bg-black bg-opacity-60 p-4 h-24 sm:h-28 flex flex-col justify-center movie-overlay">
                    <h3 class="text-white font-semibold text-lg">{{ $movie['title'] }}</h3>
                    <p class="text-gray-300 text-sm">{{ $movie['year'] }} &bull; {{ $movie['duration'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div id="movieModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center" style="display: none;">
    <div class="bg-zinc-200 dark:bg-gray-800 text-gray-900 dark:text-white rounded-2xl p-4 md:p-8 max-w-5xl w-full mx-4 relative shadow-lg z-60 flex flex-col md:flex-row transform md:-translate-y-10">
        <img id="modalPoster" src="" alt="Movie Poster" class="w-full h-64 object-cover rounded-lg mb-4 md:w-56 md:h-80 md:mr-8">
        <div class="flex-1 relative">
            <button onclick="closeModal()" class="absolute top-0 right-2 md:top-0 md:right-4 text-gray-600 dark:text-gray-300 hover:text-black dark:hover:text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 md:w-8 md:h-8">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </button>
            <h2 id="modalTitle" class="text-2xl md:text-3xl font-bold mb-6 text-gray-900 dark:text-white"></h2>
            <p id="modalSynopsis" class="mb-8 text-lg text-gray-700 dark:text-gray-300"></p>
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
                <a id="bookButton" class="flex items-center justify-center bg-green-600 hover:bg-green-500 text-slate-100 font-bold py-3 px-6 rounded-lg">Book</a>
                <a id="viewTicketsButton" class="flex items-center justify-center bg-indigo-600 hover:bg-indigo-500 text-slate-100 font-bold py-3 px-6 rounded-lg">View Tickets</a>
            </div>
        </div>
    </div>
</div>

<style>
    .movie-item {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    }

    .movie-item.visible {
        opacity: 1;
        transform: translateY(0);
    }

    @media (max-width: 768px) {
    #bookButton, #viewTicketsButton {
        width: 100%;
        margin: 0 auto;
        }
    }

    @media (min-width: 1024px) {
        .movie-overlay {
            height: 16%;
            padding: 16px;
        }

        .movie-overlay h3 {
            font-size: 1.25rem;
        }
    }
</style>

<script>
function showModal(movie) {
    document.getElementById('modalTitle').innerText = movie.title;
    document.getElementById('modalSynopsis').innerText = movie.synopsis;
    document.getElementById('bookButton').setAttribute('href', `{{ url('/movies/book/') }}/${movie.id}`);
    document.getElementById('viewTicketsButton').setAttribute('href', `{{ url('/movies/tickets/') }}/${movie.id}`);
    document.getElementById('modalPoster').src = `{{ asset('${movie.poster}') }}`;
    document.getElementById('movieModal').style.display = "flex";
}


function openModal() {
    document.getElementById('movieModal').style.display = 'flex';
}


function closeModal() {
    document.getElementById('movieModal').style.display = 'none';
}

document.addEventListener("DOMContentLoaded", () => {
        const movieItems = document.querySelectorAll(".movie-item");

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    entry.target.style.transitionDelay = `${index * 0.1}s`;
                    entry.target.classList.add("visible");
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        movieItems.forEach((item) => {
            observer.observe(item);
        });
    });
</script>

@vite('resources/css/slideshow.css')
@vite('resources/js/slideshow.js')

@endsection
