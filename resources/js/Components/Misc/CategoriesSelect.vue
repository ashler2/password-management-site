<template>
  <div class="form-row">
    <label for="category">Category</label>
    <select
      name="category"
      id=""
      v-on:change="$emit('change', $event.target.value)"
    >
      <option value="">Please Select a Category</option>
      <option :value="option.id" v-for="option in options" :key="option.id">
        {{ option.name }}
      </option>
    </select>
  </div>
</template>

<script>
import axios from "axios";
export default {
  model: {
    prop: "value",
    event: "change",
  },

  data() {
    return {
      options: [],
    };
  },

  methods: {
    getCategories() {
      axios
        .get("/api/categories")
        .then(({ status, data: { categories } }) => {
          if (status === 200) {
            this.options = categories;
          }
        })
        .catch((err) => console.log(err));
    },
  },

  mounted() {
    this.getCategories();
  },

  props: {
    selectedId: {
      required: false,
    },
  },
};
</script>