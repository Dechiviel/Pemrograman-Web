async function register(event) {
  event.preventDefault();
  try {
    const formData = new FormData(event.target);
    const response = await fetch(event.target.action, {
      method: event.target.method,
      body: formData
    });
    if (!response.ok) {
      throw new Error(response.message);
    }
    const data = await response.json();
    window.location.href = '../';
    if (data.error) {
      const errorContainer = document.querySelector('.error');
      errorContainer.textContent = data.error;
      errorContainer.style.display = 'block';
    }
  }
  catch (error) {
    console.log(error);
  }
}