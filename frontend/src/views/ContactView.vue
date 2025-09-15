<script setup>
import { ref } from 'vue';
import { Mail, Phone, MapPin } from 'lucide-vue-next';
import api from '@/services/api'; // Import the api service

const formData = ref({
  name: '',
  email: '',
  subject: '',
  message: '',
});
const formMessage = ref('');
const formErrors = ref({});
const submitting = ref(false);

const handleSubmit = async () => {
  submitting.value = true;
  formMessage.value = '';
  formErrors.value = {};

  try {
    const response = await api.post('/api/contact', formData.value);
    formMessage.value = response.data.message;
    // Reset form
    formData.value = { name: '', email: '', subject: '', message: '' };
  } catch (error) {
    if (error.response && error.response.status === 422) {
        formMessage.value = 'Please correct the errors below.';
        formErrors.value = error.response.data.errors;
    } else {
        formMessage.value = 'An unexpected error occurred. Please try again later.';
        console.error('Form submission error:', error);
    }
  } finally {
      submitting.value = false;
  }
};
</script>

<template>
  <div class="bg-white">
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

    <div class="py-16 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-start">
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
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3549.400511874244!2d78.0076238150511!3d27.18229218299845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397476add885497f%3A0x8698125134b224f8!2sRed%20Square%20Commercial%20Complex!5e0!3m2!1sen!2sin!4v1678886363654!5m2!1sen!2sin"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <div class="bg-gray-50 p-8 sm:p-12 rounded-2xl shadow-xl border border-gray-200">
                    <h2 class="text-2xl font-bold text-gray-900">Send us a Message</h2>
                    <form @submit.prevent="handleSubmit" class="mt-8 space-y-6">
                        <div>
                            <label for="name" class="font-semibold text-gray-700">Full Name</label>
                            <input type="text" id="name" v-model="formData.name" required class="mt-2 w-full px-4 py-3 rounded-lg border focus:ring-2 transition" :class="formErrors.name ? 'border-red-500 ring-red-300' : 'border-gray-300 focus:ring-zepay-blue focus:border-zepay-blue'">
                            <p v-if="formErrors.name" class="text-red-500 text-sm mt-1">{{ formErrors.name[0] }}</p>
                        </div>
                         <div>
                            <label for="email" class="font-semibold text-gray-700">Email Address</label>
                            <input type="email" id="email" v-model="formData.email" required class="mt-2 w-full px-4 py-3 rounded-lg border focus:ring-2 transition" :class="formErrors.email ? 'border-red-500 ring-red-300' : 'border-gray-300 focus:ring-zepay-blue focus:border-zepay-blue'">
                             <p v-if="formErrors.email" class="text-red-500 text-sm mt-1">{{ formErrors.email[0] }}</p>
                        </div>
                        <div>
                            <label for="subject" class="font-semibold text-gray-700">Subject</label>
                            <input type="text" id="subject" v-model="formData.subject" required class="mt-2 w-full px-4 py-3 rounded-lg border focus:ring-2 transition" :class="formErrors.subject ? 'border-red-500 ring-red-300' : 'border-gray-300 focus:ring-zepay-blue focus:border-zepay-blue'">
                            <p v-if="formErrors.subject" class="text-red-500 text-sm mt-1">{{ formErrors.subject[0] }}</p>
                        </div>
                        <div>
                            <label for="message" class="font-semibold text-gray-700">Message</label>
                            <textarea id="message" v-model="formData.message" rows="5" required class="mt-2 w-full px-4 py-3 rounded-lg border focus:ring-2 transition" :class="formErrors.message ? 'border-red-500 ring-red-300' : 'border-gray-300 focus:ring-zepay-blue focus:border-zepay-blue'"></textarea>
                            <p v-if="formErrors.message" class="text-red-500 text-sm mt-1">{{ formErrors.message[0] }}</p>
                        </div>

                        <div v-if="formMessage" class="p-4 rounded-md" :class="formErrors.name || formErrors.email ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700'">
                           {{ formMessage }}
                        </div>

                        <div>
                            <button type="submit" :disabled="submitting" class="w-full bg-zepay-blue text-white font-bold py-3 px-4 rounded-lg shadow-md hover:bg-zepay-blue/90 transition-all duration-300 transform hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed">
                                {{ submitting ? 'Sending...' : 'Send Message' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>