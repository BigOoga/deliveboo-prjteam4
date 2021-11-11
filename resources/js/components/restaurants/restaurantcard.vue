<template>
    <div class="col-3">
        <div class="card" style="width: 18rem">
            <img
                :src="'/storage/' + restaurant.image"
                class="card-img-top"
                alt="foto ristorante"
            />
            <div class="card-body">
                <h5 class="card-title">{{ restaurant.name }}</h5>
                <p class="card-text">
                    {{ restaurant.description }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "RestaurantCard",
    props: {
        restaurant: Object,
    },
};
</script>

<style></style>
