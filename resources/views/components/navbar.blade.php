<nav class="flex flex-col">
    <!-- Top navbar (always visible) -->
    <nav class="navbar justify-between gap-4 bg-base-300">
        <!-- Logo -->
        <a class="btn btn-ghost text-lg"
           href="/"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h8m-8 6h16"/>
            </svg>
            Fass
        </a>

        <!-- Menu (Desktop) -->
        <div class="shrink-0 hidden md:flex gap-2">
            @guest
                <a class="btn btn-sm btn-ghost" href="/signup">Create Account</a>
                <a class="btn btn-sm btn-primary" href="/login">
                    Log in
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                    </svg>
                </a>
            @endguest

            @auth
                <button class="btn btn-sm btn-error" href="/login" form="logout">
                    Log out
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                    </svg>
                </button>
            @endauth
        </div>

        <!-- Menu (Mobile) -->
        <div class="dropdown dropdown-end md:hidden">
            <button class="btn btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
            </button>

            @guest
                <ul tabindex="0" class="dropdown-content menu z-[1] bg-base-200 p-4 rounded-box shadow w-56 gap-2">
                    <li><a href="/signup">Create Account</a></li>
                    <a class="btn btn-primary btn-sm" href="/login">
                        Log in
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                        </svg>
                    </a>
                </ul>
            @endguest

            @auth
                <ul tabindex="0" class="dropdown-content menu z-[1] bg-base-200 p-4 rounded-box shadow w-56 gap-2">
                    <button class="btn btn-error btn-sm" form="logout">
                        Log out
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                        </svg>
                    </button>
                </ul>
            @endauth
        </div>
    </nav>

    <form id="logout" method="POST" action="/logout" class="hidden">
        @csrf
    </form>
</nav>
