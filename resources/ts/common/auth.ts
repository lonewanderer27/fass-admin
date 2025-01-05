const passwordGroups = document.querySelectorAll('.password-group');
passwordGroups.forEach(group => {

    const passInput = group.querySelector('input[type="password"]')!; // The password input
    const eyeIcon = group.querySelector('#eye--icon')!; // The "eye" icon to show password
    const eyeCloseIcon = group.querySelector('#eye-slash--icon')!; // The "eye-slash" icon to hide password

    console.log(passInput, eyeIcon, eyeCloseIcon)

    function showPass() {
        // @ts-ignore
        eyeCloseIcon.style.display = "block";
        // @ts-ignore
        eyeIcon.style.display = "none";
        passInput.setAttribute("type", "text");
    }

    function hidePass() {
        // @ts-ignore
        eyeCloseIcon.style.display = "none";
        // @ts-ignore
        eyeIcon.style.display = "block";
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
