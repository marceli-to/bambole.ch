<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <form @submit.prevent="submit" v-if="isFetched">
    <header class="content-header">
      <h1>{{title}}</h1>
    </header>
    <tabs :tabs="tabs" :errors="errors"></tabs>
    <div v-show="tabs.data.active">
      <div>
        <div :class="[this.errors.name ? 'has-error' : '', 'form-row']">
          <label>Name *</label>
          <input type="text" v-model="data.name">
          <label-required />
        </div>
        <div class="form-row">
          <label>Beschreibung</label>
          <tinymce-editor
            :api-key="tinyApiKey"
            :init="tinyConfig"
            v-model="data.description"
          ></tinymce-editor>
        </div>
        <div class="form-row">
          <label>Webseite</label>
          <input type="text" v-model="data.website">
        </div>
        <div class="form-row">
          <label>Youtube</label>
          <input type="text" v-model="data.youtube">
        </div>
        <!-- <div class="form-row">
          <label>Tag</label>
          <div class="select-wrapper">
            <select name="day" v-model="data.day" :class="[errors.day ? 'is-invalid' : '']">
              <option value="null">Bitte wählen...</option>
              <option value="0">Samstag, 9.9.</option>
              <option value="1">Freitag, 5.8.</option>
              <option value="2">Samstag, 6.8.</option>
            </select>
          </div> 
        </div> -->
        <!-- <div :class="[this.errors.stage_id ? 'has-error' : '', 'form-row']">
          <label>Bühne</label>
          <div class="select-wrapper">
            <select name="stages" v-model="data.stage_id">
              <option value="null">Bitte wählen...</option>
              <option v-for="stage in stages" :key="stage.id" :value="stage.id">{{stage.name}}</option>
            </select>
          </div>
        </div> -->
        <div class="grid grid-cols-12 mt-6x">
          <div class="span-6">
            <label>Beginn</label>
            <the-mask
              type="text"
              mask="##:##"
              :masked="true"
              name="time_start"
              v-model="data.time_start"
            ></the-mask>
          </div>
          <div class="span-6">
            <label>Ende</label>
            <the-mask
              type="text"
              mask="##:##"
              :masked="true"
              name="time_end"
              v-model="data.time_end"
            ></the-mask>
          </div>
        </div>
      </div>
    </div>
    <div v-show="tabs.image.active">
      <images 
        :imageRatioW="1" 
        :imageRatioH="1"
        :images="data.images">
      </images>
    </div>
    <div v-show="tabs.settings.active">
      <div>
        <div class="form-row">
          <radio-button 
            :label="'Publizieren?'"
            v-bind:publish.sync="data.publish"
            :model="data.publish"
            :name="'publish'">
          </radio-button>
        </div>
      </div>
    </div>
    <page-footer>
      <button-back :route="'bands'">Zurück</button-back>
      <button-submit>Speichern</button-submit>
    </page-footer>
  </form>
</div>
</template>
<script>
import { ExternalLinkIcon } from 'vue-feather-icons';
import { TheMask } from "vue-the-mask";
import TinymceEditor from "@tinymce/tinymce-vue";
import tinyConfig from "@/config/tiny.js";
import ErrorHandling from "@/mixins/ErrorHandling";
import RadioButton from "@/components/ui/RadioButton.vue";
import ButtonBack from "@/components/ui/ButtonBack.vue";
import ButtonSubmit from "@/components/ui/ButtonSubmit.vue";
import LabelRequired from "@/components/ui/LabelRequired.vue";
import Tabs from "@/components/ui/Tabs.vue";
import tabsConfig from "@/views/pages/band/config/tabs.js";
import PageFooter from "@/components/ui/PageFooter.vue";
import PageHeader from "@/components/ui/PageHeader.vue";
import Images from "@/modules/images/Index.vue";

export default {
  components: {
    ExternalLinkIcon,
    RadioButton,
    ButtonBack,
    ButtonSubmit,
    LabelRequired,
    Tabs,
    PageFooter,
    PageHeader,
    Images,
    TinymceEditor,
    TheMask,
  },

  mixins: [ErrorHandling],

  props: {
    type: String
  },

  data() {
    return {
      
      // Model
      data: {
        name: null,
        description: null,
        website: null,
        youtube: null,
        day: 0,
        time_start: null,
        time_end: null,
        stage_id: 1,
        publish: 1,
        images: [],
      },

      stages: {},

      // Validation
      errors: {
        title: false,
      },

      // Routes
      routes: {
        get: '/api/band',
        getStage: '/api/stages',
        store: '/api/band',
        update: '/api/band',
      },

      // States
      isLoading: false,
      isFetched: true,
      isFetchedStages: false,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Daten vorhanden...',
        stored: 'Daten erfasst!',
        updated: 'Daten aktualisiert!',
      },

      // Tabs config
      tabs: tabsConfig,

      // TinyMCE
      tinyConfig: tinyConfig,
      tinyApiKey: 'vuaywur9klvlt3excnrd9xki1a5lj25v18b2j0d0nu5tbwro',
    };
  },

  created() {
    if (this.$props.type == "edit") {
      this.fetch()
    }
    this.getStages();
  },

  methods: {

    getStages() {
      this.isFetchedStages = false;
      this.axios.get(`${this.routes.getStage}`).then(response => {
        this.stages = response.data.data;
        this.isFetchedStages = true;
      });
    },

    fetch() {
      this.isFetched = false;
      this.axios.get(`${this.routes.get}/${this.$route.params.id}`).then(response => {
        this.data = response.data;
        this.isFetched = true;
      });
    },

    // Submit form
    submit() {
      if (this.$props.type == "edit") {
        this.update();
      }

      if (this.$props.type == "create") {
        this.store();
      }
    },

    store() {
      this.isLoading = true;
      this.axios.post(this.routes.store, this.data).then(response => {
        this.$router.push({ name: "bands"});
        this.$notify({ type: "success", text: this.messages.stored });
        this.isLoading = false;
      });
    },

    update() {
      this.isLoading = true;
      this.axios.put(`${this.routes.update}/${this.$route.params.id}`, this.data).then(response => {
        this.$router.push({ name: "bands"});
        this.$notify({ type: "success", text: this.messages.updated });
        this.isLoading = false;
      });
    },
  },

  computed: {
    title() {
      return this.$props.type == "edit" 
        ? "Band bearbeiten" 
        : "Band hinzufügen";
    }
  }
};
</script>
