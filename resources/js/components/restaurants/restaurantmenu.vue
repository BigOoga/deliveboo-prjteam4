<template>
    <div class="col-8">
        <div
            v-for="(dish, i) in dishes"
            :key="i"
            class="card m-3 shadow col-6"
            style="max-width: 500px"
        >
            <div class="row g-0">
                <div class="col-4">
                    <img
                        :src="
                            dish.picture
                                ? '/storage/' + dish.picture
                                : '/img/placeholder.svg'
                        "
                        alt=""
                    />
                </div>
                <div class="col-6">
                    <div class="card-body">
                        <h5 class="card-title">{{ dish.name }}</h5>
                        <p class="card-text">{{ dish.description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "restaurantmenu",
    data() {
        return {
            baseUri: "http://127.0.0.1:8000",
            dishes: [],
            isLoading: false,
        };
    },
    methods: {
        // Fetch dishes with an API call
        getDishes() {
            this.isLoading = true;
            const restaurantID = window.location.pathname.replace(
                "/restaurants/",
                ""
            );
            console.log(`Fetching dishes from restaurantID ${restaurantID}`);
            axios
                //restaurants/{restaurantID}/dishes
                .get(`${this.baseUri}/api/restaurants/${restaurantID}/dishes`)
                .then((r) => {
                    const data = r.data;
                    this.dishes = data;
                    this.isLoading = false;
                })
                .catch((e) => {
                    console.error(e);
                });
        },
    },
    created() {
        console.log("---Currently in restaurantmenu---");
        this.getDishes();
    },
};
</script>

<style scoped lang="scss">
.card:hover {
    cursor: pointer;
}

img {
    object-fit: cover;
    width: 100px;
    height: 100px;
}
</style>
