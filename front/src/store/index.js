import { createStore } from 'vuex';
import createPersistedState from "vuex-persistedstate";
// import config from '../../config';


export default createStore({
	state: {
		qty:[],
		product:[],
		price:[],
		description:[],
		paymentMethod:'bniva',
		buyerName:'',
		buyerEmail:'',
		buyerPhone:'',
		// products:{
		// 	product:[],
		// product:[],
		// price:[],
		// description:[],
		// }
	},
	getters: {
		
	},
	mutations: {
		addToChart(state, payload) {
			//fruits.push("Kiwi");
			state.product.push(payload['product'])
			state.qty.push(payload['qty'])
			state.price.push(payload['price'])
			state.description.push(payload['description'])
		}
		// increment (state, payload=null){
		// 	return state.count = state.count + (payload ? payload:1);
		// }
	},
	actions: {
		filter(context, data){
			context.commit('filter', data)
		},
		user(context, user) {
			context.commit('user', user)
		},
		token(context, token) {
			context.commit('token', token)
		},
		destroyUser(context){
			context.commit('user', null);
			
		},
		destroyToken(context) {
			context.commit('token', null);
		},
		// increment (context, payload) {
		// 	context.commit('increment', payload)
		// }
	},
	modules: {

	},
	plugins: [createPersistedState()],
});
