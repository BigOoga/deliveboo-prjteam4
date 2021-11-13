<template>
    <div class="container-fluid">
        <div class="row">
            <h4>This is the sidebar component :)</h4>
        </div>

        <div class="row">
            <div class="col-12">Categorie:</div>
            <div>
                <div v-for="(type, i) in types" :key="i">
                    <label :for="type.name">{{ type.name }}</label>
                    <input
                        type="checkbox"
                        :name="type.name"
                        :id="type.name"
                        v-model="selection"
                        :value="type.id"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { eventBus } from "../../../js/app";
export default {
    name: "Sidebar",
    data() {
        return {
            baseUri: "http://127.0.0.1:8000",
            types: [],
            selection: [],
        };
    },
    methods: {
        getTypes() {
            console.log(`Fetching all types from API...`);
            axios
                .get(`${this.baseUri}/api/types`)
                .then((r) => {
                    const data = r.data;
                    this.types = data;
                })
                .catch((e) => {
                    console.error(e);
                });
        },
        // sends selection to searchbar when requested
        sendSelection() {
            this.$store.commit("changeSelection", this.selection);
        },
    },
    mounted() {
        console.log("Component mounted.");
        this.getTypes();
        eventBus.$on("requestSelection", () => {
            this.sendSelection();
        });
    },
};
</script>
<style></style>
