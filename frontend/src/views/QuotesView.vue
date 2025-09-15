<script setup>
import { ref, onMounted, computed } from 'vue';
import { useRoute, RouterLink } from 'vue-router';
import { useProductStore } from '@/stores/products';
import { ShieldCheck, Car, HeartPulse, Plane, AlertCircle } from 'lucide-vue-next';

const route = useRoute();
const productStore = useProductStore();

const searchType = ref(route.query.type || 'Unknown');
const searchInput = ref(route.query.input || '');

onMounted(() => {
  productStore.fetchProducts();
});

const filteredProducts = computed(() => {
  if (!searchType.value || productStore.products.length === 0) {
    return [];
  }
  
  const categoryMap = {
    'Car': 'Motor Insurance',
    'Bike': 'Motor Insurance',
    'Commercial': 'Motor Insurance',
    'Health': 'Health Insurance',
    'Term Life': 'Term Life Insurance',
    'Travel': 'Travel Insurance',
  };

  const targetCategory = categoryMap[searchType.value];
  if (!targetCategory) return [];

  return productStore.products.filter(p => p.category === targetCategory);
});

const iconMap = {
    'Term Life Insurance': ShieldCheck,
    'Health Insurance': HeartPulse,
    'Motor Insurance': Car,
    'Travel Insurance': Plane,
};
</script>

<template>
  <div class="bg-gray-50 py-12 sm:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">
          Insurance Quotes
        </h1>
        <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
          Showing results for <span class="font-semibold text-zepay-blue">{{ searchType }} Insurance</span>
          <span v-if="searchInput"> for "{{ searchInput }}"</span>.
        </p>
      </div>

      <div v-if="productStore.loading" class="text-center mt-12">
        <p class="text-xl text-gray-600">Finding the best quotes for you...</p>
      </div>
      
      <div v-else-if="filteredProducts.length > 0" class="mt-12 space-y-6">
        <div v-for="product in filteredProducts" :key="product.id" class="bg-white rounded-xl shadow-md border border-gray-200 p-6 flex flex-col md:flex-row items-center hover:shadow-lg transition-shadow duration-300">
          <div class="flex items-center w-full md:w-1/3 lg:w-1/4">
            <div class="bg-zepay-green/10 p-4 rounded-full">
              <component :is="iconMap[product.category] || ShieldCheck" class="h-8 w-8 text-zepay-green" />
            </div>
            <div class="ml-4 text-left">
              <h3 class="text-lg font-semibold text-gray-800">{{ product.name }}</h3>
              <p class="text-sm text-gray-500">{{ product.provider }}</p>
            </div>
          </div>
          <div class="w-full md:w-2/3 lg:w-3/4 flex flex-col md:flex-row items-center justify-between mt-6 md:mt-0">
             <ul class="flex-1 space-y-2 text-left text-sm text-gray-700 w-full md:w-auto">
                <li v-for="feature in product.features" :key="feature" class="flex items-center">
                    <ShieldCheck class="h-4 w-4 mr-2 text-green-500 flex-shrink-0" />
                    <span>{{ feature }}</span>
                </li>
             </ul>
             <div class="text-center md:text-right mt-6 md:mt-0 md:ml-6 flex-shrink-0 w-full md:w-48">
                <p class="text-sm text-gray-500">Premium Starts At</p>
                <p class="text-3xl font-bold text-gray-900">₹{{ product.base_premium.toLocaleString('en-IN') }}</p>
                <RouterLink :to="{ name: 'product-detail', params: { slug: product.slug } }" class="mt-3 block w-full bg-zepay-blue text-white font-semibold py-2.5 px-6 rounded-lg shadow-md hover:opacity-90 transition-transform transform hover:scale-105">
                    View Details
                </RouterLink>
             </div>
          </div>
        </div>
      </div>

      <div v-else class="text-center mt-12 bg-white p-12 rounded-lg shadow-sm">
         <AlertCircle class="mx-auto h-12 w-12 text-yellow-400" />
         <p class="mt-4 text-2xl font-bold text-gray-700">No Quotes Found</p>
         <p class="text-gray-500 mt-2">We couldn't find any products matching your search criteria. Please try another category.</p>
      </div>
    </div>
  </div>
</template>