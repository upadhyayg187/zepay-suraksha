<script setup>
import { ShieldCheck, HeartPulse, Stethoscope, Car, Bike, Plane, Briefcase, Building, Users, Baby, RefreshCw, HandCoins, Landmark, Umbrella } from 'lucide-vue-next'

const products = [
    { name: 'Term Life Insurance', description: 'Protect your family\'s future.', icon: ShieldCheck },
    { name: 'Health Insurance', description: 'Cover medical expenses.', icon: HeartPulse },
    { name: 'Critical Illness', description: 'Lumpsum for major illnesses.', icon: Stethoscope },
    { name: 'Car Insurance', description: 'Protection for your vehicle.', icon: Car },
    { name: '2 Wheeler Insurance', description: 'Insure your bike or scooter.', icon: Bike },
    { name: 'Travel Insurance', description: 'Secure your trips.', icon: Plane },
    { name: 'Investment Plans', description: 'Grow your wealth.', icon: HandCoins },
    { name: 'Retirement Plans', description: 'Plan for your golden years.', icon: Landmark },
    { name: 'Child Savings Plans', description: 'Secure your child\'s future.', icon: Baby },
    { name: 'Women\'s Term Plan', description: 'Specialized life cover.', icon: ShieldCheck },
    { name: 'Return of Premium', description: 'Get your premiums back.', icon: RefreshCw },
    { name: 'Guaranteed Returns', description: 'Assured investment growth.', icon: HandCoins },
    { name: 'Group Health', description: 'Insurance for your employees.', icon: Users },
    { name: 'Commercial Vehicle', description: 'Cover for business vehicles.', icon: Building },
    { name: 'General Insurance', description: 'Cover for home and assets.', icon: Umbrella },
    { name: 'Business Insurance', description: 'Protect your company.', icon: Briefcase },
]
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

      <div class="mt-16 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8">
        <div v-for="product in products" :key="product.name" 
             class="group bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col items-center text-center hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
          <div class="bg-zepay-green/10 p-4 rounded-full">
            <component :is="product.icon" class="h-8 w-8 text-zepay-green" />
          </div>
          <h3 class="mt-4 text-md font-semibold text-gray-800">{{ product.name }}</h3>
          <p class="mt-1 text-sm text-gray-500">{{ product.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>
