<template>
<div>
  <loading-indicator v-if="isLoading"></loading-indicator>
  <div v-if="isFetched" class="is-loaded">
    
    <page-header>
      <h1>Bands</h1>
      <router-link :to="{ name: 'band-create' }" class="btn-add has-icon">
        <plus-icon size="16"></plus-icon>
        <span>Hinzufügen</span>
      </router-link>
    </page-header>

    <div v-if="data.soli">
      <div>
        <h2 class="mb-2x">Samsatg, 9.9.</h2>
        <draggable 
          :disabled="false"
          v-model="data.soli" 
          @end="order(data.soli)"
          ghost-class="draggable-ghost"
          draggable=".listing__item"
          class="listing"
          v-if="data.soli.length">
          <div
            :class="[d.publish == 0 ? 'is-disabled' : '', 'listing__item is-draggable']"
            v-for="d in data.soli"
            :key="d.id"
          >
            <div class="listing__item-body">
              {{d.name}} <separator /> {{ d.time_start_full}} – {{ d.time_end_full }} <separator /> {{ d.stage.name }}
            </div>
            <list-actions 
              :id="d.id" 
              :record="d"
              :hasDraggable="true"
              :routes="{edit: 'band-edit'}">
            </list-actions>
          </div>
        </draggable>
      </div>
    </div>

    <div v-if="data.dayone">
      <div>
        <h2 class="mb-2x">Freitag, 5.8.</h2>
        <draggable 
          :disabled="false"
          v-model="data.dayone" 
          @end="order(data.dayone)"
          ghost-class="draggable-ghost"
          draggable=".listing__item"
          class="listing"
          v-if="data.dayone.length">
          <div
            :class="[d.publish == 0 ? 'is-disabled' : '', 'listing__item is-draggable']"
            v-for="d in data.dayone"
            :key="d.id"
          >
            <div class="listing__item-body">
              {{d.name}} <separator /> {{ d.time_start_full}} – {{ d.time_end_full }} <separator /> {{ d.stage.name }}
            </div>
            <list-actions 
              :id="d.id" 
              :record="d"
              :routes="{edit: 'band-edit'}">
            </list-actions>
          </div>
        </draggable>
      </div>
    </div>
    <div v-if="data.daytwo" class="mt-10x">
      <div>
        <h2 class="mb-2x">Samstag, 6.8.</h2>
        <draggable 
          :disabled="false"
          v-model="data.daytwo" 
          @end="order(data.daytwo)"
          ghost-class="draggable-ghost"
          draggable=".listing__item"
          class="listing"
          v-if="data.daytwo.length">
          <div
            :class="[d.publish == 0 ? 'is-disabled' : '', 'listing__item is-draggable']"
            v-for="d in data.daytwo"
            :key="d.id"
          >
            <div class="listing__item-body">
              {{d.name}} <separator /> {{ d.time_start_full}} – {{ d.time_end_full }} <separator /> {{ d.stage.name }}
            </div>
            <list-actions 
              :id="d.id" 
              :record="d"
              :routes="{edit: 'band-edit'}">
            </list-actions>
          </div>
        </draggable>
      </div>
    </div>
    <page-footer>
      <button-back :route="'dashboard'">Zurück</button-back>
    </page-footer>
  </div>
</div>
</template>
<script>
import { PlusIcon, EditIcon, Trash2Icon, StarIcon } from 'vue-feather-icons';
import Helpers from "@/mixins/Helpers";
import ButtonBack from "@/components/ui/ButtonBack.vue";
import ListActions from "@/components/ui/ListActions.vue";
import Separator from "@/components/ui/Separator.vue";
import draggable from "vuedraggable";
import PageFooter from "@/components/ui/PageFooter.vue";
import PageHeader from "@/components/ui/PageHeader.vue";

export default {

  components: {
    ListActions,
    Separator,
    PlusIcon,
    EditIcon,
    StarIcon,
    Trash2Icon,
    ButtonBack,
    PageFooter,
    PageHeader,
    draggable
  },

  mixins: [Helpers],

  data() {
    return {

      data: {
        dayone: null,
        daytwo: null,
        soli: null,
      },

      // Routes
      routes: {
        get: '/api/bands',
        store: '/api/band',
        delete: '/api/band',
        toggle: '/api/band/state',
        order: '/api/bands/order',
      },

      // States
      isLoading: false,
      isFetched: false,

      // Messages
      messages: {
        emptyData: 'Es sind noch keine Daten vorhanden...',
        confirm: 'Bitte löschen bestätigen!',
        updated: 'Daten aktualisiert',
      }
    };
  },

  created() {
    this.fetch();
  },

  methods: {

    fetch() {
      this.axios.get(`${this.routes.get}`).then(response => {
        this.data.dayone = response.data.dayone;
        this.data.daytwo = response.data.daytwo;
        this.data.soli = response.data.soli;
        this.isFetched = true;
      });
    },

    toggle(id) {
      this.isLoading = true;
      this.axios.get(`${this.routes.toggle}/${id}`).then(response => {
        const index = this.data.findIndex(x => x.id === id);
        this.data[index].publish = response.data;
        this.$notify({ type: "success", text: this.messages.updated });
        this.isLoading = false;
      });
    },

    destroy(id) {
      if (confirm(this.messages.confirm)) {
        this.isLoading = true;
        this.axios.delete(`${this.routes.delete}/${id}`).then(response => {
          this.fetch();
          this.isLoading = false;
        });
      }
    },

    order(data) {
      let bands = data.map(function(band, index) {
        band.order = index;
        return band;
      });
      if (this.debounce) return;
      this.debounce = setTimeout(function() {
        this.debounce = false;
        this.axios.post(`${this.routes.order}`, {items: bands}).then((response) => {
          this.$notify({type: 'success', text: this.messages.updated});
        });
      }.bind(this, bands), 500);
    },
  },
}
</script>