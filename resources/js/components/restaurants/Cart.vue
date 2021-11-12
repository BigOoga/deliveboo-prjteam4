<template>
    <div class="col-3 border p-5" id="main-row">
        <div class="col-12">
            <h4>Il tuo ordine</h4>
            <!-- qui ci andranno i prodotti selezionati -->
        </div>
        <hr>
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
        <hr class="mt-2 mb-2">
        <!-- total -->
        <div class="col-12 d-flex justify-content-between">
            <span>Total</span>
            <span>124.50$</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "Cart",
    props:[],
    data() {
        return {
           
        };
    },
    methods: {
       
    },
};
</script>

<style lang="scss" scoped>
    #main-row{
        position: fixed;
    }
</style>
