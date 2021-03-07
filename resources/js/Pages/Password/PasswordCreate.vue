<template>
  <app-layout>
    <template #header>
      <div
        class="c-hero c-hero--no-px flex items-center justify-between flex-wrap"
      >
        <h1 class="c-hero__title">Add Password</h1>
      </div>
    </template>

    <div>
      <div class="py-12 container">
        <div class="flex flex-col">
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
                  required
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
                  required
                />
              </div>

              <category-select v-model="form.category_id"></category-select>

              <button type="submit">Add Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>


<script>
import AppLayout from "@/Layouts/AppLayout";
import CategorySelect from '@/Components/Misc/CategoriesSelect';

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
    submitPassword() {
      this.$inertia.post("/password", this.form);
    },
  },

  components: {
    AppLayout,
    CategorySelect
  },
  props: ["categories"],
};
</script>

