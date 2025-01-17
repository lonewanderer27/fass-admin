<!-- use inline style for view transitions so that animations on local is consistent -->
<style>
    @view-transition {
        navigation: auto;
    }

    #message {
        view-transition-name: message;
    }

    #form {
        view-transition-name: form;
    }
</style>

<x-layout title="Login">
    <x-slot:heading>
        Login
    </x-slot:heading>
    <div class="flex items-center h-screen justify-center px-4">
        <div class="flex flex-col md:flex-row w-full lg:w-2/3  md:h-min-[420px] shadow-xl rounded-xl">
            <!-- Left Section: Login Form -->
            <div id="form" class="w-full flex flex-col">
                <form class="flex flex-col w-full gap-2 px-8 py-16" method="POST" action="/login">
                    @csrf
                    <p class="text-3xl font-bold text-center mb-5">
                        Log In
                    </p>

                    <div>
                        <!-- Email Field -->
                        <label class="input input-bordered flex items-center gap-2">
                            <div class="w-20 hidden xs:block">Email</div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6 block xs:hidden">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                            </svg>
                            <input id="email" name="email" type="email"
                                   class="grow @error('password') input-error @enderror" placeholder="Enter your Email"
                                   required value="{{ @old('email') }}"/>
                        </label>
                        @error('email')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <!-- Password Field -->
                        <label class="input input-bordered flex items-center gap-2 password-group">
                            <div class="w-20 hidden xs:block">Password</div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6 block xs:hidden">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                            </svg>
                            <input name="password" type="password" class="grow"
                                   placeholder="Enter your Password" required/>
                            <svg id="eye--icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                            <svg id="eye-slash--icon" style="display: none" xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/>
                            </svg>
                        </label>
                    </div>
                    <label class="label cursor-pointer">
                        <span class="label-text">Remember me</span>
                        <input id="remember-me" name="remember_me" type="checkbox" class="checkbox"/>
                    </label>
                    <div class="flex justify-center mt-5 w-full">
                        <button class="btn w-full xs:w-auto px-10" type="submit">
                            Log In
                        </button>
                    </div>
                </form>
            </div>
            <!-- Right Section: Signup Message -->
            <div id="message"
                 class="rounded-tr-xl rounded-br-xl items-center justify-center w-full gap-4 flex flex-col px-8 py-16 bg-gradient-to-l from-indigo-500 via-purple-500 to-pink-500">
                <p class="text-white text-3xl font-bold">
                    Don't have an account?
                </p>
                <p class="text-white font-semibold">
                    Sign up now, fass!
                </p>
                <a href="/signup" class="btn btn-outline btn-neutral border-white text-white px-10">
                    Sign Up
                </a>
            </div>
        </div>
    </div>
</x-layout>
@vite('resources/ts/common/auth.ts')
