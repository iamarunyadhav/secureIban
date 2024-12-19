<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">IBAN Validator</h5>
          <div class="card-body">
            <form @submit.prevent="validateIban">
              <div class="mb-3">
                <label for="iban" class="form-label">Enter IBAN Number</label>
                <input type="text" class="form-control" id="iban" v-model="iban" required>
              </div>
              <button type="submit" class="btn btn-primary">Validate</button>
            </form>
            <div v-if="validationMessage" class="alert" :class="{'alert-success': isValid, 'alert-danger': !isValid}" role="alert">
              {{ validationMessage }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      iban: '',
      validationMessage: '',
      isValid: false
    };
  },
  methods: {
    validateIban() {
      // Local preliminary regex validation for IBAN format
      const regex = /^([A-Z]{2}\d{2}[A-Z\d]{1,30})$/;
      if (!regex.test(this.iban)) {
        this.isValid = false;
        this.validationMessage = 'Invalid IBAN format. Please check and try again.';
        return; // Stop the function if format is wrong
      }

      // Send the IBAN to the server for further validation
      axios.post('http://127.0.0.1:8000/api/ibans/check', { iban: this.iban })
        .then(response => {
          console.log("scsc");
          // Handle the response from the server
          this.isValid = response.data.isValid;
          this.validationMessage = response.data.message;
        })
        .catch(error => {
          // Handle errors if the API call fails
          this.isValid = false;
          this.validationMessage = error.response ? error.response.data.message : 'Error validating IBAN.';
        });
    }
  }
}
</script>


<style scoped>
/* You can add additional styles here */
</style>
