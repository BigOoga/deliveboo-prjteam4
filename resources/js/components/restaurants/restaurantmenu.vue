<template>
    <div class="col-8 d-flex flex-wrap">
        <div
            v-for="(dish, i) in dishes"
            :key="i"
            class="card col-6"
            style="width: 18rem"
        >
            <img
                :src="
                    dish.picture
                        ? '/storage/' + dish.picture
                        : '/img/placeholder.svg'
                "
                alt=""
            />
            <div class="card-body">
                <h5 class="card-title">{{ dish.name }}</h5>
                <p class="card-text">{{ dish.description }}</p>
                <p class="card-text">€{{ dish.price }}</p>
                <a href="#" class="btn btn-primary">Add</a>
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
    // cursor: pointer;
}

img {
    object-fit: cover;
    width: 100px;
    height: 100px;
}
</style>
