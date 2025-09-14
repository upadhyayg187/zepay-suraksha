<script setup>
import { ref } from 'vue'
import { useAuthStore } from '@/stores/auth'
import { RouterLink } from 'vue-router'

const authStore = useAuthStore()
const form = ref({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})
</script>

<template>
  <div class="min-h-[calc(100vh-128px)] bg-gray-50 flex">
    <!-- Left Panel with Background -->
    <div class="hidden lg:flex w-1/2 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1581094483812-a85973468574?q=80&w=2070&auto=format&fit=crop');">
      <div class="w-full h-full bg-zepay-green/90 text-white p-12 flex flex-col justify-center items-start">
        <img src="@/assets/logo.png" alt="Zepay Suraksha Logo" class="w-48 mb-8" />
        <h1 class="text-4xl font-bold mb-4">Join Zepay Suraksha</h1>
        <p class="text-lg text-green-100">
            Create an account to unlock instant quotes, easy policy management, and a seamless insurance experience. Let's secure your future, together.
        </p>
      </div>
    </div>

    <!-- Right Panel (Form) -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12">
      <div class="w-full max-w-md">
        <img src="@/assets/logo.png" alt="Zepay Suraksha" class="lg:hidden w-32 mx-auto mb-6" />
        <h2 class="text-3xl font-bold text-gray-800 mb-2 text-center lg:text-left">
          Create a new account
        </h2>
        <p class="text-gray-600 mb-8 text-center lg:text-left">
            Already have an account?
            <RouterLink to="/login" class="font-medium text-zepay-green hover:underline">Login here</RouterLink>
        </p>
        
        <form class="space-y-4" @submit.prevent="authStore.register(form)">
          <div>
            <label for="full-name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <div class="mt-1">
              <input v-model="form.name" id="full-name" name="name" type="text" required
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-zepay-blue focus:border-zepay-blue sm:text-sm" />
              <div v-if="authStore.authErrors?.name" class="text-red-500 text-sm mt-1">
                {{ authStore.authErrors.name[0] }}
              </div>
            </div>
          </div>

          <div>
            <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
            <div class="mt-1">
              <input v-model="form.email" id="email-address" name="email" type="email" autocomplete="email" required
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-zepay-blue focus:border-zepay-blue sm:text-sm" />
               <div v-if="authStore.authErrors?.email" class="text-red-500 text-sm mt-1">
                {{ authStore.authErrors.email[0] }}
              </div>
            </div>
          </div>

          <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <div class="mt-1">
              <input v-model="form.password" id="password" name="password" type="password" autocomplete="new-password" required
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-zepay-blue focus:border-zepay-blue sm:text-sm" />
              <div v-if="authStore.authErrors?.password" class="text-red-500 text-sm mt-1">
                {{ authStore.authErrors.password[0] }}
              </div>
            </div>
          </div>

          <div>
            <label for="password-confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <div class="mt-1">
              <input v-model="form.password_confirmation" id="password-confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
                class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-zepay-blue focus:border-zepay-blue sm:text-sm" />
            </div>
          </div>

          <div>
            <button type="submit"
              class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-zepay-blue hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-zepay-blue">
              Create Account
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

