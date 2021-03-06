<template>
  <app-layout>
    <template #header>
      <div
        class="c-hero c-hero--no-px flex items-center justify-between flex-wrap"
      >
        <h1 class="c-hero__title">Dashboard</h1>

      </div>
    </template>

    <div class="py-12 container">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

          <h1>Passwords will go here</h1>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  data() {
    return {
      passwordCreate: false,
    };
  },

  methods: {},

  components: {
    AppLayout,
  },

  props: ["passwords", "isAdminUser"],
};
</script>
