<template>
    <div>
      <h2>Daftar Buku</h2>

      <!-- Tampilkan daftar buku -->
      <ul>
        <li v-for="book in books" :key="book.id">
          {{ book.book_name }} - {{ book.author_name }}
          <button @click="showEditModal(book)">Edit</button>
          <button @click="deleteBook(book.id)">Hapus</button>
        </li>
      </ul>

      <!-- Modal Edit -->
      <div v-if="showModal">
        <h3>Edit Buku</h3>
        <label for="book_name">Judul Buku:</label>
        <input v-model="selectedBook.book_name" type="text" id="book_name" name="book_name" />

        <label for="author_id">Penulis:</label>
        <select v-model="selectedBook.author_id" id="author_id" name="author_id">
          <option v-for="author in authors" :key="author.id" :value="author.id">{{ author.author_name }}</option>
        </select>

        <button @click="saveBook">Simpan</button>
      </div>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        books: [],
        authors: [],
        selectedBook: {
          id: null,
          book_name: '',
          author_id: null,
        },
        showModal: false,
      };
    },
    mounted() {
      // Panggil fungsi untuk mengambil data buku dan penulis
      this.fetchBooks();
      this.fetchAuthors();
    },
    methods: {
      fetchBooks() {
        axios.get('/api/books')
          .then(response => {
            this.books = response.data;
          })
          .catch(error => {
            console.error('Error fetching books', error);
          });
      },
      fetchAuthors() {
        axios.get('/api/authors') // Ganti URL dengan endpoint sesuai kebutuhan
          .then(response => {
            this.authors = response.data;
          })
          .catch(error => {
            console.error('Error fetching authors', error);
          });
      },
      showEditModal(book) {
        // Tampilkan modal edit dan isi data buku yang dipilih
        this.selectedBook = { ...book };
        this.showModal = true;
      },
      saveBook() {
        // Kirim data buku ke server untuk disimpan atau diperbarui
        const url = this.selectedBook.id ? `/api/books/update/${this.selectedBook.id}` : '/api/books/save';

        axios.post(url, this.selectedBook)
          .then(response => {
            this.showModal = false;
            this.fetchBooks(); // Perbarui daftar buku setelah penyimpanan
          })
          .catch(error => {
            console.error('Error saving book', error);
          });
      },
      deleteBook(id) {
        // Kirim permintaan ke server untuk menghapus buku berdasarkan ID
        axios.delete(`/api/books/delete/${id}`)
          .then(response => {
            this.fetchBooks(); // Perbarui daftar buku setelah penghapusan
          })
          .catch(error => {
            console.error('Error deleting book', error);
          });
      },
    },
  };
  </script>
