

async function formHandlerForPost(event) {
  event.preventDefault();
  try {
    const formData = new FormData(event.target);
    const response = await fetch(event.target.action, {
      headers: {
        'Content-Type': 'application/json',
      },
      method: event.target.method,
      body: JSON.stringify(Object.fromEntries(formData)),
    });
    if (!response.ok) {
      throw new Error(response.message);
    }
    const data = await response.json();
    window.location.reload();
  }
  catch (error) {
    console.error('Error:', error);
  }
}

async function formHandlerForPut(event) {
  event.preventDefault();
  try {
    const formData = new FormData(event.target);
    const response = await fetch(event.target.action, {
      headers: {
        'Content-Type': 'application/json',
      },
      method: 'PUT',
      body: JSON.stringify(Object.fromEntries(formData)),
    });
    if (!response.ok) {
      throw new Error(response.message);
    }
    const data = await response.json();
    window.location.reload();
  }
  catch (error) {
    console.error('Error:', error);
  }
}

async function formHandlerForDelete(event) {
  event.preventDefault();
  try {
    const formData = new FormData(event.target);
    const response = await fetch(`${event.target.action}/${event.target.id.value}`, {
      method: 'DELETE',
    });
    if (!response.ok) {
      throw new Error(response.message);
    }
    const data = await response.json();
    window.location.reload();
  }
  catch (error) {
    console.error('Error:', error);
  }
}

const deleteHandler = (id, title, author, year) => {
  document.querySelector('.delete-id').setAttribute('value', id);
  document.querySelector('.table-delete-id').innerHTML = id;
  document.querySelector('.table-delete-title').innerHTML = title;
  document.querySelector('.table-delete-author').innerHTML = author;
  document.querySelector('.table-delete-year').innerHTML = year;
}

const editHandler = (id_book, title, author, year) => {
  document.querySelector('.update-form').reset();
  document.querySelector('.origin-id').setAttribute('value', id_book);
  document.querySelector('.update-id').setAttribute('value', id_book);
  document.querySelector('.update-title').setAttribute('value', title);
  document.querySelector('.update-author').setAttribute('value', author);
  document.querySelector('.update-year').setAttribute('value', year);
}

const changeTable = (books) => {
  let html = '';
  if (books.length === 0) {
    html = `<tr>
      <td colspan='5' class='text-center'>No Data Found</td>
    </tr>`;
    document.querySelector('.main-table-body').innerHTML = html;
    return;
  }
  books.forEach(book => {
    html += `<tr>
    <td class='align-middle'>${book.id_book}</td>
    <td class='align-middle'>${book.title}</td>
    <td class='align-middle'>${book.author}</td>
    <td class='align-middle'>${book.publication_year}</td>
    <td class='align-middle'>
      <div class='d-flex justify-content-center align-items-center' style='height: 100%;'>
        <i class='bi bi-pencil-square pencil mx-2' 
           data-bs-toggle='modal' 
           data-bs-target='#exampleModal' 
           data-id='${book.id_book}' 
           data-title='${book.title}' 
           data-author='${book.author}' 
           data-publication_year='${book.publication_year}' 
           onclick='document.querySelector(".update-btn").click(); editHandler(this.dataset.id, this.dataset.title, this.dataset.author, this.dataset.publication_year);'></i>
        <i class='bi bi-trash-fill trash mx-2' 
           data-bs-toggle='modal' 
           data-bs-target='#exampleModal' 
           data-id='${book.id_book}' 
           data-title='${book.title}' 
           data-author='${book.author}' 
           data-publication_year='${book.publication_year}' 
           onclick='document.querySelector(".delete-btn").click(); deleteHandler(this.dataset.id, this.dataset.title, this.dataset.author, this.dataset.publication_year);'></i>
      </div>
    </td>
  </tr>`
  });
  document.querySelector('.main-table-body').innerHTML = html;
}

const filterBooks = (searchInput) => {
  return books.filter(book => {
    return book.id_book.toLowerCase().includes(searchInput.toLowerCase()) ||
      book.title.toLowerCase().includes(searchInput.toLowerCase()) ||
      book.author.toLowerCase().includes(searchInput.toLowerCase()) ||
      book.publication_year.toString().includes(searchInput);
  });
}

let books;
(async function searchHandler() {
  const response = await fetch('/admin/books');
  books = await response.json();
  changeTable(books);
  const searchInput = document.querySelector('.search');
  searchInput.addEventListener('input', () => {
    const filteredBooks = filterBooks(searchInput.value);
    changeTable(filteredBooks);
  });
})();
