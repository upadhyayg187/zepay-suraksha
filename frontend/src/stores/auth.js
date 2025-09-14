import { defineStore } from 'pinia';
import { ref, computed } from 'vue';
import api, { getCsrfCookie } from '@/services/api';
import router from '@/router';

export const useAuthStore = defineStore('auth', () => {
    // State
    const user = ref(null);

    // Getters
    const isAuthenticated = computed(() => !!user.value);
    const userName = computed(() => user.value?.name || 'Guest');

    // Actions
    async function fetchUser() {
        try {
            const { data } = await api.get('/api/user');
            user.value = data;
        } catch (error) {
            user.value = null;
        }
    }

    async function handleLogin(credentials) {
        await getCsrfCookie();
        try {
            await api.post('/login', credentials);
            await fetchUser();
            router.push('/'); // Redirect to home on successful login
        } catch (error) {
            console.error('Login failed:', error);
            // You can add logic here to show an error message to the user
            throw error;
        }
    }

    async function handleRegister(newUser) {
        await getCsrfCookie();
        try {
            await api.post('/register', newUser);
            // After successful registration, log them in
            await handleLogin({ email: newUser.email, password: newUser.password });
        } catch (error) {
            console.error('Registration failed:', error);
            throw error;
        }
    }

    async function handleLogout() {
        try {
            await api.post('/logout');
            user.value = null;
            router.push('/login');
        } catch (error) {
            console.error('Logout failed:', error);
        }
    }

    return {
        user,
        isAuthenticated,
        userName,
        fetchUser,
        handleLogin,
        handleRegister,
        handleLogout,
    };
});

