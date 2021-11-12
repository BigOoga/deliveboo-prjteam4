<template>
    <div class="col-4 border p-5" id="main-row">
        <div class="col-12">
            <h4>Il tuo ordine</h4>
            <!-- qui ci andranno i prodotti selezionati -->
        </div>
        <div v-for="(dish, i) in dishes" :key="i">
            <p>Order number {{ i }}</p>
            <p>{{ dish.name }}</p>
        </div>
        <hr />
        <!-- subtotal -->
        <div class="col-12 d-flex justify-content-between">
            <span>subtotale</span>
            <span>12.90$</span>
        </div>
        <!-- delivery fee -->
        <div class="col-12 d-flex justify-content-between">
            <span>spese di consegna</span>
            <span>2.50$</span>
        </div>
        <hr class="mt-2 mb-2" />
        <!-- total -->
        <div class="col-12 d-flex justify-content-between">
            <span>Total</span>
            <span>124.50$</span>
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
        };
    },
    methods: {
        updateLength(newLen) {
            console.log(`Updating this.length to ${newLen}`);
            this.length = newLen;
        },
        getDishesByID(id_array) {
            console.log(`Getting dish by id ${dish_id}..`);
            axios
                .get(`${this.baseUri}/api/dishes/${dish_id}`)
                .then((r) => {
                    const data = r.data;
                    this.dishes.push = data;
                    this.isLoading = false;
                })
                .catch((e) => {
                    console.error(e);
                });
        },
    },
    created() {
        //# listeners
        eventBus.$on("update", (length) => {
            const currentCart = JSON.parse(sessionStorage.getItem("cart"));
            const cartLength = currentCart.orders.length;
            const orders = currentCart.orders;
            this.updateLength(cartLength);
            orders.forEach((order) => {
                this.getDishByID(order.dish_id);
            });
        });
    },
};
</script>

<style lang="scss" scoped></style>
