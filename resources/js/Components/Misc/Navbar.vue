<template>
  <header>
    <nav class="navbar">
      <div class="container">
        <div class="navbar__logo">
          <inertia-link :href="route('dashboard')">
            <span>Ashlane</span>
          </inertia-link>
        </div>
        <div class="navbar" :class="{ 'navbar--active': navActive }">
          <div
            class="navbar-trigger"
            id="navbar-trigger"
            @click="this.toggleNav"
          >
            <span class="navbar-trigger__lines"> </span>
          </div>
          <div class="navbar-wrapper">
            <inertia-link
              v-if="!$page.props.user"
              @click="this.closeNav"
              :href="route('dashboard')"
            >
              <span @click="this.closeNav">Login</span>
            </inertia-link>
            <div class="navbar__links" v-if="$page.props.user">
              <inertia-link :href="route('dashboard')">
                <span @click="this.closeNav">Home</span>
              </inertia-link>
              <inertia-link @click="this.closeNav" :href="route('dashboard')">
                <span @click="this.closeNav">Actvity</span>
              </inertia-link>

              <inertia-link
                v-if="isAdminUser"
                @click="this.closeNav"
                :href="route('dashboard')"
              >
                <span @click="this.closeNav"> Admin</span>
              </inertia-link>
              <form @submit.prevent="logout">
                <button type="submit" class="link"> Log Out </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import JetDropdownLink from "@/Jetstream/DropdownLink";
export default {
  data() {
    return {
      navActive: false,
    };
  },

  methods: {
    logout() {
      this.$inertia.post(route("logout"));
    },

    toggleNav() {
      this.navActive = !this.navActive;
    },

    closeNav() {
      this.navActive = false;
    },
  },

  components: {
    JetDropdownLink,
  },

  props: ['isAdminUser']
};
</script>