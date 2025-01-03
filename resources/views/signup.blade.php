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
<x-layout title="Signup">
    <x-slot:heading>
        Signup
    </x-slot:heading>
    <div class="flex items-center h-screen justify-center px-4">
        <div class="flex flex-col md:flex-row w-full md:w-2/3 md:h-1/2 shadow-xl rounded-xl">
            <!-- Left Section: Login Message -->
            <div id="message"
                class="gap-4 rounded-tl-xl rounded-bl-xl w-full flex flex-col items-center justify-center px-8 py-16 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                <p class="text-white text-3xl font-bold message-item">
                    Welcome Back!
                </p>
                <p class="text-white font-semibold message-item">
                    Log in and continue your fass journey.
                </p>
                <a href="/login" class="btn btn-outline btn-neutral px-10 mt-4 message-item">
                    Log In
                </a>
            </div>
            <!-- Right Section: Signup Form -->
            <div id="form" class="w-full flex flex-col">
                <form class="flex flex-col w-full gap-2 px-8 py-16">
                    <p class="text-3xl font-bold text-center mb-5">
                        Create an Account
                    </p>
                    <!-- Email Field -->
                    <label class="input input-bordered flex items-center gap-2">
                        <div class="w-20 hidden xs:block">Email</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6 block xs:hidden">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/>
                        </svg>
                        <input name="email" type="email" class="grow" placeholder="Enter your Email" />
                    </label>
                    <!-- Password Field -->
                    <label class="input input-bordered flex items-center gap-2 password-group">
                        <div class="w-20 hidden xs:block">Password</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6 block xs:hidden">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                        </svg>
                        <input name="password" type="password" class="grow" placeholder="Enter your Password" />
                        <svg id="eye--icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        <svg id="eye-slash--icon" style="display: none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/>
                        </svg>
                    </label>
                    <!-- Confirm Password -->
                    <label class="input input-bordered flex items-center gap-2 password-group">
                        <div class="w-20 hidden xs:block">Confirm</div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6 block xs:hidden">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                        </svg>
                        <input name="confirmPassword" type="password" class="grow" placeholder="Confirm your Password" />
                    </label>
                    <div class="flex justify-center mt-5">
                        <button class="btn w-full sm:w-auto px-10" type="submit">
                            Sign Up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>

<script lang="ts">
    // Select all page navigation links (e.g., "Sign Up" or "Log In")
    document.querySelectorAll("a[href='/signup'], a[href='/login']").forEach((link) => {
        link.addEventListener("click", (event) => {
            event.preventDefault(); // Prevent default navigation

            const href = link.getAttribute("href"); // Get target URL

            // Trigger View Transition
            document.startViewTransition(() => {
                window.location.href = href; // Navigate to the target page
            });
        });
        console.log(link)
    });

    // Select all password input groups
    const passwordGroups = document.querySelectorAll('.password-group');
    passwordGroups.forEach(group => {

        const passInput = group.querySelector('input[type="password"]'); // The password input
        const eyeIcon = group.querySelector('#eye--icon'); // The "eye" icon to show password
        const eyeCloseIcon = group.querySelector('#eye-slash--icon'); // The "eye-slash" icon to hide password

        console.log(passInput, eyeIcon, eyeCloseIcon)

        function showPass() {
            eyeCloseIcon.style.display = "none";
            eyeIcon.style.display = "block";
            passInput.setAttribute("type", "text");
        }

        function hidePass() {
            eyeCloseIcon.style.display = "block";
            eyeIcon.style.display = "none";
            passInput.setAttribute("type", "password");
        }

        function toggle() {
            if (passInput.getAttribute("type") === "password") {
                showPass();
            } else {
                hidePass();
            }
        }

        // Add event listeners for toggling visibility
        eyeIcon.addEventListener("click", toggle);
        eyeCloseIcon.addEventListener("click", toggle);
    });
</script>
