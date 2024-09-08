<template>
  <div>
    <google-signin-button @success="handleSuccess" @error="handleError"></google-signin-button>
  </div>
</template>

<script>
import { GoogleSigninButton } from 'vue-google-signin-button';

export default {
  components: {
    GoogleSigninButton,
  },
  methods: {
    handleSuccess(response) {
      // Send response.tokenId to your backend for verification
      fetch('http://localhost:8000/authentication/callback', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          id_token: response.tokenId,
        }),
      })
        .then(response => response.json())
        .then(data => {
          console.log(data);
        });
    },
    handleError(error) {
      console.error(error);
    },
  },
};
</script>