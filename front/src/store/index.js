import { createStore } from 'vuex';
import createPersistedState from "vuex-persistedstate";
// import config from '../../config';


export default createStore({
	state: {
		qty:[],
		produk:['baju', 'celana'],
		product:[],
		price:[],
		description:[],
		paymentMethod:'bniva',
		buyerName:'',
		buyerEmail:'',
		buyerPhone:'',
		barang:[],
		filter:{
			pekerjaan:'',
			tahun:'',
			bulan:'',
			cari:''
		}
	},
	getters: {
		
	},
	mutations: {
		addToChart(state, payload) {
			state.barang.push({
				qty:payload.qty,
				product:payload.product,
				price:payload.price,
				description:payload.description
			})
		},
		setFilter(state, payload){
			state.filter.pekerjaan = payload.pekerjaan;
			state.filter.tahun = payload.tahun;
			state.filter.bulan = payload.bulan;
			state.filter.cari = payload.cari;
		},
		resetChart (state){
			state.barang=[];
		}
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
