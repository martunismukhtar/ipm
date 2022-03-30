import { createStore } from 'vuex';
import createPersistedState from "vuex-persistedstate";

export default createStore({
	state: {
		api:'http://127.0.0.1:8000/api/',
		paymentMethod:'bniva',
		buyerName:'',
		buyerEmail:'',
		buyerPhone:'',
		weight:'', dimension:'',
		barang:[],
		filter:{
			pekerjaan:'',
			tahun:'',
			bulan:'',
			cari:''
		}
	},
	
	mutations: {
		setDim(state, payload){
			state.weight = payload.weight;
			state.dimension = payload.dimension;
		},
		setAlamatTagihan(state, payload) {
			state.buyerName = payload.nama;
			state.buyerEmail = payload.email;
			state.buyerPhone = payload.telepon;
			// state.buyerPhone = payload.telepon;
		},
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
		resetDim(state){
			state.weight = '';
			state.dimension = '';
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
