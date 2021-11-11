<template>
    <div class="container-fluid">
        <div class="row">
            <h3>Risultati della ricerca:</h3>
        </div>
        <Loader v-if="isLoading" />
        <div class="row">
            <restaurantcard
                v-for="(restaurant, i) in restaurants"
                :key="i"
                :restaurant="restaurants[i]"
            />
        </div>
    </div>
</template>

<script>
import restaurantcard from "./restaurantcard.vue";
export default {
    components: { restaurantcard },
    name: "Results",
    data() {
        return {
            baseUri: "http://127.0.0.1:8000",
            restaurants: [],
            isLoading: false,
        };
    },
    methods: {
        // Fetch all posts with an API call
        getRestaurants() {
            this.isLoading = true;
            axios
                .get(`${this.baseUri}/api/restaurants`)
                .then((r) => {
                    const data = r.data;
                    this.restaurants = data;
                    this.isLoading = false;
                })
                .catch((e) => {
                    console.error(e);
                });
        },
    },
    created() {
        this.getRestaurants();
    },
};
</script>

<style></style>
