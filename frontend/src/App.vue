<script setup>
import { ref } from 'vue';
import { RouterLink, RouterView } from 'vue-router';
import { useAuthStore } from '@/stores/auth';
import { 
    ChevronDown, LogOut, LayoutDashboard, FileText, LifeBuoy, Settings, UserCheck, Phone, Mail, MessageCircle, Store, PhoneForwarded,
    Shield, Briefcase, Car, Plane, Home, Zap, HeartPulse, User, HandCoins, Users, Facebook, Twitter, Linkedin, Youtube, Truck, Bike
} from 'lucide-vue-next';

const authStore = useAuthStore();

// Dropdown state management for hover
const openDropdown = ref(null);
const openSubDropdown = ref(null);

const insuranceProducts = [
  { name: 'Term Life Insurance', icon: Shield, path: '#' },
  { name: 'Health Insurance', icon: HeartPulse, path: '#' },
  { name: 'Investment Plans', icon: Zap, path: '#' },
  { 
    name: 'Motor Insurance', 
    icon: Car,
    path: '#', // Main link can be a category page
    subItems: [
        { name: 'Car Insurance', icon: Car, path: '#' },
        { name: 'Two Wheeler Insurance', icon: Bike, path: '#' },
        { name: 'Commercial Vehicle', icon: Truck, path: '#' },
    ]
  },
  { name: 'Family Health', icon: Users, path: '#' },
  { name: 'Travel Insurance', icon: Plane, path: '#' },
  { name: 'Home Insurance', icon: Home, path: '#' },
];

const renewalLinks = [
  { name: 'Term Life Renewal', icon: Shield },
  { name: 'Investment Renewal', icon: HandCoins },
  { name: 'Health Renewal', icon: HeartPulse },
  { name: 'Motor Renewal', icon: Car },
  { name: 'Two Wheeler Renewal', icon: Briefcase },
  { name: 'Home Insurance Renewal', icon: Home },
];

const supportLinks = {
  account: [
    { name: 'Dashboard', icon: LayoutDashboard },
    { name: 'Policies', icon: FileText },
    { name: 'Get Help', icon: LifeBuoy },
    { name: 'Communication preferences', icon: Settings },
    { name: 'Verify your advisor', icon: UserCheck },
  ],
  contact: [
    { name: 'Connect on Whatsapp', icon: MessageCircle },
    { name: 'Stores near you', icon: Store },
    { name: 'Request a callback', icon: PhoneForwarded },
  ]
};

const expertHelplines = [
    { for: 'Helpline for having a new policy', number: '1800-208-8787' },
    { for: 'Helpline for existing policy', number: '1800-258-5970' },
    { for: 'Helpline for claim', number: '1800-258-5881' },
];

const footerLinks = {
    general: [
        { name: 'General Insurance', path: '#' },
        { name: 'Life Insurance', path: '#' },
        { name: 'Term Insurance', path: '#' },
        { name: 'Investment Insurance', path: '#' },
        { name: 'Health Insurance', path: '#' },
        { name: 'Other Insurance', path: '#' },
    ],
    calculators: [
        { name: 'Fitness Calculators', path: '#' },
        { name: 'Income Tax Calculator', path: '#' },
        { name: 'Term Insurance Calculator', path: '#' },
        { name: 'Health Insurance Calculator', path: '#' },
        { name: 'Car Insurance Calculator', path: '#' },
    ],
    articles: [
        { name: 'Articles', path: '#' },
        { name: 'Customer Reviews', path: '#' },
        { name: 'Insurance Companies', path: '#' },
        { name: 'Newsroom', path: '#' },
        { name: 'Awards', path: '#' },
    ],
    company: [
        { name: 'About Us', path: '/about' },
        { name: 'Sitemap', path: '#' },
        { name: 'Legal & Admin policies', path: '#' },
        { name: 'Contact Us', path: '/contact' },
        { name: 'Investor Relations', path: '#' },
    ]
}

const socialLinks = [
    { name: 'Facebook', icon: Facebook, url: '#' },
    { name: 'Twitter', icon: Twitter, url: '#' },
    { name: 'LinkedIn', icon: Linkedin, url: '#' },
    { name: 'YouTube', icon: Youtube, url: '#' },
];

