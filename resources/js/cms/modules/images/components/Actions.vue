<template>
  <div>
    <div v-if="hasToggle">
      <a
        href="javascript:;"
        class="feather-icon"
        @click.prevent="toggle(image,$event)"
      >
        <eye-icon size="18" v-if="publish"></eye-icon>
        <eye-off-icon size="18" v-if="!publish"></eye-off-icon>
      </a>
    </div>
    <div v-if="hasEdit">
      <a
        href="javascript:;"
        class="feather-icon"
        @click.prevent="showEdit(image)"
      >
        <edit-icon size="18"></edit-icon>
      </a>
    </div>
    <div v-if="hasPreview">
      <a 
        :href="getSource(image, imagePreviewRoute)" 
        target="_blank" 
        class="feather-icon"
      >
        <image-icon size="18"></image-icon>
      </a>
    </div>
    <div>
      <a
        href="javascript:;"
        class="feather-icon"
        @click.prevent="destroy(image,$event)"
      >
        <trash-2-icon size="18"></trash-2-icon>
      </a>
    </div>
    <div v-if="hasCrop">
      <a
        href="javascript:;"
        class="feather-icon"
        @click.prevent="showCropper(image)"
      >
        <crop-icon size="18"></crop-icon>
      </a>
    </div>
  </div>
</template>
<script>

import { 
  EyeIcon,
  EyeOffIcon,
  EditIcon,
  Trash2Icon,
  CropIcon,
  ImageIcon,
} from 'vue-feather-icons';

import ImageUtils from "@/modules/images/mixins/utils";
export default {

  components: {
    EyeIcon,
    EyeOffIcon,
    EditIcon,
    Trash2Icon,
    CropIcon,
    ImageIcon
  },

  props: {
    image: Object,
    
    publish: Number,

    hasEdit: {
      type: Boolean,
      default: true
    },

    hasPreview: {
      type: Boolean,
      default: true
    },

    hasCrop: {
      type: Boolean,
      default: true
    },

    hasToggle: {
      type: Boolean,
      default: true
    },

    imagePreviewRoute: {
      type: String,
      default: 'large'
    },
  },

  mixins: [ImageUtils],

  methods: {
    
    toggle(image, $event) {
      this.$parent.toggle(image,$event);
    },

    destroy(image, $event) {
      this.$parent.destroy(image.name,$event);
    },

    showEdit(image) {
      this.$parent.showEdit(image);
    },

    showCropper(image) {
      this.$parent.showCropper(image);
    },
  }
}
</script>
