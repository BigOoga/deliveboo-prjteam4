<template>
    <div id="sidebar" class="row">
        <div class="col-12">
            <h4>Categorie:</h4>
            <div>
                <div v-for="(type, i) in types" :key="i">
                    <input
                        type="checkbox"
                        :name="type.name"
                        :id="type.name"
                        v-model="selection"
                        :value="type.id"
                        @change="startSearch"
                    />
                    <label :for="type.name">{{ type.name }}</label>
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
        // sends selection to vuex and starts search
        startSearch() {
            this.$store.commit("changeSelection", this.selection);
            eventBus.$emit("startSearch");
        },
        initBar() {
            let params = new URL(document.location).searchParams;
            let category = params.get("category");
            if (category) {
                this.selection.push(category);
            }
            this.$store.commit("changeSelection", this.selection);
            eventBus.$emit("startSearch");
        },
    },
    mounted() {
        console.log("Component mounted.");
        this.getTypes();
        this.initBar();
        eventBus.$on("requestSelection", () => {
            this.sendSelection();
        });
    },
};
</script>
<style lang="scss" scoped>
h4 {
    margin-bottom: 20px;
    font-weight: bold;
}
#sidebar {
    position: fixed;
    width: 200px;
    height: 100vh;
    left: 0;
    padding: 120px 0 0 40px;
    background-color: transparent;
}
input[type="checkbox"] {
    margin-right: 5px;
    margin-bottom: 5px;
}
</style>
