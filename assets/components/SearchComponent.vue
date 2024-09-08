<template>
  <div>
    <input v-model="query" @input="search" placeholder="Search..." />
    <button @click="search">Search</button>
    <ul>
      <li v-for="result in results" :key="result.id">{{ result.name }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      query: '',
      results: []
    };
  },
  methods: {
    search() {
      if (this.query.length > 2) {
        fetch(`/search?query=${encodeURIComponent(this.query)}`)
          .then(response => response.json())
          .then(data => {
            this.results = data;
          })
          .catch(error => console.error('Error:', error));
      } else {
        this.results = [];
      }
    }
  }
};
</script>