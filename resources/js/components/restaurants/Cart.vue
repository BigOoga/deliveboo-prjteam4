<template>
    <div class="col-4 border p-5" id="main-row">
        <div class="col-12">
            <h4>Il tuo ordine</h4>
            <!-- qui ci andranno i prodotti selezionati -->
        </div>
        <div v-for="(dish, i) in dishes" :key="i">
            <p>€{{ dish.price }} {{ dish.name }}</p>
        </div>
        <hr />
        <!-- subtotal -->
        <div class="col-12 d-flex justify-content-between">
            <span>Subtotale</span>
            <span>€{{ subTotal }}</span>
        </div>
        <!-- delivery fee -->
        <div class="col-12 d-flex justify-content-between">
            <span>Spese di consegna</span>
            <span>€{{ restaurant.delivery_fee }}</span>
        </div>
        <hr class="mt-2 mb-2" />
        <!-- total -->
        <div class="col-12 d-flex justify-content-between">
            <span>Total</span>
            <span>€{{ total }}</span>
        </div>
    </div>
</template>

<script>
import { eventBus } from "../../../js/app";
export default {
    name: "Cart",
    props: [],
    data() {
        return {
            length: 0,
            baseUri: "http://127.0.0.1:8000",
            dishes: [],
            restaurant: {},
            isLoading: false,
        };
    },
    computed: {
        subTotal: function () {
            let subTotal = 0;
            this.dishes.forEach((dish) => {
                subTotal += dish.price;
            });
            return subTotal;
        },
        total: function () {
            let total = this.subTotal + this.restaurant.delivery_fee;
            return total;
        },
    },
    methods: {
        restoreCart() {
            // prendo il cart dallo storage
            const currentCart = JSON.parse(sessionStorage.getItem("cart"));
            // storo gli ordini per comodità
            const orders = currentCart.orders;

            // carico un array con tutti gli ID di piatti presenti nel carrello
            const id_array = [];
            orders.forEach((order) => {
                id_array.push(order.dish_id);
            });
            this.getDishesByID(id_array);
        },
        updateLength(newLen) {
            console.log(`Updating this.length to ${newLen}`);
            this.length = newLen;
        },
        getRestaurantByID() {
            this.isLoading = true;
            const restaurantID = window.location.pathname.replace(
                "/restaurants/",
                ""
            );
            console.log(`Fetching restaurant by id: ${restaurantID}`);
            axios
                //restaurants/{restaurantID}/dishes
                .get(`${this.baseUri}/api/restaurants/${restaurantID}`)
                .then((r) => {
                    const data = r.data;
                    this.restaurant = data;
                    this.isLoading = false;
                })
                .catch((e) => {
                    console.error(e);
                });
        },
        getDishesByID(id_array) {
            id_array.forEach((id) => {
                this.dishes = [];
                console.log(`Getting dish by id ${id}..`);
                axios
                    .get(`${this.baseUri}/api/dishes/${id}`)
                    .then((r) => {
                        const data = r.data;

                        this.dishes.push(data);
                    })
                    .catch((e) => {
                        console.error(e);
                    });
            });
        },
    },
    created() {
        this.getRestaurantByID();
        this.restoreCart();
        //# listeners
        eventBus.$on("update", (length) => {
            // prendo il cart dallo storage
            const currentCart = JSON.parse(sessionStorage.getItem("cart"));
            // computo quanti ordini (cioè ID unici) abbiamo in storage
            const cartLength = currentCart.orders.length;
            // storo gli ordini per comodità
            const orders = currentCart.orders;
            // tengo traccia della quantità di ordini
            this.updateLength(cartLength);

            // carico un array con tutti gli ID di piatti presenti nel carrello
            const id_array = [];
            orders.forEach((order) => {
                id_array.push(order.dish_id);
            });
            this.getDishesByID(id_array);
        });
    },
};
</script>

<style lang="scss" scoped></style>
