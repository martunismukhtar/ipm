import { createRouter, createWebHashHistory } from 'vue-router'
import HomePage from '../components/HomePage.vue'
import PaymentPage from '../components/PaymentPage.vue'
// import Logout from '../views/Logout.vue'
//import store from '../store/index.js'

const routes = [
	{
		path: '/',
		name: 'HomePage',
		component: HomePage,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/payment',
		name: 'PaymentPage',
		component: PaymentPage,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/:catchAll(.*)',
		component: () => import('../components/NotFound.vue')
	}
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
});

export default router;
