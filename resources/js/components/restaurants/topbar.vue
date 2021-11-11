<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <a class="navbar-brand" href="#">LogoDeliveboo</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0 mx-auto">
                <input
                    class="form-control mr-sm-2"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                    v-model="searchInput"
                />
                <button
                    @click="launchSearch"
                    class="btn btn-outline-success my-2 my-sm-0"
                    type="submit"
                >
                    Search
                </button>
            </form>
        </div>
        <div class="button-container">
            <button type="button" class="btn btn-primary">Carrello</button>
        </div>
    </nav>
</template>

<script>
export default {
    name: "Topbar",
    data() {
        return { searchInput: "" };
    },
    methods: {
        startSearch() {
            console.log("Starting search...");
        },
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
<style></style>
