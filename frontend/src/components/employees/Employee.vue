<template>
  <tbody class="divide-y divide-gray-200 bg-white">
    <tr v-for="(employee, index) in allEmployees" :key="employee.id" class="text-left">
      <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
        {{employee.name}}
      </td>
      <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell">
        {{employee.salary}}
      </td>
      <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 lg:table-cell">
        {{employee.phone}}
      </td>
      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        {{employee.company}}
      </td>
      <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
        <router-link :to="{name: 'employees.update', params: { id: employee.uuid}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          Update
        </router-link>

        <button @click="deleteEmployee(employee.uuid, index)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
          Delete
        </button>
      </td>
    </tr>
  </tbody>
</template>


<script>
import {mapGetters, mapActions} from "vuex";

export default {
  name: "Employee",
  components: {},
  computed: mapGetters(["allEmployees"]),
  mounted() {
    this.getEmployees();
  },
  methods: {
    ...mapActions(["getEmployees"]),
    deleteEmployee(employeeId, index) {
      this.$store.dispatch('deleteEmployee', {
        employeeId,
        index
      });
    }
  },

}
</script>
