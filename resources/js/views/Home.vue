<template>
  <section class="home-page">
    <div class="container">
      <div class="home-page__title">
        <h2>Passwords</h2>
        <div class="">
          <button
            class="btn"
            @click="toggleCreatePassword"
            v-if="this.isAdmin()"
          >
            Fast create
          </button>
          <password-create :currentDisplay="createPassword"></password-create>
          <router-link :to="{ name: 'Password-Create' }" class="btn">
            Create Password
          </router-link>
        </div>
      </div>
      <div class="">
        <h3>Search</h3>
        <input type="text" v-model="search" />
      </div>
      <div class="password-section">
        <div class="password-section__header">
          <h3>Name</h3>
          <h3>Category</h3>
          <h3>Last Used</h3>
        </div>
        <password-card
          v-for="(password, index) in this.search.lenght
            ? passwords
            : searchedPassword"
          :password="password"
          :key="index"
        ></password-card>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
axios.defaults.withCredentials = true;
import { mapGetters } from "vuex";
import { GET_PASSWORDS, GET_SANCTUM } from "../endpoints/endpoints";

export default {
  data() {
    return {
      passwords: [],
      createPassword: false,
      user: null,
      search: "",
    };
  },
  mounted() {
    this.getPasswords();
  },
  methods: {
    ...mapGetters(["isAdmin"]),
    getPasswords() {
      axios.get(GET_PASSWORDS).then(({ data: { data } }) => {
        data.map((password) => {
          password.last_used = password.last_used[0];
          return password;
        });
        this.passwords = data;
      });
    },
    toggleCreatePassword() {
      this.createPassword = !this.createPassword;
    },
  },
  computed: {
    searchedPassword: function () {
      if (this.passwords.length) {
        return this.passwords.filter((password) => {
          if (password.name.toLowerCase().includes(this.search.toLowerCase())) {
            return password;
          }
        });
      }
      return [];
    },
  },
};
</script>