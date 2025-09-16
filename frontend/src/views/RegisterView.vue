<script setup>
import { ref, onUnmounted } from 'vue';
import { RouterLink } from 'vue-router';
import { useAuthStore } from '@/stores/auth';

const authStore = useAuthStore();
const name = ref('');
const email = ref('');
const password = ref('');
const password_confirmation = ref('');

const handleRegister = async () => {
  await authStore.handleRegister({
    name: name.value,
    email: email.value,
    password: password.value,
    password_confirmation: password_confirmation.value,
  });
};

// Clear errors when the component is left so they don't persist
onUnmounted(() => {
    authStore.errors = {};
});
</script>

<template>
  <div class="flex items-center justify-center min-h-[calc(100vh-160px)] bg-gray-50 p-4">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-2xl shadow-lg border border-gray-200">
       <div class="text-center">
         <img
          class="mx-auto h-12 w-auto"
          src="@/assets/logo.png"
          alt="Zepay Suraksha"
        />
        <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">
          Create a new account
        </h2>
         <p class="mt-2 text-sm text-gray-600">
          Or
          <RouterLink
            :to="{ name: 'login' }"
            class="font-medium text-blue-600 hover:text-blue-500"
            >sign in to your existing account</RouterLink
          >
        </p>
      </div>

      <form @submit.prevent="handleRegister" class="space-y-6">
         <div
          v-if="authStore.errors.general"
          class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4"
          role="alert"
        >
          <p>{{ authStore.errors.general[0] }}</p>
        </div>

        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
          <div class="mt-1">
            <input
              v-model="name"
              id="name"
              name="name"
              type="text"
              required
              class="w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
              :class="{'border-red-500': authStore.errors.name}"
            />
            <div v-if="authStore.errors.name" class="text-red-600 text-sm mt-1">
              {{ authStore.errors.name[0] }}
            </div>
          </div>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
          <div class="mt-1">
            <input
              v-model="email"
              id="email"
              name="email"
              type="email"
              required
              class="w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
              :class="{'border-red-500': authStore.errors.email}"
            />
            <div v-if="authStore.errors.email" class="text-red-600 text-sm mt-1">
              {{ authStore.errors.email[0] }}
            </div>
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <div class="mt-1">
            <input
              v-model="password"
              id="password"
              name="password"
              type="password"
              required
              class="w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
              :class="{'border-red-500': authStore.errors.password}"
            />
            <div
              v-if="authStore.errors.password"
              class="text-red-600 text-sm mt-1"
            >
              {{ authStore.errors.password[0] }}
            </div>
          </div>
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <div class="mt-1">
            <input
              v-model="password_confirmation"
              id="password_confirmation"
              name="password_confirmation"
              type="password"
              required
              class="w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
            />
          </div>
        </div>

        <div>
          <button
            type="submit"
            :disabled="authStore.loading"
            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:bg-indigo-400 disabled:cursor-not-allowed transition-colors"
          >
            <span v-if="authStore.loading">Creating Account...</span>
            <span v-else>Register</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</template>