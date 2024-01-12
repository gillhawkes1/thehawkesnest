import { createRouter, createWebHistory } from 'vue-router';
import HomePage from './components/HomePage.vue';
import LoginPage from './components/LoginPage.vue';
import auth from './auth';

const routes = [
  { path: '/', redirect: '/login' },
  { path: '/login', component: LoginPage },
  { path: '/home', component: HomePage, meta: { requiresAuth: true } },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});


router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !auth.isAuthenticated) {
    next('/login');
  } else {
    next();
  }
});

export default router;
