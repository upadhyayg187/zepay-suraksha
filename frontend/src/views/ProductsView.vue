<script setup>
import { onMounted, computed } from 'vue';
import { RouterLink } from 'vue-router';
import { useProductStore } from '@/stores/products';
import { ShieldCheck, HeartPulse, Stethoscope, Car, Bike, Plane, Briefcase, Building, Users, Baby, RefreshCw, HandCoins, Landmark, Umbrella } from 'lucide-vue-next'

const productStore = useProductStore();
const products = computed(() => productStore.products);

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
    'Women\'s Term Plan': ShieldCheck,
    'Return of Premium': RefreshCw,
    'Guaranteed Returns': HandCoins,
    'Group Health': Users,
    'Commercial Vehicle': Building,
    'Home Insurance': Umbrella,
    'Business Insurance': Briefcase,
};

// Fetch products when the component is mounted
onMounted(() => {
    if (productStore.products.length === 0) {
        productStore.fetchProducts();
    }
});
</script>

<template>
  <div class="bg-gray-50 py-16 sm:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 tracking-tight">
          Our Complete Range of Insurance Products
        </h1>
        <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
          Find the perfect plan tailored to your needs. We are committed to securing every aspect of your life.
        </p>
      </div>

      <div v-if="productStore.loading" class="text-center mt-16">
        <p class="text-xl">Loading Products...</p>
      </div>
      <div v-else class="mt-16 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8">
        <RouterLink v-for="product in products" :key="product.id"
             :to="{ name: 'product-detail', params: { slug: product.slug } }"
             class="group bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col items-center text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
          <div class="bg-zepay-green/10 p-4 rounded-full">
            <component :is="iconMap[product.category] || ShieldCheck" class="h-8 w-8 text-zepay-green" />
          </div>
          <h3 class="mt-4 text-md font-semibold text-gray-800">{{ product.name }}</h3>
          <p class="mt-1 text-sm text-gray-500">{{ product.summary }}</p>
        </RouterLink>
      </div>
    </div>
  </div>
</template>