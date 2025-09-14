<script setup>
import { ref, computed } from 'vue';
import { RouterLink } from 'vue-router';
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Navigation } from 'vue3-carousel';

import { 
    Car, HeartPulse, ShieldCheck, Plane, Briefcase, Building, Users, Baby, RefreshCw, HandCoins, Landmark, Umbrella,
    Shield, Globe, Clock, MessageSquareHeart, UsersRound, Library, BadgePercent, LifeBuoy, Mail, Phone,
    Award, Heart, Flag, Bike, Truck
} from 'lucide-vue-next';

// --- QUOTE FORM LOGIC (UPDATED) ---
const activeTabId = ref('Motor');
const activeMotorSubTabId = ref('Car');

const quoteTabs = ref([
    { 
      id: 'Motor', 
      label: 'Motor', 
      icon: Car,
      subTabs: [
        { id: 'Car', label: 'Car', placeholder: 'Enter Car Number (e.g., DL01AB1234)', type: 'text' },
        { id: 'Bike', label: 'Bike', placeholder: 'Enter Bike Number (e.g., UP32AB1234)', type: 'text' },
        { id: 'Commercial', label: 'Commercial', placeholder: 'Enter Vehicle Number', type: 'text' }
      ]
    },
    { id: 'Health', label: 'Health', icon: HeartPulse, placeholder: 'Enter Your Mobile Number', type: 'tel' },
    { id: 'Term Life', label: 'Term Life', icon: ShieldCheck, placeholder: 'Enter Your Age', type: 'number' },
    { id: 'Travel', label: 'Travel', icon: Plane, placeholder: 'Enter Your Destination', type: 'text' },
]);

const activeTabData = computed(() => {
    const activeTab = quoteTabs.value.find(tab => tab.id === activeTabId.value);
    if (activeTab.id === 'Motor') {
        return activeTab.subTabs.find(subTab => subTab.id === activeMotorSubTabId.value);
    }
    return activeTab;
});


// --- ALL OTHER DATA REMAINS UNCHANGED FROM YOUR FILE ---
const products = ref([
    { name: 'Term Life Insurance', subtext: 'Starts @ ₹499/month', icon: ShieldCheck, tag: null },
    { name: 'Health Insurance', subtext: 'Upto 25% Off', icon: HeartPulse, tag: 'Popular' },
    { name: 'Investment Plans', subtext: '8% Assured Returns', icon: HandCoins, tag: null },
    { name: 'Car Insurance', subtext: 'Premiums from ₹2,094', icon: Car, tag: 'Best Seller' },
    { name: '2 Wheeler Insurance', subtext: 'Save upto 85%', icon: Briefcase, tag: null },
    { name: 'Family Health', subtext: 'Best Seller', icon: HeartPulse, tag: 'New' },
    { name: 'Travel Insurance', subtext: 'Coverage from ₹40/day', icon: Plane, tag: null },
    { name: 'Women\'s Term Plan', subtext: 'Special Discount', icon: ShieldCheck, tag: 'Special' },
    { name: 'Return of Premium', subtext: '105% Back', icon: RefreshCw, tag: null },
    { name: 'Guaranteed Returns', subtext: 'Popular Choice', icon: HandCoins, tag: 'Popular' },
    { name: 'Child Savings Plans', subtext: 'For Your Little One', icon: Baby, tag: null },
    { name: 'Retirement Plans', subtext: 'Secure Your Future', icon: Landmark, tag: null },
    { name: 'Group Health', subtext: 'For Employees', icon: Users, tag: null },
    { name: 'Commercial Vehicle', subtext: 'Protect Your Business', icon: Building, tag: null },
]);

