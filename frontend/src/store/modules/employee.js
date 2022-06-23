import axios from "axios";

export default {
  actions: {
    async getEmployees(ctx) {
      const res = await axios.get("http://localhost:8081/api/employees");
      const employees = await res.data.data;

      ctx.commit('updateEmployees', employees);
    },
    deleteEmployee(ctx, payload) {
      axios.delete("http://localhost:8081/api/employees/" + payload.employeeId);
      ctx.commit('deleteEmployee', payload.index);
    }
  },
  mutations: {
    updateEmployees(state, employees) {
      state.employees = employees;
    },
    deleteEmployee: function (state, index) {
      state.employees.splice(index, 1);
    }
  },
  state: {
    employees: []
  },
  getters: {
    allEmployees(state) {
      return state.employees;
    }
  },
}
