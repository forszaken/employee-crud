<template>
  <div>
    <Header/>

    <div class="container m-auto mt-6">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <h1 class="text-xl font-semibold text-gray-900">
            Employees
          </h1>
          <p class="mt-2 text-sm text-gray-700">A list of all the employees.</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
          <router-link to="/employees/create" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
            Add employee
          </router-link>
        </div>
      </div>
      <div class="-mx-4 mt-8 overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:-mx-6 md:mx-0 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
          <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Salary</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Phone</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Company</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
          </thead>

          <Employee/>

        </table>
      </div>
    </div>
  </div>
</template>

<script>
import Employee from "@/components/employees/Employee";
import Header from "@/components/Header";
export default {
  name: "EmployeeList",
  components: {Header, Employee}
}
</script>
