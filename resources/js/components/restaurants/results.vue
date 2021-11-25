<template>
    <div id="results" class="container-fluid">
        <div class="row">
            <h3 class="my-3">Risultati della ricerca:</h3>
        </div>
        <Loader v-if="isLoading" />
        <div class="row">
            <restaurantcard
                v-for="(restaurant, i) in restaurants"
                :key="i"
                :restaurant="restaurants[i]"
            />
        </div>
    </div>
</template>

<script>
import restaurantcard from "./restaurantcard.vue";
import { eventBus } from "../../../js/app";
export default {
    components: { restaurantcard },
    name: "Results",
    data() {
        return {
            baseUri: "http://127.0.0.1:8000",
            restaurants: [],
            isLoading: false,
        };
    },
    methods: {
        // Fetch restaurants with an API call
        getRestaurants() {
            this.isLoading = true;
            // Azzero restaurants per far ricomparire il loader e far scomparire i vecchi risultati
            this.restaurants = [];

            //! caso: ricerca vuota e nessuna categoria selezionata
            if (this.$store.state.selection.length == 0) {
                console.log("Fetching ALL restaurants...");
                axios
                    .get(`${this.baseUri}/api/restaurants`)
                    .then((r) => {
                        const data = r.data;
                        this.restaurants = data;
                        console.log(data);
                        if (this.$store.state.searchInput != "") {
                            this.restaurants = this.filterByName(data);
                        }
                        this.isLoading = false;
                    })
                    .catch((e) => {
                        console.error(e);
                    });
            }

            //! caso categorie selezionata
            else {
                const selection = this.$store.state.selection;
                const baseUri = this.baseUri;
                //# variabile d'appoggio
                let verifiedRestaurants = [];
                // inizio a ciclare su ogni tipo
                selection.forEach((type) => {
                    // fetchare tutti i ristoranti per quel tipo
                    console.log(`Fetching restaurants with type_id: ${type}`);
                    async function resolveId() {
                        let r = await axios.get(`${baseUri}/api/types/${type}`);
                        return r.data;
                    }

                    resolveId().then((data) => {
                        //# ciclare su questi ristoranti, se non già presenti nell' array, pushare in variabile d'appoggio
                        console.log("ATTEMPTING TO CYCLE THROUGH DATA");
                        data.forEach((o) => {
                            verifiedRestaurants.push(o);
                        });
                        //???
                        verifiedRestaurants = this.getUniqueListBy(
                            verifiedRestaurants,
                            "id"
                        );
                        console.log("Finished Filtering");
                        console.log(verifiedRestaurants);
                        if (this.$store.state.searchInput != "") {
                            this.restaurants =
                                this.filterByName(verifiedRestaurants);
                        } else {
                            this.restaurants = verifiedRestaurants;
                        }
                        this.isLoading = false;
                    });
                });
            }
        },
        getUniqueListBy(myArr, prop) {
            return myArr.filter((obj, pos, arr) => {
                return (
                    arr.map((mapObj) => mapObj[prop]).indexOf(obj[prop]) === pos
                );
            });
        },
        filterByName(arr) {
            let searchInput = this.$store.state.searchInput.trim();
            let x = arr.filter((x) => {
                return x.name.toLowerCase().trim().includes(searchInput);
            });
            console.log(x);
            return x;
        },
    },
    created() {
        this.getRestaurants();
        eventBus.$on("startSearch", () => {
            this.getRestaurants();
        });
    },
};
</script>

<style lang="scss" scoped>
#results {
    padding-top: 120px;
}
</style>
