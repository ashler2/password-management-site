<template>
  <div
    class="c-create-popup"
    :style="[currentDisplay ? { display: 'block' } : { display: 'none' }]"
  >
    <div class="card">
      <div class="card-header">Example Component</div>

      <div class="card-body">
        <form method="POST" action="" @submit.prevent="createPassword">
          <div class="form-group row">
            <label
              for="password_name"
              class="col-md-4 col-form-label text-md-right"
              >Name</label
            >
            <div class="col-md-8">
              <input
                id="password_name"
                type="text"
                class="form-control"
                name="password_name"
                required
                v-model="form.name"
              />
            </div>
          </div>
          <div class="form-group row">
            <label
              for="password_website"
              class="col-md-4 col-form-label text-md-right"
              >Website url</label
            >
            <div class="col-md-8">
              <input
                id="password_website"
                type="text"
                class="form-control"
                name="password_website"
                required
                v-model="form.website"
              />
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right"
              >Password</label
            >
            <div class="col-md-8">
              <input
                id="password"
                type="text"
                class="form-control"
                name="password"
                required
                v-model="form.password"
              />
            </div>
          </div>
          <div class="form-group row">
            <label
              for="password_email"
              class="col-md-4 col-form-label text-md-right"
              >Email</label
            >
            <div class="col-md-8">
              <input
                id="password_email"
                type="text"
                class="form-control"
                name="password_email"
                v-model="form.email"
              />
            </div>
          </div>
          <div class="form-group row">
            <label
              for="password_login"
              class="col-md-4 col-form-label text-md-right"
              >Login</label
            >
            <div class="col-md-8">
              <input
                id="password_login"
                type="text"
                class="form-control"
                name="password_login"
                v-model="form.login"
              />
            </div>
          </div>
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { POST_PASSWORD } from "../endpoints/endpoints.js";
export default {
  mounted() {},
  data() {
    return {
      form: {
        name: "",
        email: "",
        login: "",
        password: "",
        website: "",
      },
    };
  },
  props: {
    currentDisplay: Boolean,
  },
  methods: {
    createPassword() {
      axios.post(POST_PASSWORD, this.form).then((res) => {
        res.status === 201
          ? this.$parent.toggleCreatePassword()
          : alert("error");
        this.$parent.getPasswords();
      });
    },
  },
};
</script>
