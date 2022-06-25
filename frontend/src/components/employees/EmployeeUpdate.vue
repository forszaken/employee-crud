<template>
  <div>
    <Header/>
    <div class="container m-auto mt-6">
      <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
              <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="submit">
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label for="name" class="block text-sm font-medium text-gray-700">
                        Name
                      </label>
                      <input v-model="employee.name" type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                      <div v-if="errors && errors.name" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        {{errors.name[0]}}
                      </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="surname" class="block text-sm font-medium text-gray-700">
                        Surname
                      </label>
                      <input v-model="employee.surname" type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                      <div v-if="errors && errors.surname" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        {{errors.surname[0]}}
                      </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="patronymic" class="block text-sm font-medium text-gray-700">
                        Patronymic
                      </label>
                      <input v-model="employee.patronymic" type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                      <div v-if="errors && errors.patronymic" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        {{errors.patronymic[0]}}
                      </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="salary" class="block text-sm font-medium text-gray-700">
                        Salary
                      </label>
                      <input v-model="employee.salary" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <div v-if="errors && errors.salary" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        {{errors.salary[0]}}
                      </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="company" class="block text-sm font-medium text-gray-700">
                        Company
                      </label>
                      <input v-model="employee.company" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <div v-if="errors && errors.company" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        {{errors.company[0]}}
                      </div>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                      <label for="phone" class="block text-sm font-medium text-gray-700">
                        Phone
                      </label>
                      <input v-model="employee.phone" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      <div v-if="errors && errors.phone" class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        {{errors.phone[0]}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Header from "@/components/Header";
export default {
  components: {Header},
  data() {
    return {
      employee: {
        name: '',
        surname: '',
        patronymic: '',
        salary: '',
        phone: '',
        company: ''
      },
      errors: {}
    }
  },
  mounted() {
    axios.get('http://localhost:8081/api/employees/' + this.$route.params.id)
      .then(response => {
        this.employee = response.data.data;
      })
  },
  methods: {
    submit() {
      axios.put('http://localhost:8081/api/employees/' + this.$route.params.id, this.employee)
        .then(response => {
          this.$router.push('/');
        }).catch(error => {
        if(error.response.status === 422) {
          this.errors = error.response.data.errors;
        }
      })
    }
  }
}
</script>

<style scoped>
input {
  display: block;
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 2px;
  padding: 10px;
  margin-bottom: 10px;
}
</style>
