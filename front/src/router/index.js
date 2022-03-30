import { createRouter, createWebHashHistory } from 'vue-router';
import HomePage from '../components/HomePage.vue';
import PaymentPage from '../components/PaymentPage.vue';
import DetailPage from '../components/DetailPage.vue';
import CheckoutPage from '../components/CheckoutPage.vue'

const routes = [
	{
		path: '/',
		name: 'HomePage',
		component: HomePage
	},
	{
		path: '/payment',
		name: 'PaymentPage',
		component: PaymentPage
	},
	{
		path: '/detail/:id',
		name: 'DetailPage',
		component: DetailPage
	},{
		path: '/checkout',
		name: 'CheckoutPage',
		component: CheckoutPage
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
