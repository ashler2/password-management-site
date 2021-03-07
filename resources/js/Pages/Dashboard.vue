<template>
  <app-layout>
    <template #header>
      <div
        class="c-hero c-hero--no-px flex items-center justify-between flex-wrap"
      >
        <h1 class="c-hero__title">Dashboard</h1>
        <inertia-link :href="route('password.create')" class="btn btn--mt0"
          >Create Password</inertia-link
        >
      </div>
    </template>

    <div class="py-12 container">
      <div class="flex flex-col">
        <password-card
          v-for="password in passwords"
          :key="password.id"
          :password="password"
        ></password-card>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import PasswordCard from "@/Components/Password/PasswordCard";
export default {
  data() {
    return {
      passwordCreate: false,
    };
  },

  methods: {},

  components: {
    AppLayout,
    PasswordCard,
  },

  props: ["passwords", "isAdminUser"],
};
</script>
