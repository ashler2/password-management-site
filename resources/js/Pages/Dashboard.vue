<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
      <inertia-link v-if="isAdminUser" :href="route('password.create')"
        >Create Password</inertia-link
      >
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <h1>Passwords will go here</h1>
        </div>
      </div>
    </div>
    <password-create v-if="passwordCreate"></password-create>
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
