const loginForm = document.querySelector(".wrapper form");

loginForm.addEventListener("submit", function(event) {
    event.preventDefault();
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    fetch('login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email, password })
        })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                // Login successful, redirect to protected page
                window.location.href = 'protected.html';
            } else {
                alert('Invalid username or password');
            }
        })
        .catch((error) => console.error(error));

    localStorage.setItem("email", email);
    localStorage.setItem("password", password);
    alert("Registered Successful");
    window.location.href = "index.html";
});