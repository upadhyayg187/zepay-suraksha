<script setup>
import { ref } from 'vue';
import { Mail, Phone, MapPin } from 'lucide-vue-next';

const formData = ref({
  name: '',
  email: '',
  subject: '',
  message: '',
});

const handleSubmit = () => {
  // In a real application, you would handle form submission here.
  // This could involve sending the data to your Laravel backend API.
  console.log('Form Submitted:', formData.value);
  alert('Thank you for your message! We will get back to you shortly.');
  // Reset form
  formData.value = { name: '', email: '', subject: '', message: '' };
};
</script>

<template>
  <div class="bg-white">
    <!-- Hero Section -->
    <div class="relative bg-zepay-blue/5 py-24 sm:py-32">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1596524430615-b46475ddff6e?q=80&w=2070&auto=format&fit=crop" alt="Abstract background" class="w-full h-full object-cover opacity-10">
            <div class="absolute inset-0 bg-gradient-to-t from-white"></div>
        </div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                Contact Us
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-600">
                We're here to help. Reach out to us with any questions or inquiries.
            </p>
        </div>
    </div>

    <!-- Contact Info and Form Section -->
    <div class="py-16 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-start">
                <!-- Left Column: Info & Map -->
                <div class="space-y-12">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Get in Touch</h2>
                        <p class="mt-4 text-lg text-gray-600">
                            Find our office, drop us an email, or give us a call. We're always happy to connect.
                        </p>
                    </div>
                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-zepay-green/10 text-zepay-green">
                                    <MapPin class="h-6 w-6" />
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900">Our Address</h3>
                                <p class="mt-1 text-gray-600">
                                    Red Square Commercial Complex, Sanjay Place, Agra-282002, Agra, Uttar Pradesh 282010
                                </p>
                            </div>
                        </div>
                         <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-zepay-green/10 text-zepay-green">
                                    <Mail class="h-6 w-6" />
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900">Email Us</h3>
                                <a href="mailto:care@zepaysuraksha.com" class="mt-1 text-zepay-blue hover:underline">
                                    care@zepaysuraksha.com
                                </a>
                            </div>
                        </div>
                         <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center h-12 w-12 rounded-full bg-zepay-green/10 text-zepay-green">
                                    <Phone class="h-6 w-6" />
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold text-gray-900">Call Us</h3>
                                <a href="tel:1800-208-8787" class="mt-1 text-zepay-blue hover:underline">
                                    1800-208-8787
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-2xl overflow-hidden shadow-2xl h-80">
                         <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3549.435767556754!2d78.00551007519102!3d27.17296537648934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397473a45c36199b%3A0x356571557161b6c7!2sSanjay%20Place!5e0!3m2!1sen!2sin!4v1726146194248!5m2!1sen!2sin" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="bg-gray-50 p-8 sm:p-12 rounded-2xl shadow-xl border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900">Send us a Message</h2>
                    <form @submit.prevent="handleSubmit" class="mt-8 space-y-6">
                        <div>
                            <label for="name" class="font-semibold text-gray-700">Full Name</label>
                            <input type="text" id="name" v-model="formData.name" required class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-zepay-blue focus:border-zepay-blue transition">
                        </div>
                         <div>
                            <label for="email" class="font-semibold text-gray-700">Email Address</label>
                            <input type="email" id="email" v-model="formData.email" required class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-zepay-blue focus:border-zepay-blue transition">
                        </div>
                        <div>
                            <label for="subject" class="font-semibold text-gray-700">Subject</label>
                            <input type="text" id="subject" v-model="formData.subject" required class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-zepay-blue focus:border-zepay-blue transition">
                        </div>
                        <div>
                            <label for="message" class="font-semibold text-gray-700">Message</label>
                            <textarea id="message" v-model="formData.message" rows="5" required class="mt-2 w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-zepay-blue focus:border-zepay-blue transition"></textarea>
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-zepay-blue text-white font-bold py-3 px-4 rounded-lg shadow-md hover:bg-zepay-blue/90 transition-all duration-300 transform hover:scale-105">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>
