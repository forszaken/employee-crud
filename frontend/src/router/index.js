import Vue from 'vue'
import VueRouter from 'vue-router'
import EmployeesList from "@/views/employees/EmployeesList";
import EmployeeCreate from "@/components/employees/EmployeeCreate";
import EmployeeUpdate from "@/components/employees/EmployeeUpdate";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'employees',
    component: EmployeesList
  },
  {
    path: '/employees/create',
    name: 'employees.create',
    component: EmployeeCreate
  },
  {
    path: '/employees/update/:id',
    name: 'employees.update',
    component: EmployeeUpdate
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