const testimonials = ref([
  { name: 'Priya Sharma', quote: "The process was incredibly smooth and transparent. I found the perfect health plan for my family in minutes.", rating: 5, initials: 'PS', color: 'bg-green-500' },
  { name: 'Rohan Verma', quote: "Excellent customer service. They helped me with my car insurance claim and made it completely stress-free.", rating: 5, initials: 'RV', color: 'bg-blue-500' },
  { name: 'Anjali Singh', quote: "I never thought buying term insurance could be this easy. The website is so user-friendly. Highly recommended!", rating: 5, initials: 'AS', color: 'bg-orange-500' },
  { name: 'Karan Gupta', quote: "Saved a lot of money by comparing different insurers on Zepay Suraksha. The premium quotes are very competitive.", rating: 4, initials: 'KG', color: 'bg-purple-500' },
  { name: 'Sneha Reddy', quote: "The support team was very patient and helped me understand all the policy details. A trustworthy platform for sure.", rating: 5, initials: 'SR', color: 'bg-pink-500' },
  { name: 'Amit Kumar', quote: "The renewal process for my bike insurance was seamless. Took less than two minutes from start to finish.", rating: 5, initials: 'AK', color: 'bg-indigo-500' },
]);

const achievements = [
    { number: 46900, label: 'Policies Issued', icon: Flag },
    { number: 25000, label: 'Happy Clients', icon: Heart },
    { number: 7560, label: 'Insurance Agents', icon: Award },
];

const achievementImages = [
    '/images/photo1.png',
    '/images/photo2.png',
];

</script>

