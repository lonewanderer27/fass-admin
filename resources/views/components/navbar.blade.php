<nav class="navbar bg-neutral text-neutral-content">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabIndex={0} role="button" class="btn btn-ghost lg:hidden">
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
                        d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul
                tabIndex={0}
                class="menu menu-sm dropdown-content  rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li>
                    <x-navlink href="/" :active="request()->routeIs('home')">
                        Home
                    </x-navlink>
                </li>
                <li>
                    <a>More</a>
                    <ul class="p-2 text-slate-900">
                        <li>
                            <x-navlink href="/login" :active="request()->routeIs('login')">
                                Login
                            </x-navlink>
                        </li>
                        <li>
                            <x-navlink href="/signup" :active="request()->routeIs('signup')">
                                Signup
                            </x-navlink>
                        </li>
                    </ul>
                </li>
{{--                <li><a>Item 3</a></li>--}}
            </ul>
        </div>
        <a class="btn btn-ghost text-xl">Fass</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li>
                <x-navlink href="/" :active="request()->routeIs('/')">
                    Home
                </x-navlink>
            </li>
            <li>
                <details>
                    <summary>More</summary>
                    <ul class="p-2 text-slate-900 ">
                        <li>
                            <x-navlink href="/login" :active="request()->routeIs('login')">
                                Login
                            </x-navlink>
                        </li>
                        <li>
                            <x-navlink href="/signup" :active="request()->routeIs('signup')">
                                Signup
                            </x-navlink>
                        </li>
                    </ul>
                </details>
            </li>
{{--            <li><a>Item 3</a></li>--}}
        </ul>
    </div>
    <div class="navbar-end">
        <a class="btn">Button</a>
    </div>
</nav>
