<template>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <a class="navbar-brand d-flex align-items-center" href="/home">
            <img
                src="/images/logo-small.png "
                width="40"
                height="40"
                class="d-inline-block align-top"
                alt="Logo"
            />
            <strong class="mx-1 text-logo">Deliveboo</strong>
        </a>
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
                    @keydown.enter.prevent="startSearch"
                />
                <button
                    @click="startSearch"
                    class="btn my-2 my-sm-0"
                    type="button"
                >
                    Search
                </button>
            </form>
        </div>
        <div class="button-container">
            <button @click="goToRestaurant" type="button" class="btn">
                Carrello
            </button>
        </div>
    </nav>
</template>

<script>
import { eventBus } from "../../../js/app";
export default {
    name: "Searchbar",
    data() {
        return { searchInput: "" };
    },
    methods: {
        startSearch() {
            console.log("Starting search...");
            this.$store.commit("changeSearchInput", this.searchInput);
            eventBus.$emit("startSearch");
        },
        goToRestaurant() {
            const currentCart = JSON.parse(sessionStorage.getItem("cart"));
            let openSessionId = currentCart.restaurantID;
            if (openSessionId) {
                window.location.href = `http://127.0.0.1:8000/restaurants/${openSessionId}`;
            }
        },
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
<style lang="scss" scoped>
nav {
    padding: 10px 40px;
    height: 90px;
    background-color: rgba(0, 204, 188, 1);
}
form {
    display: flex;
    input[type="search"] {
        margin-right: 5px;
        border: 2px solid #00aabc;
    }
    button[type="button"] {
        background-color: #00bbbb;
        color: white;
    }
}
button[type="button"] {
    width: 100px;
    height: 50px;
    background-color: #00bb55;
    color: white;
    font-size: 1rem;
    font-weight: bold;
}
</style>
