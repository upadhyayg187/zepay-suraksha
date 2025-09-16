import { defineStore } from 'pinia';
import { ref, computed } from 'vue';
import api from '@/services/api';
import router from '@/router';

export const useAuthStore = defineStore('auth', () => {
    // --- STATE ---
    // Get user and token from localStorage for session persistence
    const user = ref(JSON.parse(localStorage.getItem('user')) || null);
    const token = ref(localStorage.getItem('token') || null);
    const errors = ref({}); // Holds validation or other errors
    const loading = ref(false); // Tracks loading state for UI feedback

    // --- GETTERS ---
    const isAuthenticated = computed(() => !!user.value && !!token.value);
    const userName = computed(() => user.value?.name || 'Guest');

    // --- ACTIONS ---

    /**
     * Sets user and token in state and localStorage.
     * Also sets the Authorization header for future API requests.
     */
    function setAuthData(userData, userToken) {
        user.value = userData;
        token.value = userToken;
        localStorage.setItem('user', JSON.stringify(userData));
        localStorage.setItem('token', userToken);
        api.defaults.headers.common['Authorization'] = `Bearer ${userToken}`;
    }

    /**
     * Clears user and token from state and localStorage.
     * Removes the Authorization header.
     */
    function clearAuthData() {
        user.value = null;
        token.value = null;
        localStorage.removeItem('user');
        localStorage.removeItem('token');
        delete api.defaults.headers.common['Authorization'];
    }

    /**
     * Handles the login process.
     */
    async function handleLogin(credentials) {
        loading.value = true;
        errors.value = {};
        try {
            await api.get('/sanctum/csrf-cookie');
            const response = await api.post('/login', credentials);
            
            // Laravel Sanctum returns the user and token in the response data
            const responseUser = response.data.user;
            const responseToken = response.data.token;

            if (responseUser && responseToken) {
                setAuthData(responseUser, responseToken);
                await router.push({ name: 'home' });
            } else {
                // Handle cases where login succeeds but data is missing
                 errors.value = { general: ['Authentication failed. Please try again.'] };
            }

        } catch (error) {
            if (error.response && error.response.status === 422) {
                // Catches validation errors from Laravel
                errors.value = error.response.data.errors;
            } else {
                // Catches general errors like incorrect credentials (401)
                errors.value = { general: ['The provided credentials do not match our records.'] };
            }
        } finally {
            loading.value = false;
        }
    }

    /**
     * Handles the registration process.
     */
    async function handleRegister(newUser) {
        loading.value = true;
        errors.value = {};
        try {
            await api.get('/sanctum/csrf-cookie');
            const response = await api.post('/register', newUser);
            
            const responseUser = response.data.user;
            const responseToken = response.data.token;

            if (responseUser && responseToken) {
                setAuthData(responseUser, responseToken);
                await router.push({ name: 'home' });
            } else {
                 errors.value = { general: ['Registration failed. Please try again.'] };
            }

        } catch (error) {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            } else {
                errors.value = { general: ['An unexpected error occurred. Please try again.'] };
            }
        } finally {
            loading.value = false;
        }
    }

    /**
     * Handles the logout process.
     */
    async function handleLogout() {
        loading.value = true;
        try {
            await api.post('/logout');
        } catch (error) {
            console.error('Logout API call failed, but logging out client-side anyway:', error);
        } finally {
            clearAuthData();
            await router.push({ name: 'login' });
            loading.value = false;
        }
    }

    // Return all state, getters, and actions
    return {
        user,
        token,
        errors,
        loading,
        isAuthenticated,
        userName,
        handleLogin,
        handleRegister,
        handleLogout,
    };
});