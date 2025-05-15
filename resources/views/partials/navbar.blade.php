<!-- Public Navbar -->
<nav class="public-navbar hernannav-navbar">
    <div class="hernannav-container">
        <a href="{{ url('/') }}" class="hernannav-logo">Kitesurfschool <span>Windkracht-12</span></a>

        <!-- Hamburger -->
        <div class="hernannav-hamburger" onclick="document.getElementById('hernannav-links').classList.toggle('hernannav-show')">
            ☰
        </div>

        <!-- Links -->
        <ul class="hernannav-links" id="hernannav-links">
        <li><a href="{{ route('pakketten') }}">Pakketten</a></li>
        <li><a href="{{ route('reservations') }}">Reserveren</a></li>
        <li><a href="#contact">Contact</a></li>



            @guest
                <li><a href="{{ route('login') }}">Log in</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endif
            @else
    <li><a href="{{ url('/dashboard') }}">Profile</a></li>

    @if (auth()->user()->isAdmin() || auth()->user()->isWorker())
        <li><a href="{{ route('beheer') }}">Beheer</a></li>
    @endif
@endguest
        </ul>
    </div>
</nav>

<style>
    .hernannav-navbar {
    background-color: white;
    border-bottom: 1px solid #eee;
    position: sticky;
    top: 0;
    z-index: 1050;
    width: 100%;
    padding: 0.75rem 1.5rem;
    font-family: 'Poppins', sans-serif;
}

.hernannav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.hernannav-logo {
    font-weight: 600;
    font-size: 1.2rem;
    color: #333;
    text-decoration: none;
}

.hernannav-logo span {
    color: #7e22ce; /* Purple */
}

.hernannav-hamburger {
    font-size: 1.5rem;
    cursor: pointer;
    display: none;
}

.hernannav-links {
    list-style: none;
    display: flex;
    gap: 1.25rem;
}

.hernannav-links li a {
    text-decoration: none;
    color: #333;
    font-weight: 500;
}

.hernannav-links li a:hover {
    color: #7e22ce;
}

/* Mobile Styles */
@media (max-width: 768px) {
    .hernannav-hamburger {
        display: block;
    }

    .hernannav-links {
        display: none;
        flex-direction: column;
        margin-top: 1rem;
        gap: 0.75rem;
    }

    .hernannav-links.hernannav-show {
        display: flex;
    }
}
</style>