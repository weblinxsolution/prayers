<template>
    <div>
      <!-- Display your paginated data here -->
      <ul>
        <li v-for="item in paginatedItems" :key="item.id">{{ item.name }}</li>
      </ul>
  
      <!-- Display pagination controls -->
      <nav>
        <ul>
          <li v-for="page in totalPages" :key="page" @click="gotoPage(page)">
            {{ page }}
          </li>
        </ul>
      </nav>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        items: [],
        currentPage: 1,
        itemsPerPage: 10, // Adjust this based on your desired items per page
      };
    },
    computed: {
      totalPages() {
        return Math.ceil(this.items.length / this.itemsPerPage);
      },
      paginatedItems() {
        const start = (this.currentPage - 1) * this.itemsPerPage;
        const end = start + this.itemsPerPage;
        return this.items.slice(start, end);
      },
    },
    methods: {
      gotoPage(page) {
        this.currentPage = page;
      },
      fetchData() {
        // Make an API call using Axios to fetch the data
        // Replace 'YOUR_API_ENDPOINT' with your actual API endpoint
        axios
          .get('YOUR_API_ENDPOINT')
          .then((response) => {
            this.items = response.data; // Assuming your API returns an array of items
          })
          .catch((error) => {
            console.error('Error fetching data:', error);
          });
      },
    },
    mounted() {
      // Fetch data when the component is mounted
      this.fetchData();
    },
  };
  </script>
  