import { createRouter, createWebHistory } from 'vue-router';
import HomePage from './components/HomePage.vue';
import LoginPage from './components/LoginPage.vue';
import auth from './auth';

const routes = [
  { 
    path: '/',
    component: LoginPage
  },
  { 
    path: '/home/:username', 
    name: 'HomePage', 
    component: HomePage, 
    meta: { requiresAuth: true } 
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});


router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !auth.isAuthenticated) {
    next('/');
  } else {
    next();
  }
});

export default router;