<template>
  <div class="bg-white">
    <!-- Hero Section -->
    <div class="relative bg-gray-50 overflow-hidden">
       <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative py-24 lg:py-32">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left">
              <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-gray-900">
                <span class="block">Find the <span class="text-zepay-blue">Best</span></span>
                <span class="block text-zepay-green">Insurance</span>
                <span class="block">Made Simple For You.</span>
              </h1>
              <p class="mt-6 max-w-lg mx-auto lg:mx-0 text-lg text-gray-600">
                Compare and save on car, health, life, and travel insurance from India's top insurers. Get instant quotes and buy online in minutes.
              </p>
            </div>
            <div class="relative">
              <!-- GET A QUICK QUOTE SECTION (UPDATED) -->
              <div class="bg-white rounded-2xl shadow-2xl p-8">
                <h2 class="text-2xl font-bold text-center text-gray-800">Get a Quick Quote</h2>
                <div class="mt-6 grid grid-cols-4 gap-2">
                  <button v-for="tab in quoteTabs" :key="tab.id" @click="activeTabId = tab.id" 
                          :class="['group rounded-lg py-3 text-sm font-semibold flex flex-col items-center justify-center transition-all duration-200 border', activeTabId === tab.id ? 'bg-zepay-blue text-white border-zepay-blue' : 'bg-white text-gray-500 hover:bg-zepay-blue/5 hover:text-zepay-blue border-transparent']">
                    <component :is="tab.icon" class="h-6 w-6 mb-1 transition-colors" /> {{ tab.label }}
                  </button>
                </div>
                
                <div class="mt-6">
                    <!-- Motor Sub-tabs -->
                    <div v-if="activeTabId === 'Motor'" class="mb-4">
                        <div class="flex justify-center items-center bg-gray-100 rounded-lg p-1">
                            <button v-for="subTab in quoteTabs.find(t => t.id === 'Motor').subTabs" :key="subTab.id"
                                    @click="activeMotorSubTabId = subTab.id"
                                    :class="['flex-1 text-center text-sm font-semibold py-2 rounded-md transition-colors duration-200', activeMotorSubTabId === subTab.id ? 'bg-white text-zepay-blue shadow' : 'text-gray-500 hover:text-gray-800']">
                                {{ subTab.label }}
                            </button>
                        </div>
                    </div>

                    <input :type="activeTabData.type" :placeholder="activeTabData.placeholder" class="mt-4 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-zepay-blue focus:border-zepay-blue transition">
                    <button class="mt-4 w-full bg-zepay-green text-white font-bold py-3 px-4 rounded-lg shadow-md hover:bg-zepay-green/90 transition-all duration-300 transform hover:scale-105">
                    View Free Quotes
                  </button>
                </div>
                <!-- END GET A QUICK QUOTE SECTION -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- ALL OTHER SECTIONS ARE UNCHANGED FROM YOUR FILE -->
    <div class="py-16 sm:py-24 bg-white">
       <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">All Insurance Products</h2>
                <p class="mt-4 text-lg text-gray-600">One-stop shop for all your insurance needs</p>
            </div>
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4">
                <div v-for="product in products" :key="product.name" 
                     class="group relative bg-gray-50 rounded-xl p-4 text-center hover:bg-white hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-gray-200">
                    <div class="flex justify-center">
                        <component :is="product.icon" class="h-8 w-8 text-zepay-blue" />
                    </div>
                    <h3 class="mt-3 text-sm font-semibold text-gray-800">{{ product.name }}</h3>
                    <p class="mt-1 text-xs text-gray-500">{{ product.subtext }}</p>
                    <span v-if="product.tag" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ product.tag }}</span>
                </div>
            </div>
            <div class="mt-12 text-center">
              <RouterLink to="/products" class="inline-block bg-zepay-blue text-white font-semibold py-3 px-8 rounded-lg shadow-md hover:bg-zepay-blue/90 transition-all duration-300 transform hover:scale-105">
                View All Products
              </RouterLink>
            </div>
        </div>
    </div>

    <div class="relative bg-white py-16 sm:py-24 overflow-hidden">
       <div class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3">
          <div class="w-96 h-96 bg-zepay-green/10 rounded-full blur-3xl"></div>
      </div>
       <div class="absolute bottom-0 right-0 translate-x-1/3 translate-y-1/3">
          <div class="w-96 h-96 bg-zepay-blue/10 rounded-full blur-3xl"></div>
      </div>
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center">
          <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            What makes <span class="text-zepay-blue">Zepay Suraksha</span> one of the<br>best places to buy insurance?
          </h2>
          <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">We are committed to providing you the best.</p>
        </div>
        <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          <div class="bg-white/60 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-gray-200 text-center transform hover:scale-105 hover:shadow-2xl transition-all duration-300">
            <UsersRound class="h-10 w-10 text-zepay-green mx-auto" />
            <h3 class="mt-5 text-xl font-bold text-gray-800">Over 1 Million+</h3>
            <p class="mt-2 text-sm text-gray-600">customers trust us & have bought their insurance from Zepay.</p>
          </div>
          <div class="bg-white/60 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-gray-200 text-center transform hover:scale-105 hover:shadow-2xl transition-all duration-300">
            <Library class="h-10 w-10 text-zepay-green mx-auto" />
            <h3 class="mt-5 text-xl font-bold text-gray-800">50+ Insurers</h3>
            <p class="mt-2 text-sm text-gray-600">partnered with us so that you can compare easily & transparently.</p>
          </div>
          <div class="bg-white/60 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-gray-200 text-center transform hover:scale-105 hover:shadow-2xl transition-all duration-300">
            <BadgePercent class="h-10 w-10 text-zepay-green mx-auto" />
            <h3 class="mt-5 text-xl font-bold text-gray-800">Great Price</h3>
            <p class="mt-2 text-sm text-gray-600">for all kinds of insurance plans available online.</p>
          </div>
          <div class="bg-white/60 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-gray-200 text-center transform hover:scale-105 hover:shadow-2xl transition-all duration-300">
            <LifeBuoy class="h-10 w-10 text-zepay-green mx-auto" />
            <h3 class="mt-5 text-xl font-bold text-gray-800">Claims</h3>
            <p class="mt-2 text-sm text-gray-600">support built in with every policy for help when you need it the most.</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="bg-zepay-blue/5 py-24 sm:py-32">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <h2 class="text-base font-semibold text-zepay-blue uppercase tracking-widest">Trusted By Thousands</h2>
                    <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Your Security is Our Success Story</p>
                    <p class="mt-6 text-lg text-gray-600 leading-8">Join thousands of happy clients who have secured their future with Zepay Suraksha. Our numbers speak for themselves.</p>
                    <div class="mt-12 grid grid-cols-3 gap-8">
                        <div v-for="achievement in achievements" :key="achievement.label" class="text-center">
                            <component :is="achievement.icon" class="h-10 w-10 text-zepay-green mx-auto" />
                            <p class="mt-3 text-4xl font-extrabold text-zepay-blue tracking-tight">
                               {{ achievement.number.toLocaleString('en-IN') }}+
                            </p>
                            <p class="mt-1 text-sm font-medium text-gray-600">{{ achievement.label }}</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-2xl overflow-hidden shadow-2xl">
                     <Carousel :autoplay="4000" :wrap-around="true" :transition="500">
                        <Slide v-for="(image, index) in achievementImages" :key="index">
                            <img :src="image" alt="Zepay Suraksha Achievement" class="h-full w-full object-cover">
                        </Slide>
                         <template #addons>
                            <Navigation />
                        </template>
                    </Carousel>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-gray-50 to-gray-100 py-16 sm:py-24">
       <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Leading Insurers For Your Financial Freedom</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">We've partnered with India's most trusted insurance providers.</p>
            </div>
            <div class="mt-12 grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-4 items-center">
                <div v-for="i in 24" :key="i" class="p-4 bg-white rounded-lg shadow-sm border border-gray-200 flex justify-center items-center h-20 hover:shadow-md transition-shadow">
                    <img :src="`https://placehold.co/120x40/f0f0f0/a0a0a0?text=PARTNER&font=lato`" alt="Insurance Partner" class="max-h-10 w-auto" />
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-16 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">What Our Customers Say</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">We take pride in our excellent customer service and support.</p>
            </div>
            <Carousel :items-to-show="3" :wrap-around="true" :autoplay="5000">
                <Slide v-for="testimonial in testimonials" :key="testimonial.name">
                    <div class="px-4 h-full">
                         <div class="relative bg-gray-50 p-8 rounded-xl shadow-md border border-gray-200 h-full flex flex-col justify-between">
                            <div class="absolute top-4 right-4 text-gray-200">
                                <MessageSquareHeart class="w-16 h-16" />
                            </div>
                            <div>
                                <div class="flex items-center mb-5">
                                    <div :class="['w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-xl', testimonial.color]">
                                        {{ testimonial.initials }}
                                    </div>
                                    <div class="ml-4 text-left">
                                        <p class="font-semibold text-gray-900">{{ testimonial.name }}</p>
                                        <div class="flex items-center">
                                            <svg v-for="i in 5" :key="i" :class="['w-5 h-5', i <= testimonial.rating ? 'text-yellow-400' : 'text-gray-300']" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                                <blockquote class="text-gray-600 italic text-left">"{{ testimonial.quote }}"</blockquote>
                            </div>
                        </div>
                    </div>
                </Slide>
                <template #addons>
                  <Navigation />
                </template>
            </Carousel>
        </div>
    </div>

    <div class="bg-zepay-blue/5 py-16 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
          <div class="text-center lg:text-left">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Have a question? <br>Here to help.</h2>
            <p class="mt-4 text-lg text-gray-600">Our friendly customer support team is your extended family. Speak your heart out. They listen with undivided attention to resolve your concerns.</p>
          </div>
          <div class="flex flex-col space-y-4">
            <a href="mailto:care@zepaysuraksha.com" class="bg-white p-6 rounded-xl shadow-md border border-gray-200 hover:shadow-lg hover:-translate-y-1 transition-all flex items-center">
              <div class="bg-zepay-green/10 p-3 rounded-full">
                <Mail class="h-6 w-6 text-zepay-green" />
              </div>
              <div class="ml-4">
                <h3 class="font-semibold text-gray-800">General Enquiries</h3>
                <p class="text-zepay-blue">care@zepaysuraksha.com</p>
              </div>
            </a>
            <a href="tel:1800-208-8787" class="bg-white p-6 rounded-xl shadow-md border border-gray-200 hover:shadow-lg hover:-translate-y-1 transition-all flex items-center">
              <div class="bg-zepay-green/10 p-3 rounded-full">
                <Phone class="h-6 w-6 text-zepay-green" />
              </div>
              <div class="ml-4">
                <h3 class="font-semibold text-gray-800">Customer Sales Enquiries</h3>
                <p class="text-zepay-blue">1800-208-8787</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

