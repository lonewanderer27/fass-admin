<x-layout title="Login">
    <x-slot:heading>
        Login
    </x-slot:heading>
    <div class="flex justify-center items-center h-screen">
        <form class="flex flex-col mx-auto xs:w-full sm:w-96 gap-2">
            <label class="input input-bordered flex items-center gap-2">
                <div class="w-20">Email</div>
                <input type="email" class="grow" placeholder="Enter your Email" />
            </label>
            <label class="input input-bordered flex items-center gap-2">
                <div class="w-20">Password</div>
                <input id="password" type="password" class="grow" placeholder="Enter your Password" />
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
            <div class="flex justify-end">
                <button class="btn" type="submit">
                    Login
                </button>
            </div>
        </form>
    </div>
</x-layout>

<script lang="ts">
    const eyeIcon = document.getElementById("eye--icon");
    const eyeCloseIcon = document.getElementById("eye-slash--icon");
    const passInput = document.getElementById("password");

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
        // check if pass input has an attribute of type=password
        // if there is, add style=display:none to eyeCloseIcon
        // then add style=display:block to eyeIcon
        if (passInput.getAttribute("type") === "password") {
            showPass()
        } else {
            hidePass()
        }
    }

    // assign onClick to each svg
    eyeIcon.addEventListener("click", toggle)
    eyeCloseIcon.addEventListener("click", toggle)
</script>
