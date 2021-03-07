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
                                <label for="password_name" class="c-label"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    name="password_name"
                                    id="password_name"
                                    class="c-inpute c-input--text"
                                    v-model="password.name"
                                    required
                                    disabled
                                />
                            </div>

                            <div class="form-row">
                                <label for="password_website" class="c-label"
                                    >Website</label
                                >
                                <input
                                    type="text"
                                    name="password_website"
                                    id="password_website"
                                    class="c-inpute c-input--text"
                                    v-model="password.website"
                                    disabled
                                />
                            </div>

                            <div class="form-row">
                                <label for="password_login" class="c-label"
                                    >Login</label
                                >
                                <input
                                    type="text"
                                    name="password_login"
                                    id="password_login"
                                    class="c-inpute c-input--text"
                                    v-model="password.login"
                                    disabled
                                />
                            </div>

                            <div class="form-row">
                                <label for="password_email" class="c-label"
                                    >Email</label
                                >
                                <input
                                    type="email"
                                    name="password_email"
                                    id="password_email"
                                    class="c-inpute c-input--text"
                                    v-model="password.email"
                                    disabled
                                />
                            </div>

                            <password-display :passwordLength="password.password_length" :passwordId="password.id"></password-display>
                            <category-select
                                v-model="password.category.id"
                            ></category-select>
                        </form>
                        <inertia-link
                            :href="route('password.edit', password.id)"
                            class="btn"
                            >Edit</inertia-link
                        >
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>


<script>
import AppLayout from "@/Layouts/AppLayout";
import CategorySelect from "@/Components/Misc/CategoriesSelect";
import PasswordDisplay from "@/Components/Password/PasswordDisplay";

export default {
    data() {
        return {};
    },

    methods: {
        submitPassword() {
            this.$inertia.post("/password", this.form);
        },
    },

    components: {
        AppLayout,
        CategorySelect,
        PasswordDisplay,
    },
    props: ["password"],
};
</script>

