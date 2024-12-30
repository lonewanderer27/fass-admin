<x-layout title="Signup">
    <x-slot:heading>
        Signup
    </x-slot:heading>
    <div class="flex justify-center items-center h-screen">
        <form class="flex flex-col mx-auto xs:w-full sm:w-96 gap-2">
            <label class="input input-bordered flex items-center gap-2">
                <div class="w-20">Email</div>
                <input name="email" type="email" class="grow" placeholder="Enter your Email" />
            </label>
            <label class="input input-bordered flex items-center gap-2 password-group">
                <div class="w-20">Password</div>
                <input name="password" type="password" class="grow" placeholder="Enter your Password" />
                <svg id="eye--icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <svg id="eye-slash--icon" style="display: none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
            </label>
            <label class="input input-bordered flex items-center gap-2 password-group">
                <div class="w-20">Confirm</div>
                <input name="confirmPassword" type="password" class="grow" placeholder="Confirm your Password" />
                <svg id="eye--icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                <svg id="eye-slash--icon" style="display: none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
            </label>
            <p class="text-end">Already have an account? <a href="/login" class="font-bold">Log In.</a></p>
            <div class="flex justify-end mt-5">
                <button class="btn w-full sm:w-auto" type="submit">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
</x-layout>

<script lang="ts">
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