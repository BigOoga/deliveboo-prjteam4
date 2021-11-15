<template>
    <div class="col-8 d-flex flex-wrap">
        <div
            v-for="(dish, i) in dishes"
            :key="i"
            class="card col-6"
            :class="[dish.available ? 'available' : 'unavailable']"
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
                <button
                    @click="addToCart(dish.id, dish.price)"
                    class="btn btn-primary"
                >
                    Add
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { eventBus } from "../../../js/app";
export default {
    name: "restaurantmenu",
    data() {
        return {
            baseUri: "http://127.0.0.1:8000",
            dishes: [],
            isLoading: false,
        };
    },
    computed: {
        currenRestaurantID: function () {
            const restaurantID = window.location.pathname.replace(
                "/restaurants/",
                ""
            );
            return restaurantID;
        },
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
        addToCart(dish_id, price) {
            const currentCart = JSON.parse(sessionStorage.getItem("cart"));
            let isDuplicate = false;
            currentCart.orders.forEach((order) => {
                if (order.dish_id === dish_id) {
                    isDuplicate = true;
                }
            });
            console.log(`isDuplicate? ${isDuplicate}`);
            if (!isDuplicate) {
                currentCart.orders.push({
                    dish_id: dish_id,
                    quantity: 1,
                    price: price,
                });

                sessionStorage.setItem("cart", JSON.stringify(currentCart));
                eventBus.$emit("update", currentCart.orders.length);
            }
        },
        initCart() {
            console.log("Initializing cart...");
            if (sessionStorage.getItem("cart") === null) {
                console.log("Cart did not exist, creating...");
                let cart = {
                    restaurantID: 0,
                    orders: [],
                };

                console.log("everything's fine");
                cart.restaurantID = this.currenRestaurantID;
                sessionStorage.setItem("cart", JSON.stringify(cart));
            }
            // se esiste già, ne leggiamo il contenuto
            const currentCart = JSON.parse(sessionStorage.getItem("cart"));
            // soluzione provvisoria: svuota il carrello se visito un'altro ristorante
            if (currentCart.restaurantID !== this.currenRestaurantID) {
                console.log("restaurant id did not match");
                let cart = {
                    restaurantID: 0,
                    orders: [],
                };
                console.log("dropping order...");
                sessionStorage.removeItem("order");

                console.log("reinitializing...");
                cart.restaurantID = this.currenRestaurantID;
                sessionStorage.setItem("cart", JSON.stringify(cart));
            } else {
                console.log("restaurant id match");
            }
        },
    },
    created() {
        console.log("---Currently in restaurantmenu---");
        this.getDishes();
        this.initCart();
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

.card.unavailable {
    display: none;
}
</style>
