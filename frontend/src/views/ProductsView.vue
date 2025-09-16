<script setup>
import { onMounted, computed, ref } from 'vue';
import { RouterLink } from 'vue-router';
import { useProductStore } from '@/stores/products';
import {
  ShieldCheck,
  HeartPulse,
  Stethoscope,
  Car,
  Bike,
  Plane,
  Briefcase,
  Building,
  Users,
  Baby,
  RefreshCw,
  HandCoins,
  Landmark,
  Umbrella,
} from 'lucide-vue-next';

const productStore = useProductStore();

// A helper to map category names from the DB to the icon components
const iconMap = {
  'Term Life Insurance': ShieldCheck,
  'Health Insurance': HeartPulse,
  'Critical Illness': Stethoscope,
  'Motor Insurance': Car,
  '2 Wheeler Insurance': Bike,
  'Travel Insurance': Plane,
  'Investment Plans': HandCoins,
  'Retirement Plans': Landmark,
  'Child Savings Plans': Baby,
  "Women's Term Plan": ShieldCheck,
  'Return of Premium': RefreshCw,
  'Guaranteed Returns': HandCoins,
  'Group Health': Users,
  'Commercial Vehicle': Building,
  'Home Insurance': Umbrella,
  'Business Insurance': Briefcase,
};

// --- NEW FILTER LOGIC ---
// Refs for filter selections
const selectedCategory = ref('');
const selectedProvider = ref('');

// Computed properties to get unique categories and providers for dropdowns
const uniqueCategories = computed(() => {
  if (!productStore.allProducts) return [];
  const categories = productStore.allProducts.map((p) => p.category);
  return [...new Set(categories)].sort();
});

const uniqueProviders = computed(() => {
  if (!productStore.allProducts) return [];
  const providers = productStore.allProducts.map((p) => p.provider);
  return [...new Set(providers)].sort();
});

// Function to apply filters and fetch new data
const applyFilters = () => {
  const filters = {
    category: selectedCategory.value,
    provider: selectedProvider.value,
  };
  productStore.fetchProducts(filters);
};
// --- END NEW FILTER LOGIC ---

// Fetch all products on component mount to populate filters and the initial list
onMounted(() => {
  productStore.fetchAllProductsForFilters(); // Gets all products once for filter dropdowns
  productStore.fetchProducts(); // Initial fetch for the main list
});
</script>

<template>
  <div class="bg-gray-50 py-16 sm:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h1
          class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight"
        >
          Our Complete Range of Insurance Products
        </h1>
        <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
          Find the perfect plan tailored to your needs. We are committed to
          securing every aspect of your life.
        </p>
      </div>

      <div
        class="bg-white p-6 rounded-lg shadow-md my-12 flex flex-col sm:flex-row gap-4 max-w-4xl mx-auto"
      >
        <div class="flex-1">
          <label
            for="category"
            class="block text-sm font-medium text-gray-700"
            >Filter by Category</label
          >
          <select
            id="category"
            v-model="selectedCategory"
            @change="applyFilters"
            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
          >
            <option value="">All Categories</option>
            <option
              v-for="category in uniqueCategories"
              :key="category"
              :value="category"
            >
              {{ category }}
            </option>
          </select>
        </div>
        <div class="flex-1">
          <label
            for="provider"
            class="block text-sm font-medium text-gray-700"
            >Filter by Provider</label
          >
          <select
            id="provider"
            v-model="selectedProvider"
            @change="applyFilters"
            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
          >
            <option value="">All Providers</option>
            <option
              v-for="provider in uniqueProviders"
              :key="provider"
              :value="provider"
            >
              {{ provider }}
            </option>
          </select>
        </div>
      </div>
      <div v-if="productStore.loading" class="text-center mt-16">
        <p class="text-xl">Loading Products...</p>
      </div>
      <div
        v-else-if="!productStore.loading && productStore.products.length > 0"
        class="mt-16 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8"
      >
        <RouterLink
          v-for="product in productStore.products"
          :key="product.id"
          :to="{ name: 'product-detail', params: { slug: product.slug } }"
          class="group bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col items-center text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300"
        >
          <div
            class="bg-zepay-green-100 text-zepay-green-600 rounded-full p-4 mb-4"
          >
            <component :is="iconMap[product.category] || ShieldCheck" :size="32" />
          </div>
          <h3 class="font-semibold text-gray-800">{{ product.name }}</h3>
          <p class="text-sm text-gray-500">{{ product.category }}</p>
        </RouterLink>
      </div>
       <div v-else class="text-center bg-white p-8 rounded-lg shadow-md mt-16 max-w-xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-700">No Products Found</h2>
        <p class="text-gray-500 mt-2">
          Please adjust your filters or check back later.
        </p>
      </div>
    </div>
  </div>
</template>