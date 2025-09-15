import { defineStore } from 'pinia';
import { ref } from 'vue';
import api from '@/services/api';

export const useProductStore = defineStore('products', () => {
    // State
    const products = ref([]);
    const currentProduct = ref(null);
    const loading = ref(false);

    // Actions
    async function fetchProducts() {
        loading.value = true;
        try {
            const { data } = await api.get('/api/products');
            products.value = data;
        } catch (error) {
            console.error('Failed to fetch products:', error);
            // You could add user-facing error handling here
        } finally {
            loading.value = false;
        }
    }

    async function fetchProductBySlug(slug) {
        loading.value = true;
        currentProduct.value = null; // Reset on new fetch
        try {
            const { data } = await api.get(`/api/products/${slug}`);
            currentProduct.value = data;
        } catch (error) {
            console.error(`Failed to fetch product with slug ${slug}:`, error);
             // You could add user-facing error handling here
        } finally {
            loading.value = false;
        }
    }

    return {
        products,
        currentProduct,
        loading,
        fetchProducts,
        fetchProductBySlug,
    };
});