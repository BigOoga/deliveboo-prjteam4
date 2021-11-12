<template>
    <div class="col-3">
        <div @click="goToRestaurant" class="card" style="width: 18rem">
            <div class="img-container">
                <img
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
    object-fit: cover;
    width: 200px;
    height: 200px;
}
</style>
