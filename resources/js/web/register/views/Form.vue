<template>
<div>
  <form class="register" v-if="!isDone">
    <div v-if="hasErrors" class="errors">
      <h2>Bitte Eingaben prüfen:</h2>
      <ul v-html="errorMessage"></ul>
    </div>
    <div class="form-control">
      <input type="text" name="name" v-model="form.name" :placeholder="'Name *'">
    </div>
    <div class="form-control">
      <input type="email" name="email" v-model="form.email" :placeholder="'E-Mail *'">
    </div>
    <div class="form-control">
      <input type="tel" name="phone" v-model="form.phone" :placeholder="'Telefon *'">
    </div>
    <div class="form-control">
      <div class="select-wrapper">
        <select name="duty" v-model="form.duty_id">
          <option value="null">Funktion *</option>
          <option v-for="duty in $props.duties" :key="duty.id" :value="duty.id">{{duty.description}}</option>
        </select>
      </div> 
    </div>
    <div class="form-control is-last">
      <a 
      href="javascript:;" 
      @click.prevent="register()"
      :class="[this.isLoading ? 'is-loading' : '', 'btn-submit']">Absenden</a>
    </div>
  </form>
  <div v-if="isDone">
    <p>Vielen Dank für deine Anmeldung! Wir kontaktieren Dich so schnell als möglich!</p>
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

      isLoading: false,
      isDone: false,
      hasErrors: false,
      errorMessage: '',
    };
  },

  mounted() {
    console.log(this.$props.duties);
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
