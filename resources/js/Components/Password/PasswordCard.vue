<template>
    <inertia-link
        :href="route('password.show', password.id)"
        class="c-list-card"
    >
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
            <span>{{ passwordViewedAt }}</span>
        </div>
    </inertia-link>
</template>

<script>
import dayjs from 'dayjs';
import advancedFormat from 'dayjs/plugin/advancedFormat';
dayjs.extend(advancedFormat);

export default {
    props: {
        password: Object,
    },

    computed: {
        passwordViewedAt() {
            return this.password.last_used != null
                ? dayjs(this.password.last_used.viewed_at).format('Do MMM YYYY HH:mm')
                : "Never Viewed";
        },
    },
};
</script>