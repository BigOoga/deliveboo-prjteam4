<template>
    <div class="col-4 border p-5" id="main-row">
        <div class="col-12">
            <h4>Il tuo ordine</h4>
            <!-- qui ci andranno i prodotti selezionati -->
        </div>
        <div v-for="(dish, i) in dishes" :key="i">
            <p>Order number {{ i }}</p>
            <p>{{ dish.name }} - €{{ dish.price }}</p>
        </div>
        <hr />
        <!-- subtotal -->
        <div class="col-12 d-flex justify-content-between">
            <span>Subtotale</span>
            <span>{{ subTotal }}</span>
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
    computed: {
        subTotal: function () {
            let subTotal = 0;
            this.dishes.forEach((dish) => {
                subTotal += dish.price;
            });
            return subTotal;
        },
    },
    methods: {
        updateLength(newLen) {
            console.log(`Updating this.length to ${newLen}`);
            this.length = newLen;
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
