import { createRouter, createWebHashHistory } from 'vue-router';
import HomePage from '../components/HomePage.vue';
import PaymentPage from '../components/PaymentPage.vue';
import DetailPage from '../components/DetailPage.vue';
//import store from '../store/index.js'

const routes = [
	{
		path: '/',
		name: 'HomePage',
		component: HomePage,
		// meta: {
		// 	requiresAuth: true
		// }
	},
	{
		path: '/payment',
		name: 'PaymentPage',
		component: PaymentPage,
		// meta: {
		// 	requiresAuth: true
		// }
	},
	{
		path: '/detail/:id',
		name: 'DetailPage',
		component: DetailPage,
		// meta: {
		// 	requiresAuth: true
		// }
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