const paymentLogos = [
    { name: 'Visa', path: '/payment-logos/visa.png' },
    { name: 'Mastercard', path: '/payment-logos/mastercard.png' },
    { name: 'UPI', path: '/payment-logos/upi.png' },
    { name: 'RuPay', path: '/payment-logos/rupay.png' },
];

</script>

<template>
  <div class="flex flex-col min-h-screen">
    <header class="bg-white/80 backdrop-blur-md shadow-sm sticky top-0 z-50">
      <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
          <div class="flex-shrink-0">
            <RouterLink to="/">
              <img class="h-12 w-auto" src="@/assets/logo.png" alt="Zepay Suraksha">
            </RouterLink>
          </div>
          
          <div class="hidden md:flex md:items-center md:space-x-8">
            
            <!-- Insurance Products Dropdown (Hover with Submenu) -->
            <div class="relative" @mouseenter="openDropdown = 'products'" @mouseleave="openDropdown = null">
              <button class="flex items-center text-gray-600 hover:text-zepay-blue font-semibold transition cursor-pointer">
                Insurance Products <ChevronDown class="h-4 w-4 ml-1" />
              </button>
              <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                <div v-if="openDropdown === 'products'" class="absolute -left-4 mt-2 w-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                  <div class="py-1">
                    <div v-for="product in insuranceProducts" :key="product.name" class="relative" 
                         @mouseenter="product.subItems ? openSubDropdown = product.name : null" 
                         @mouseleave="product.subItems ? openSubDropdown = null : null">
                        <RouterLink :to="product.path" class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                          <div class="flex items-center">
                            <component :is="product.icon" class="h-5 w-5 mr-3 text-zepay-blue" />
                            {{ product.name }}
                          </div>
                          <ChevronDown v-if="product.subItems" class="h-4 w-4 -rotate-90" />
                        </RouterLink>
                        <!-- Submenu -->
                        <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-x-1" enter-to-class="opacity-100 translate-x-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-x-0" leave-to-class="opacity-0 translate-x-1">
                           <div v-if="product.subItems && openSubDropdown === product.name" class="absolute left-full -top-1 w-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 ml-1">
                             <div class="py-1">
                                <RouterLink v-for="subItem in product.subItems" :key="subItem.name" :to="subItem.path" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                  <component :is="subItem.icon" class="h-5 w-5 mr-3 text-zepay-blue" />
                                  {{ subItem.name }}
                                </RouterLink>
                             </div>
                           </div>
                        </transition>
                    </div>
                  </div>
                </div>
              </transition>
            </div>
            
            <div class="relative" @mouseenter="openDropdown = 'renew'" @mouseleave="openDropdown = null">
              <button class="flex items-center text-gray-600 hover:text-zepay-blue font-semibold transition cursor-pointer">
                Renew Your Policy <ChevronDown class="h-4 w-4 ml-1" />
              </button>
              <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                <div v-if="openDropdown === 'renew'" class="absolute -left-4 mt-2 w-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                  <div class="py-1">
                     <RouterLink v-for="link in renewalLinks" :key="link.name" to="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <component :is="link.icon" class="h-5 w-5 mr-3 text-zepay-blue" />
                        {{ link.name }}
                    </RouterLink>
                  </div>
                </div>
              </transition>
            </div>

            <div class="relative" @mouseenter="openDropdown = 'support'" @mouseleave="openDropdown = null">
              <button class="flex items-center text-gray-600 hover:text-zepay-blue font-semibold transition cursor-pointer">
                Support <ChevronDown class="h-4 w-4 ml-1" />
              </button>
              <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                <div v-if="openDropdown === 'support'" class="absolute right-0 mt-2 w-72 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                  <div class="p-2">
                    <div class="px-3 py-2">
                      <p class="text-sm font-semibold text-gray-500">My Account</p>
                    </div>
                    <RouterLink v-for="link in supportLinks.account" :key="link.name" to="#" class="flex items-center w-full px-3 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100">
                      <component :is="link.icon" class="h-5 w-5 mr-3 text-zepay-blue" />
                      <span>{{ link.name }}</span>
                    </RouterLink>
                    <div class="border-t my-2"></div>
                     <div class="px-3 py-2">
                      <p class="text-sm font-semibold text-gray-500">Contact Us</p>
                    </div>
                     <div class="grid grid-cols-3 gap-1 text-center">
                        <RouterLink v-for="link in supportLinks.contact" :key="link.name" to="#" class="p-2 rounded-md hover:bg-gray-100">
                          <component :is="link.icon" class="h-6 w-6 mx-auto text-zepay-blue" />
                          <span class="mt-1 text-xs text-gray-600 block">{{ link.name }}</span>
                        </RouterLink>
                     </div>
                  </div>
                </div>
              </transition>
            </div>
          </div>
          
          <div class="flex items-center space-x-4">
            <div class="relative hidden lg:block" @mouseenter="openDropdown = 'expert'" @mouseleave="openDropdown = null">
                <button class="flex items-center bg-zepay-green/10 text-zepay-green font-semibold px-4 py-2 rounded-lg transition hover:bg-zepay-green/20 cursor-pointer">
                    <Phone class="h-5 w-5 mr-2 animate-pulse" /> Talk to an Expert
                </button>
                <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                    <div v-if="openDropdown === 'expert'" class="absolute right-0 mt-2 w-64 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div class="p-4">
                            <div v-for="(item, index) in expertHelplines" :key="item.for" :class="{'border-b pb-3 mb-3': index < expertHelplines.length - 1}">
                                <p class="text-sm text-gray-500">{{ item.for }}</p>
                                <a href="#" class="flex items-center font-bold text-gray-800 mt-1">
                                    <Phone class="h-4 w-4 mr-2 text-zepay-blue"/>{{ item.number }}
                                </a>
                            </div>
                        </div>
                    </div>
                </transition>
            </div>
            
            <template v-if="authStore.user">
                <div class="relative" @mouseenter="openDropdown = 'user'" @mouseleave="openDropdown = null">
                    <button class="flex items-center cursor-pointer">
                       <span class="font-semibold text-gray-700">Welcome, {{ authStore.user.name.split(' ')[0] }}</span>
                       <ChevronDown class="h-4 w-4 ml-1" />
                    </button>
                     <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                        <div v-if="openDropdown === 'user'" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                <RouterLink to="/dashboard" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <LayoutDashboard class="h-5 w-5 mr-3" /> Dashboard
                                </RouterLink>
                                <button @click="authStore.handleLogout" class="flex items-center w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <LogOut class="h-5 w-5 mr-3"/> Logout
                                </button>
                            </div>
                        </div>
                    </transition>
                </div>
            </template>
            <template v-else>
                 <RouterLink to="/login" class="text-gray-600 hover:text-zepay-blue font-semibold transition hidden sm:block">Sign in</RouterLink>
                 <RouterLink to="/register" class="bg-zepay-blue text-white font-semibold px-4 py-2 rounded-lg transition hover:bg-zepay-blue/90 shadow-md">Register</RouterLink>
            </template>
          </div>
        </div>
      </nav>
    </header>

    <main class="flex-grow">
      <RouterView />
    </main>
    
    <footer class="bg-slate-900 text-slate-400">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8">
            <div>
              <h3 class="text-sm font-semibold text-white tracking-wider uppercase">General Insurance</h3>
              <ul class="mt-4 space-y-3">
                <li v-for="link in footerLinks.general" :key="link.name">
                    <RouterLink :to="link.path" class="hover:text-white transition text-sm flex items-center">
                        <ChevronDown class="w-3 h-3 mr-2 rotate-[-90deg]" /> {{ link.name }}
                    </RouterLink>
                </li>
              </ul>
            </div>
            <div>
              <h3 class="text-sm font-semibold text-white tracking-wider uppercase">Calculators</h3>
              <ul class="mt-4 space-y-3">
                 <li v-for="link in footerLinks.calculators" :key="link.name">
                    <RouterLink :to="link.path" class="hover:text-white transition text-sm flex items-center">
                        <ChevronDown class="w-3 h-3 mr-2 rotate-[-90deg]" /> {{ link.name }}
                    </RouterLink>
                </li>
              </ul>
            </div>
             <div>
              <h3 class="text-sm font-semibold text-white tracking-wider uppercase">Resources</h3>
              <ul class="mt-4 space-y-3">
                 <li v-for="link in footerLinks.articles" :key="link.name">
                    <RouterLink :to="link.path" class="hover:text-white transition text-sm">{{ link.name }}</RouterLink>
                </li>
              </ul>
            </div>
             <div>
              <h3 class="text-sm font-semibold text-white tracking-wider uppercase">Company</h3>
              <ul class="mt-4 space-y-3">
                 <li v-for="link in footerLinks.company" :key="link.name">
                    <RouterLink :to="link.path" class="hover:text-white transition text-sm">{{ link.name }}</RouterLink>
                </li>
              </ul>
            </div>
            <div class="col-span-2 lg:col-span-1">
                <h3 class="text-sm font-semibold text-white tracking-wider uppercase">ZEPAY SURAKSHA IMF PRIVATE LIMITED</h3>
                <address class="mt-4 text-sm not-italic">
                    Red Square Commercial Complex<br>
                    Sanjay Place, Agra-282002<br>
                    Agra, Uttar Pradesh 282010
                </address>
            </div>
        </div>

        <div class="mt-16 border-t border-slate-800 pt-8 grid md:grid-cols-3 gap-8 items-center">
            <div class="grid grid-cols-2 gap-8">
                 <div>
                    <h3 class="text-sm font-semibold text-white">Payment Methods</h3>
                    <div class="flex items-center space-x-2 mt-4">
                       <div v-for="logo in paymentLogos" :key="logo.name" class="h-8 w-12 bg-white rounded-md p-1 flex items-center justify-center">
                         <img :src="logo.path" :alt="logo.name" class="max-h-full max-w-full object-contain" />
                       </div>
                    </div>
                </div>
                 <div>
                    <h3 class="text-sm font-semibold text-white">Regulated By</h3>
                    <div class="flex items-center space-x-2 mt-4">
                        <div class="h-8 w-24 bg-white rounded-md p-1 flex items-center justify-center">
                           <img src="/seals/irdai-logo.png" alt="IRDAI" class="max-h-full" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                 <h3 class="text-sm font-semibold text-white">Follow us on</h3>
                 <div class="flex justify-center items-center space-x-4 mt-2">
                    <a v-for="social in socialLinks" :key="social.name" :href="social.url" class="text-slate-500 hover:text-white transition">
                        <component :is="social.icon" class="w-6 h-6" />
                    </a>
                 </div>
            </div>
            <div></div> </div>

         <div class="mt-8 border-t border-slate-800 pt-8 text-xs text-slate-500 space-y-4">
            <p>
                Zepay Suraksha IMF Private Limited | CIN: [Your CIN Here] | Registered Office: [Red Square CommercIal Complex Sanjay Place, Agra-282002, Agra, Uttar Pradesh 282010].
            </p>
             <p>
                IRDAI registration number: [Your IRDAI Number] | Valid till [Expiry Date] | Category: Composite Broker.
            </p>
            <p>
                Visitors are hereby informed that their information submitted on the website may be shared with insurers. Product information is authentic and solely based on the information received from the insurers.
            </p>
             <p class="font-bold text-slate-300">
                BEWARE OF SPURIOUS PHONE CALLS AND FICTITIOUS/FRAUDULENT OFFERS.
             </p>
             <p>
                IRDAI or its officials do not involve in activities like selling insurance policies, announcing bonus or investment of premiums. Public receiving such phone calls are requested to lodge a police complaint.
             </p>
        </div>

        <div class="mt-8 border-t border-slate-800 pt-8 text-center text-sm">
          <p>&copy; {{ new Date().getFullYear() }} Zepay Suraksha. All Rights Reserved.</p>
        </div>
      </div>
    </footer>
  </div>
</template>

