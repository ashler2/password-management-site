<template>
  <app-layout>
    <div>
      <div class="c-card-header">
        <h2>Create Password</h2>
      </div>
      <div class="c-card-body">
        <form action="" @submit.prevent="submitPassword">
          <div class="form-row">
            <label for="password_name" class="c-label">Name</label>
            <input
              type="text"
              name="password_name"
              id="password_name"
              class="c-inpute c-input--text"
              v-model="form.name"
            />
          </div>

          <div class="form-row">
            <label for="password_website" class="c-label">Website</label>
            <input
              type="text"
              name="password_website"
              id="password_website"
              class="c-inpute c-input--text"
              v-model="form.website"
            />
          </div>

          <div class="form-row">
            <label for="password_login" class="c-label">Login</label>
            <input
              type="text"
              name="password_login"
              id="password_login"
              class="c-inpute c-input--text"
              v-model="form.login"
            />
          </div>

          <div class="form-row">
            <label for="password_email" class="c-label">Email</label>
            <input
              type="email"
              name="password_email"
              id="password_email"
              class="c-inpute c-input--text"
              v-model="form.email"
            />
          </div>

          <div class="form-row">
            <label for="password_password" class="c-label">password</label>
            <input
              type="text"
              name="password_password"
              id="password_password"
              class="c-inpute c-input--text"
              v-model="form.password"
            />
          </div>

          <div class="form-row">
            <label for="password_category" class="c-label">Category</label>
            <select
              type="text"
              name="password_category"
              id="password_category"
              class="c-inpute c-input--select"
              v-model="form.category_id"
            >
              <option selected :value="null"></option>
              <option
                v-for="category in categories"
                :value="category.id"
                :key="category.id"
              >
                {{ category.name }}
              </option>
            </select>
          </div>

          <button type="submit">Add Password</button>
        </form>
      </div>
    </div>
  </app-layout>
</template>


<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  data() {
    return {
      form: {
        name: null,
        website: null,
        login: null,
        email: null,
        password: null,
        category_id: null,
      },
    };
  },

  methods: {
    submitPassword() {},
  },

  components: {
    AppLayout,
  },
  props: ["categories"],
};
</script>

