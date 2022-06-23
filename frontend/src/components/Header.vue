<template>
  <header class="bg-indigo-600">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
      <div class="w-full py-6 flex items-center justify-between border-b border-indigo-500 lg:border-none">
        <div class="flex items-center">
          <router-link to="/" href="#">
            <img class="h-10 w-auto" src="https://mello.gg/img/svg/logo.svg">
          </router-link>
          <div class="hidden ml-10 space-x-8 lg:block">
            <router-link to="/employees" class="text-base font-medium text-white hover:text-indigo-50">
              Employees
            </router-link>
          </div>
        </div>
      </div>
      <div class="py-4 flex flex-wrap justify-center space-x-6 lg:hidden">
        <router-link to="/" class="text-base font-medium text-white hover:text-indigo-50">
          Home
        </router-link>

        <router-link to="/employees" class="text-base font-medium text-white hover:text-indigo-50">
          Employees
        </router-link>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'Header'
}
</script>
