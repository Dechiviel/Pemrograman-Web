document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.querySelector('.login-form');
  if (loginForm) {
    loginForm.addEventListener('submit', login);
  }
});

async function login(event) {
  event.preventDefault();

  try {
    const formData = new FormData(event.target);
    const response = await fetch(event.target.action, {
      method: event.target.method,
      body: formData
    });

    const data = await response.json();
    console.log("Server response:", data);

    if (data.error) {
      const errorContainer = document.querySelector('.error');
      errorContainer.textContent = data.error;
      errorContainer.style.display = 'block';
    } else {
      window.location.reload();
    }
  } catch (error) {
    console.error("Login error:", error);
  }
}
