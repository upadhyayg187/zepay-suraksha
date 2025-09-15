<script setup>
import { onMounted, computed } from 'vue';
import { useRoute } from 'vue-router';
import { useProductStore } from '@/stores/products';
import { ShieldCheck, Zap, DollarSign, CheckCircle } from 'lucide-vue-next';

const route = useRoute();
const productStore = useProductStore();

const product = computed(() => productStore.currentProduct);

onMounted(() => {
  productStore.fetchProductBySlug(route.params.slug);
});
</script>

<template>
  <div v-if="productStore.loading" class="flex justify-center items-center h-96">
    <p class="text-xl text-gray-600">Loading Product Details...</p>
  </div>
  <div v-else-if="product" class="bg-white py-12 sm:py-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div>
          <img :src="product.image_url || 'https://placehold.co/600x400/e2e8f0/64748b?text=Product+Image'" :alt="product.name" class="rounded-2xl shadow-2xl w-full object-cover aspect-video">
        </div>
        <div class="text-left">
          <p class="font-semibold text-zepay-green">{{ product.provider }}</p>
          <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-2">{{ product.name }}</h1>
          <p class="mt-4 text-lg text-gray-600">{{ product.summary }}</p>
          
          <div class="mt-8 p-6 bg-gray-50 rounded-xl border">
             <h3 class="text-lg font-bold text-gray-800 flex items-center">
                <ShieldCheck class="h-6 w-6 mr-3 text-zepay-blue" />
                Key Features
             </h3>
             <ul class="mt-4 space-y-3">
                <li v-for="feature in product.features" :key="feature" class="flex items-center text-gray-700">
                    <CheckCircle class="h-5 w-5 mr-3 text-green-500" />
                    <span>{{ feature }}</span>
                </li>
             </ul>
          </div>

          <div class="mt-8 flex items-center gap-6">
            <div class="flex items-center">
              <DollarSign class="h-8 w-8 text-zepay-blue" />
              <div class="ml-3">
                <p class="text-sm text-gray-500">Starts From</p>
                <p class="text-2xl font-bold text-gray-900">₹{{ product.base_premium }}</p>
              </div>
            </div>
            <button class="bg-zepay-blue text-white font-bold py-4 px-10 rounded-lg shadow-lg hover:opacity-90 transition-transform transform hover:scale-105">
              Get Instant Quote
            </button>
          </div>
        </div>
      </div>
      <div class="mt-20 prose lg:prose-xl max-w-none">
        <h2 class="text-3xl font-bold text-gray-900">Policy Details</h2>
        <p>{{ product.description }}</p>
      </div>
    </div>
  </div>
   <div v-else class="text-center py-20">
    <p class="text-2xl font-bold text-red-500">Product not found.</p>
    <p class="text-gray-600 mt-2">We couldn't find the insurance product you were looking for.</p>
  </div>
</template>