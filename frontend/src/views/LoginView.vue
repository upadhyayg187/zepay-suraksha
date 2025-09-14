<script setup>
import { ref } from 'vue'
import { useAuthStore } from '@/stores/auth'
import { RouterLink } from 'vue-router'

const authStore = useAuthStore()
const form = ref({
  email: '',
  password: '',
})
</script>

<template>
  <div class="min-h-[calc(100vh-128px)] bg-gray-50 flex">
    <!-- Left Panel with Background -->
    <div class="hidden lg:flex w-1/2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1556740738-b6a63e2775d2?q=80&w=2070&auto=format&fit=crop');">
      <div class="w-full h-full bg-zepay-blue/90 text-white p-12 flex flex-col justify-center items-start">
        <img src="@/assets/logo.png" alt="Zepay Suraksha Logo" class="w-48 mb-8" />
        <h1 class="text-4xl font-bold mb-4">Welcome Back</h1>
        <p class="text-lg text-blue-200">
            Sign in to manage your policies, compare new quotes, and access exclusive benefits. Your security is our priority.
        </p>
      </div>
    </div>

    <!-- Right Panel (Form) -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12">
      <div class="w-full max-w-md">
        <img src="@/assets/logo.png" alt="Zepay Suraksha" class="lg:hidden w-32 mx-auto mb-6" />
        <h2 class="text-3xl font-bold text-gray-800 mb-2 text-center lg:text-left">
          Login to your account
        </h2>
        <p class="text-gray-600 mb-8 text-center lg:text-left">
            Don't have an account? 
            <RouterLink to="/register" class="font-medium text-zepay-green hover:underline">Register here</RouterLink>
        </p>
        
        <form class="space-y-6" @submit.prevent="authStore.login(form)">
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
            <div class="mt-1">
              <input v-model="form.email" id="email" name="email" type="email" autocomplete="email" required
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-zepay-blue focus:border-zepay-blue sm:text-sm" />
              <div v-if="authStore.authErrors?.email" class="text-red-500 text-sm mt-1">
                {{ authStore.authErrors.email[0] }}
              </div>
            </div>
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="mt-1">
              <input v-model="form.password" id="password" name="password" type="password"
                autocomplete="current-password" required
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-zepay-blue focus:border-zepay-blue sm:text-sm" />
            </div>
          </div>

          <div>
            <button type="submit"
              class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-zepay-blue hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-zepay-blue">
              Sign In
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

