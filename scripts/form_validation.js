document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("acc_registerForm");
    const usernameField = document.getElementById("username");
    const passwordField = document.getElementById("password");
    const confirmField = document.getElementById("password_check");
    const emailField = document.getElementById("email");
    const usernameStatus = document.getElementById("usernameStatus");
    const submitBtn = document.getElementById("submitBtn");

    //compare regex for validation
    //1 special char, 1 uppercase, 1 number, min 8 chars
    const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).{8,}$/;
    //standard email pattern, and cannot start or end with hyphens, no consecutive dots
    const emailRegex = /^[A-Za-z0-9](?:[A-Za-z0-9._%+-]{0,62}[A-Za-z0-9])?@(?:[A-Za-z0-9](?:[A-Za-z0-9-]{0,61}[A-Za-z0-9])?\.){1,3}[A-Za-z]{2,3}$/;

    let usernameAvailable = false;

    async function checkUsernameAvailability(username, timeoutMs = 8000) {
        if (!username) return { ok: false, status: 'empty' };

        // resolve path relative to the page (pages/login.html -> ../scripts/check_username.php)
        const url = new URL('../scripts/check_username.php', window.location.href).toString();

        const controller = new AbortController();
        const timer = setTimeout(() => controller.abort(), timeoutMs);

        try {
            const resp = await fetch(url, {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "username=" + encodeURIComponent(username),
                signal: controller.signal
            });

            if (!resp.ok) {
                console.error("check_username.php returned non-OK:", resp.status, "url:", url);
                return { ok: false, status: 'http_error' };
            }

            const contentType = resp.headers.get("content-type") || "";
            if (!contentType.includes("application/json")) {
                const text = await resp.text();
                console.error("check_username.php returned non-JSON response:", contentType, text);
                return { ok: false, status: 'bad_response' };
            }

            const data = await resp.json();
            return { ok: true, status: data.status };
        } catch (err) {
            if (err.name === 'AbortError') {
                console.error("Username check aborted (timeout).");
                return { ok: false, status: 'timeout' };
            }
            console.error("Error while checking username:", err);
            return { ok: false, status: 'error' };
        } finally {
            clearTimeout(timer);
        }
    }

    usernameField.addEventListener("blur", async function() {
        const username = usernameField.value.trim();
        if (!username) {
            usernameStatus.textContent = "";
            usernameStatus.className = "";
            usernameAvailable = false;
            return;
        }
        usernameStatus.textContent = "Checking...";
        usernameStatus.className = "";
        const result = await checkUsernameAvailability(username);
        if (!result.ok) {
            usernameStatus.textContent = "Unable to check username.";
            usernameStatus.className = "error";
            usernameAvailable = false;
            return;
        }
        if (result.status === "taken") {
            usernameStatus.textContent = "Username is already taken.";
            usernameStatus.className = "error";
            usernameAvailable = false;
        } else if (result.status === "available") {
            usernameStatus.textContent = "Username is available!";
            usernameStatus.className = "success";
            usernameAvailable = true;
        } else {
            usernameStatus.textContent = "";
            usernameAvailable = false;
        }
    });

    async function handleSubmit(event) {
        event.preventDefault();

        const username = usernameField.value.trim();
        const password = passwordField.value;
        const confirm = confirmField.value;
        const email = emailField.value.trim();

        if (!username) {
            alert("Please enter a username.");
            return;
        }

        if (!password) {
            alert("Please enter a password.");
            return;
        }

        if (!passwordRegex.test(password)) {
            alert("Password must be at least 8 characters long, contain one uppercase letter, one number, and one special character.");
            return;
        }

        if (password !== confirm) {
            alert("Passwords do not match. Please try again.");
            return;
        }

        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        //final async username availability check
        submitBtn.disabled = true;
        usernameStatus.textContent = "Checking...";
        usernameStatus.className = "";

        const result = await checkUsernameAvailability(username);

        //to ensure submitBtn is always re-enabled
        submitBtn.disabled = false;

        if (!result.ok) {
            alert("Could not verify username availability. Please try again.");
            usernameStatus.textContent = "Check failed.";
            usernameStatus.className = "error";
            usernameAvailable = false;
            return;
        }

        if (result.status === "taken") {
            alert("Username is already taken. Please choose another one.");
            usernameStatus.textContent = "Username is already taken.";
            usernameStatus.className = "error";
            usernameAvailable = false;
            return;
        }

        //submit form now that all validations passed
        form.removeEventListener("submit", handleSubmit);
        // call native submit in case a control shadows form.submit
        HTMLFormElement.prototype.submit.call(form);
    }

    form.addEventListener("submit", handleSubmit);
});