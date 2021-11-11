import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
 state: {
     searchInput: '',
 },
 getters: {},
 mutations: {
     changeSearchInput (state, payload){
         state.searchInput = payload;
     }
 },
 actions: {}
});