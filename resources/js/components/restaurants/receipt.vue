<template>
    <div class="border rounded bg-white p-3" id="receipt">
        <div v-for="(product, i) in products" :key="i">
            {{ product.name }} x{{ product.quantity }}
        </div>
        <hr />
        <h5>Subtotale: €{{ subTotal }}</h5>
        <h5>Consegna: €{{ delivery_fee }}</h5>
        <h5>
            Totale: €<span id="total">{{ total }}</span>
        </h5>
    </div>
</template>

<script>
export default {
    name: "Receipt",
    data() {
        return {
            products: [],
            subTotal: 0,
            total: 0,
            delivery_fee: 0,
        };
    },
    methods: {
        getCart() {
            const currentOrder = JSON.parse(sessionStorage.getItem("order"));
            currentOrder.dishes.forEach((dish) => {
                this.products.push(dish);
            });
            this.subTotal = currentOrder.subTotal;
            this.delivery_fee = currentOrder.delivery_fee;
            this.total = currentOrder.total;
        },
    },
    created() {
        this.getCart();
    },
};
</script>

<style></style>
