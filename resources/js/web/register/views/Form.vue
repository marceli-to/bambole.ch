<template>
<div>
  <h2 v-if="!isDone">Melde dich an!</h2>
  <form class="register" v-if="!isDone">
    <div v-if="hasErrors" class="form-errors">
      <h3>Bitte Eingaben prüfen!</h3>
    </div>
    <div class="form-control">
      <input type="text" required name="name" v-model="form.name" :placeholder="'Name *'" :class="[errors.name ? 'is-invalid' : '']">
    </div>
    <div class="form-control">
      <input type="email" required name="email" v-model="form.email" :placeholder="'E-Mail *'" :class="[errors.email ? 'is-invalid' : '']">
    </div>
    <div class="form-control">
      <input type="tel" required name="phone" v-model="form.phone" :placeholder="'Telefon *'" :class="[errors.phone ? 'is-invalid' : '']">
    </div>
    <div class="form-control">
      <div class="select-wrapper">
        <select name="duty" v-model="form.duty_id" :class="[errors.duty_id ? 'is-invalid' : '']">
          <option value="null">Funktion *</option>
          <option v-for="duty in $props.duties" :key="duty.id" :value="duty.id">{{duty.description}}</option>
        </select>
      </div> 
    </div>
    <div class="form-required">* Pflichtfelder</div>
    <div class="form-control is-last flex justify-center mt-2x md:mt-4x">
      <a 
      href="javascript:;" 
      @click.prevent="register()"
      :class="[this.isLoading ? 'is-loading' : '', 'btn-primary']">
      <span>Absenden</span>
      <span></span>
    </a>
    </div>
  </form>
  <div v-if="isDone">
    <h2>Vielen Dank für deine Anmeldung!</h2>
    <p>Wir kontaktieren Dich so schnell als möglich!</p>
  </div>
</div>
</template>
<script>
import ErrorHandling from "@register/mixins/ErrorHandling";

export default {

  mixins: [ErrorHandling],

  props: {
    duties: {
      type: Array,
      default: null,
    }
  },

  data() {
    return {

      form: {
        name: null,
        phone: null,
        email: null,
        duty_id: null,
      },

      errors: {
        name: false,
        phone: false,
        email: false,
        duty_id: false
      },

      isLoading: false,
      isDone: false,
      hasErrors: false,
      errorMessage: '',
    };
  },

  methods: {

    register() {
      this.hasErrors = false;
      this.errorMessage = '';
      this.isLoading = true;
      this.axios.post(`/register`, this.form).then(response => {
        this.isLoading = false;
        this.isDone = true;
        this.reset();
      })
      .catch(error => {
        this.hasErrors = true;
        this.isLoading = false;
        const errorData = error.response.data.errors;
        if (errorData.name) {
          this.errors.name = true;
        }
        if (errorData.phone) {
          this.errors.phone = true;
        }
        if (errorData.email) {
          this.errors.email = true;
        }
        if (errorData.duty_id) {
          this.errors.duty_id = true;
        }
      });
    },

    cancel() {
      this.reset();
    },

    reset() {
      this.errorMessage = '';
      this.hasErrors = false;
    },
  },
}
</script>
