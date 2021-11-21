<template>
<div class="col-lg-4 col-md-6" >
        <div class="card p-3 shadow-sm">
            <div>
                <h4>Il tuo ordine</h4>
                <!-- qui ci andranno i prodotti selezionati -->
                <div v-for="(dish, i) in loadedDishes" :key="i" class="mb-2">
                    <div class="row d-flex justify-content-between">
                        <span class="col-6"
                            >{{ dish.name }} X {{ dish.quantity }}</span
                        >
                        <span
                            class="
                                col-6
                                d-flex
                                justify-content-between
                                align-items-center
                            "
                        >
                            <span>
                                <button
                                    @click="decreaseQuant(i)"
                                    class="btn btn-rnd ms-2"
                                >
                                    -
                                </button>
                                <button
                                    @click="increaseQuant(i)"
                                    class="btn btn-rnd"
                                >
                                    +
                                </button>
                            </span>
                            €{{
                                (
                                    Math.round(dish.price * dish.quantity * 100) /
                                    100
                                ).toFixed(2)
                            }}</span
                        >
                    </div>
                </div>
            </div>
            <hr />
            <!-- subtotal -->
            <div class="d-flex justify-content-between">
                <span>Subtotale</span>
                <span>€{{ subTotal }}</span>
            </div>
            <!-- delivery fee -->
            <div class="d-flex justify-content-between">
                <span>Spese di consegna</span>
                <span>€{{ restaurant.delivery_fee }}</span>
            </div>
            <hr class="mt-2 mb-2" />
            <!-- total -->
            <div class="d-flex justify-content-between">
                <span>Totale</span>
                <span>€{{ total }}</span>
            </div>
            <div class="mt-3">
                <button @click="goToCheckout" class="btn btn-primary">
                    Checkout
                </button>
                <button @click="emptyCart" class="btn btn-danger">Svuota</button>
            </div>
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
            loadedDishes: [],
            restaurant: {},
            isLoading: false,
        };
    },
    computed: {
        subTotal: function () {
            let subTotal = 0;
            this.loadedDishes.forEach((dish) => {
                subTotal += parseFloat(dish.price) * dish.quantity;
            });
            subTotal = (Math.round(subTotal * 100) / 100).toFixed(2);
            return subTotal;
        },
        total: function () {
            console.log(this.restaurant.delivery_fee);
            let total =
                parseFloat(this.subTotal) +
                parseFloat(this.restaurant.delivery_fee);
            total = (Math.round(total * 100) / 100).toFixed(2);
            return total;
        },
    },
    methods: {
        goToCheckout() {
            let order = {
                subTotal: this.subTotal,
                total: this.total,
                delivery_fee: this.restaurant.delivery_fee,
                dishes: [],
            };
            this.loadedDishes.forEach((dish) => {
                let reducedDish = {
                    name: dish.name,
                    quantity: dish.quantity,
                    dish_id: dish.id,
                };
                order.dishes.push(reducedDish);
            });

            sessionStorage.setItem("order", JSON.stringify(order));
            window.location.href = `http://127.0.0.1:8000/payment`;
        },
        emptyCart() {
            const currentCart = JSON.parse(sessionStorage.getItem("cart"));
            currentCart.orders = [];
            sessionStorage.setItem("cart", JSON.stringify(currentCart));
            this.dishes = [];
            this.loadedDishes = [];
            eventBus.$emit("update", currentCart.orders.length);
        },
        decreaseQuant(i) {
            const currentCart = JSON.parse(sessionStorage.getItem("cart"));
            console.log("checking if 1");
            if (this.loadedDishes[i].quantity === 1) {
                console.log("attempting to delete");
                // delete from cart AND this.dishes
                this.loadedDishes.splice(i, 1);
                currentCart.orders.splice(i, 1);
                sessionStorage.setItem("cart", JSON.stringify(currentCart));
                eventBus.$emit("update", currentCart.orders.length);
            } else {
                console.log("decreasing");
                this.loadedDishes[i].quantity--;
                currentCart.orders[i].quantity =
                    currentCart.orders[i].quantity - 1;
            }
            sessionStorage.setItem("cart", JSON.stringify(currentCart));
        },
        increaseQuant(i) {
            const currentCart = JSON.parse(sessionStorage.getItem("cart"));

            this.dishes[i].quantity++;
            currentCart.orders[i].quantity = currentCart.orders[i].quantity + 1;

            sessionStorage.setItem("cart", JSON.stringify(currentCart));
        },
        restoreCart() {
            // prendo il cart dallo storage
            const currentCart = JSON.parse(sessionStorage.getItem("cart"));
            // storo gli ordini per comodità
            const orders = currentCart.orders;

            // carico un array con tutti gli ID di piatti presenti nel carrello

            orders.forEach((order) => {
                this.getDishByID(order.dish_id, order.quantity);
            });
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
                })
                .catch((e) => {
                    console.error(e);
                });
        },
        getDishByID(id, quantity) {
            const currentCart = JSON.parse(sessionStorage.getItem("cart"));
            this.dishes = [];
            this.isLoading = true;

            console.log(`Getting dish by id ${id}..`);
            axios
                .get(`${this.baseUri}/api/dishes/${id}`)
                .then((r) => {
                    const data = r.data;
                    data.quantity = quantity;
                    this.dishes.push(data);
                    if (this.dishes.length === currentCart.orders.length) {
                        this.isLoading = false;
                        this.loadedDishes = this.dishes;
                    }
                })
                .catch((e) => {
                    console.error(e);
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
            // storo gli ordini per comodità
            const orders = currentCart.orders;
            // carico un array con tutti gli ID di piatti presenti nel carrello
            const id_array = [];
            orders.forEach((order) => {
                id_array.push(order.dish_id);
            });
            this.restoreCart();
        });
    },
};
</script>

<style lang="scss" scoped>
.btn {
    color: white;
}
.btn-rnd {
    border-radius: 8px;
    padding: 0 5px;
    background-color: #3490dc;
    font-size: 16px;
    width: 25px;
}
// #main-row {
//     border: 2px solid #00aabc;
//     border-radius: 5px;
// }
</style>
