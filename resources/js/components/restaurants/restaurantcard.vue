<template>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
        <div @click="goToRestaurant" class="card mb-2 h-100 shadow-sm">
            <div class="img-container">
                <img
                    style="object-fit: cover"
                    :src="
                        restaurant.image
                            ? '/storage/' + restaurant.image
                            : '/img/placeholder.svg'
                    "
                    class="card-img-top"
                    alt="foto ristorante"
                />
            </div>
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
    methods: {
        goToRestaurant() {
            console.log("Firing");
            window.location.href = `http://127.0.0.1:8000/restaurants/${this.restaurant.id}`;
        },
    },
};
</script>

<style lang="scss" scoped>
.card:hover {
    cursor: pointer;
}

img {
    max-height: 200px;
}

.card {
    max-height: 400px;
    overflow: hidden;
    overflow-wrap: break-word;
    margin-bottom: 20px;
}
</style>
