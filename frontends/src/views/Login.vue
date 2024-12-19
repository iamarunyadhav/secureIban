<template>
  <div>
    <Navbar/>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Login</h2>
            <form @submit.prevent="login">
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" v-model="form.email" placeholder="Enter email">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" v-model="form.password" placeholder="Password">
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Sign In</button>
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
        email: '',
        password: ''
      }
    };
  },
  methods: {
  login() {
    axios.get('/sanctum/csrf-cookie').then(() => {
      axios.post('http://127.0.0.1:8000/api/auth/login', this.form, { withCredentials: true })
        .then(response => {
          console.log('Logged in:', response);
          this.$router.push('/dashboard');
        })
        .catch(error => {
          console.error('Login error:', error);
          alert('Login failed: ' + (error.response.data.message || 'Unknown error'));
        });
    }).catch(error => {
      console.error('CSRF cookie error:', error);
    });
  }
}

};
</script>
