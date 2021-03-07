<template>
  <inertia-link :href="route('password.show', password.id)" class="c-list-card">
    <div class="c-list-card-section c-list-card-section-first">
      <img :src="password.website_img" alt="" />
      <div class="c-list-card-section-first__content">
        <span>{{ password.name }}</span>
        <span>{{ password.login }}</span>
      </div>
    </div>
    <div class="c-list-card-section">
      {{ password.category.name }}
    </div>
    <div class="c-list-card-section">
      <span>{{
        password.last_used !== undefined
          ? password.last_used.viewed_at
          : "Never Viewed"
      }}</span>
    </div>
  </inertia-link>
</template>

<script>
export default {
  props: {
    password: Object,
  },
};
</script>