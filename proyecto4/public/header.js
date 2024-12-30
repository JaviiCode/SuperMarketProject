async function logout() {
    const response = await fetch("LogOut", {
        method: "GET",
        headers: {
            "X-CSRF-TOKEN": token,
            "Content-Type": "application/x-www-form-urlencoded",
        },
    });
    const responsejson = await response.json();
    window.location.href = "/login";
}
