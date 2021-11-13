<template>
    <div class="container-fluid">
        <div class="row">
            <h4>This is the sidebar component :)</h4>
        </div>
        <div class="row">Order by (menù dropdown):</div>
        <div class="row">
            Regimi alimentari:
            <div>
                <ul>
                    <li>gluten free</li>
                    <li>surgelato</li>
                    <li>vegano</li>
                    <li>vegetariano</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div>Categorie:</div>
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
    },
    mounted() {
        console.log("Component mounted.");
        this.getTypes();
    },
};
</script>
<style></style>
