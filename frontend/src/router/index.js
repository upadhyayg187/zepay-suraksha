import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import ProductsView from '../views/ProductsView.vue'
import AboutView from '../views/AboutView.vue' // <-- Import the new page
import ContactView from '../views/ContactView.vue' // <-- Import the new page


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView
    },
    {
      path: '/products',
      name: 'products',
      component: ProductsView
    },
    { // <-- Add this new route object
      path: '/about',
      name: 'about',
      component: AboutView
    },
     { // <-- Add this new route object
      path: '/contact',
      name: 'contact',
      component: ContactView
    }
  ]
})

export default router

