<script setup>
import { ref } from 'vue';
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Navigation } from 'vue3-carousel';
import { Shield, Users, Eye, Lightbulb } from 'lucide-vue-next';

const values = [
    { name: 'Integrity', description: 'We uphold the highest standards of integrity in all of our actions.', icon: Shield },
    { name: 'Customer Commitment', description: 'We develop relationships that make a positive difference in our customers\' lives.', icon: Users },
    { name: 'Transparency', description: 'We believe in being open, honest, and clear in all our dealings.', icon: Eye },
    { name: 'Innovation', description: 'We constantly pursue new ideas and technologies to simplify insurance.', icon: Lightbulb },
];

const leadership = [
    { name: '[Founder Name]', role: 'Founder & CEO', image: 'https://placehold.co/400x400/e2e8f0/64748b?text=Photo' },
    { name: '[Co-Founder Name]', role: 'Co-Founder & CTO', image: 'https://placehold.co/400x400/e2e8f0/64748b?text=Photo' },
    { name: '[Team Member Name]', role: 'Head of Operations', image: 'https://placehold.co/400x400/e2e8f0/64748b?text=Photo' },
];

// NEW: Image data for the carousel
const officeImages = ref([
    { src: '/our-offices/office1.jpg', alt: 'Zepay Suraksha Office Interior' },
    { src: '/our-offices/office2.jpg', alt: 'Zepay Suraksha Team Meeting' },
    
]);

</script>

<template>
  <div class="bg-white">
    <!-- Hero Section -->
    <div class="relative bg-zepay-blue/5 py-24 sm:py-32">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1531545514256-b1400bc00f31?q=80&w=1974&auto=format&fit=crop" alt="Abstract background" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-t from-white"></div>
        </div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                About <span class="text-zepay-blue">Zepay Suraksha</span>
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-600">
                Your trusted partner in securing tomorrow. We're simplifying insurance for everyone.
            </p>
        </div>
    </div>

    <!-- Who We Are Section with Image Carousel -->
    <div class="py-16 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="rounded-2xl overflow-hidden shadow-2xl">
                    <Carousel :autoplay="4000" :wrap-around="true" :transition="500">
                        <Slide v-for="(image, index) in officeImages" :key="index">
                            <div class="aspect-w-4 aspect-h-3 w-full">
                                <img :src="image.src" :alt="image.alt" class="w-full h-full object-cover">
                            </div>
                        </Slide>
                    </Carousel>
                </div>
                <div>
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900">Who We Are</h2>
                    <p class="mt-4 text-lg text-gray-600">
                        Zepay Suraksha is a proud part of Evyaparpay Financial Technologies Private Limited (Zepay Group), a company dedicated to providing innovative solutions across various sectors including Payment Gateways, Travel, and API Integrations.
                    </p>
                    <p class="mt-4 text-lg text-gray-600">
                        At Zepay Suraksha, our mission is to simplify insurance. We believe that everyone deserves access to the best financial protection without the complexities and jargon that often come with it. By leveraging cutting-edge technology, we aim to make the process of comparing, buying, and managing insurance policies as seamless and transparent as possible.
                    </p>
                </div>
            </div>
        </div>
    </div>

     <!-- Our Values Section -->
    <div class="bg-gray-50 py-24 sm:py-32">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Our Core Values</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                    The principles that guide our every decision.
                </p>
            </div>
            <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div v-for="value in values" :key="value.name" class="p-8 bg-white rounded-2xl shadow-lg border border-gray-200">
                    <div class="flex items-center justify-center h-12 w-12 rounded-full bg-zepay-green/10">
                        <component :is="value.icon" class="h-6 w-6 text-zepay-green" />
                    </div>
                    <h3 class="mt-6 text-lg font-semibold text-gray-900">{{ value.name }}</h3>
                    <p class="mt-2 text-base text-gray-600">{{ value.description }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Meet Our Leadership Section -->
    <div class="bg-white py-24 sm:py-32">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Meet Our Leadership</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">
                    The team dedicated to simplifying insurance for you.
                </p>
            </div>
            <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                <div v-for="person in leadership" :key="person.name" class="text-center">
                    <img class="mx-auto h-48 w-48 rounded-full shadow-lg" :src="person.image" :alt="person.name">
                    <h3 class="mt-6 text-xl font-semibold text-gray-900">{{ person.name }}</h3>
                    <p class="text-base text-zepay-blue">{{ person.role }}</p>
                </div>
            </div>
        </div>
    </div>

  </div>
</template>

