document.addEventListener('DOMContentLoaded', () => {
  const loginForm = document.querySelector('.login-form');
  if (loginForm) {
    loginForm.addEventListener('submit', login);
  }
});

async function login(event) {
  event.preventDefault();

  try {
    const form = event.target;
    const formData = {
      username: form.username.value,
      nrp: form.nrp.value
    }
    const response = await fetch(event.target.action, {
      headers: {
        'Content-Type': 'application/json'
      },
      method: event.target.method,
      body: JSON.stringify(formData)
    });

    const data = await response.json();

    console.log("Response data:", data.error);

    if (data.error) {
      const errorContainer = document.querySelector('.error');
      errorContainer.textContent = data.error;
      errorContainer.style.display = 'block';
    } else {
      window.location.href = '/';
    }
  } catch (error) {
    console.error("Login error:", error);
  }
}