<template>
    <div class="container-fluid">
        <searchbar v-on:startSearch="startSearch" />
        <div id="bg-layer" class="row">
            <div id="sidebar-menu" class="col-4 col-md-3 col-lg-2">
                <sidebar v-on:sendSelection="gatherSelection" />
            </div>
            <div id="main-section" class="col-8 col-md-9 col-lg-10">
                <results />
            </div>
        </div>
    </div>
</template>

<script>
import searchbar from "./searchbar.vue";
import restaurantcard from "./restaurantcard.vue";
import sidebar from "./sidebar.vue";
export default {
    components: { searchbar, sidebar, restaurantcard },
    name: "RestaurantIndex",
    data() {
        return {
            searchInput: "",
            categorySelection: [],
        };
    },
    methods: {
        startSearch(searchInput) {
            console.log("Emit received...");
            console.log(`${searchInput}`);
            this.searchInput = searchInput;
        },
        gatherSelection(categories) {
            console.log("Emit received...");
            console.log(`${categories}`);
            this.categorySelection = categories;
        },
    },
};
</script>

<style></style>
