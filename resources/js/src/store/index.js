import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
 state: {
     searchInput: '',
     selection: [],
 },
 getters: {},
 mutations: {
     changeSearchInput (state, payload){
         state.searchInput = payload;
     },
     changeSelection (state, payload){
         console.log('Changing selection...');
         state.selection = payload;

     }
 },
 actions: {}
});