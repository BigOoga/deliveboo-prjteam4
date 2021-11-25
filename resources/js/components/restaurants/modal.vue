<template>
    <div class="modal d-inline-block" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vuoi creare un nuovo carrello?</h5>
                    <button
                        @click="refuse"
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Hai riempito il carrello coi piatti di un altro
                        ristorante! Se prosegui il carrello verrà svuotato.
                    </p>
                </div>
                <div class="modal-footer">
                    <button
                        @click="refuse"
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >
                        Ho cambiato idea
                    </button>
                    <button
                        @click="accept"
                        type="button"
                        class="btn btn-primary"
                    >
                        Crea nuovo carrello
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
    methods: {
        accept() {
            this.$emit("modal-click", 1);
        },
        refuse() {
            this.$emit("modal-click", 0);
        },
    },
    created() {
        console.log("Modal mounted...");
    },
};
</script>

<style></style>
