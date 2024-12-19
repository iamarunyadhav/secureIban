<template>
  <div>
    <Navbar/>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Register</h2>
            <form @submit.prevent="register">
              <!-- Name field -->
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Enter your name">
              </div>
              <!-- Email field -->
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" v-model="form.email" placeholder="Enter your email">
              </div>
              <!-- Password field -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" v-model="form.password" placeholder="Create a password">
              </div>
              <!-- Password Confirmation field -->
              <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" v-model="form.password_confirmation" placeholder="Repeat your password">
              </div>
              <!-- Submit button -->
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
import axios from 'axios';
import Navbar from '@/components/Navbar.vue';

export default {
  components: {
    Navbar
  },
  data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      }
    };
  },
  methods: {
    register() {
      axios.get('/sanctum/csrf-cookie').then(response => {
        axios.post('http://127.0.0.1:8000/api/auth/register', this.form)
          .then(response => {
            console.log('Registered:', response);
          })
          .catch(error => {
            console.error('Error:', error.response);
          });
      });
    }
  }
};
</script>

<style scoped>

</style>
