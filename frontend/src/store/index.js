import Vue from 'vue'
import Vuex from 'vuex'
import employee from "@/store/modules/employee";

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    employee
  }
})
