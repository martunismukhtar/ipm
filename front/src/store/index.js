import { createStore } from 'vuex';
import createPersistedState from "vuex-persistedstate";
// import config from '../../config';


export default createStore({
	state: {
		count:0,
		user:null,
		token: null, 
		// url_server: config.API_URL,
		// url_foto: config.FOTO_URL,
		// url_vector_tile: config.VECTOR_TILE_API_URL,
		// url_wms: config.WMS_API_URL,
		// wms_store:config.WMS_STORE,
		kegiatan:null, kabupaten:null, kecamatan:null, desa:null,
		awalwaktu:null,
		hasilpengajuan:null,
		id:null,
        cetakpdf:null,
		show_txt_upload:true,
		formpengajuan:false,
		showformkrk:false,
		showhasilpengajuan:false,
		add_coordinate_manual:false,
		showButtonGambarPeta:true,
        latitude:null,
        longitude:null,
		nama_dokumen_tanah:null,
		link_dokumen_tanah:null,
        showkoordinat:false,
		koordinat:[],
		formPengajuan:{
			id:null,
			pengaju: null,
			nomor_hp: null,
			tujuan: null,
			klasifikasi: null,
			kegiatan: null,
			// koordinat: [],
			callfrom: "web",
			pekerjaan: null,
			alamat: null,
			jabatan: null,
			email: null,
			luas_tanah: 0,
			pemilik_tanah: null,
			status_tanah: null,
			alamat_tanah: null,
			no_sertifikat: null,
			kecamatan: null,
			gampong: null,
			nama_dokumen_tanah: "Upload dokumen disini",
			link_dokumen_tanah: null
		}
	},
	getters: {
		token: (state) =>{
			return state.token;
		},
		user : (state) => {
			return state.user;
		},
		getAwalWaktu:(state) => {
			return state.awalwaktu;
		},
		count:(state)=>{
			return state.count;
		}
		// result (state) {
		// 	return state.score;
		// }
	},
	mutations: {
		resetKoordinat(state){
			Object.assign(state.koordinat, []);
		},
		resetFormPengajuan(state){
			Object.assign(state.formPengajuan, {
				id: null,
				pengaju: null,
				nomor_hp: null,
				tujuan: null,
				klasifikasi: null,
				kegiatan: null,
				koordinat: [],
				callfrom: "web",
				pekerjaan: null,
				alamat: null,
				jabatan: null,
				email: null,
				luas_tanah: 0,
				pemilik_tanah: null,
				status_tanah: null,
				alamat_tanah: null,
				no_sertifikat: null,
				kecamatan: null,
				gampong: null,
				nama_dokumen_tanah: "Upload dokumen disini",
				link_dokumen_tanah: null
			})
		},
		hapusKoordinates(state){
			state.koordinat = [];
			state.showkoordinat = false;
			state.showButtonGambarPeta = true;
		},
		setAwalWaktu(state, awalwaktu) {
			state.awalwaktu = awalwaktu;
		},
		user(state, user) {
			state.user = user;
		},
		setUser(state, user) {
			state.user = user;
		},
		setToken(state, token) {
			state.token = token;
		},
		token (state, token) {
			state.token = token
		},
		destroyUser(state){
			state.user = null;	
		},
		destroyToken(state) {
			state.token = null;
		},
		filter(state, data){
			state.kegiatan = data.kegiatan,
			state.kabupaten = data.kabupaten,
			state.kecamatan = data.kecamatan,
			state.desa = data.desa
		},
		setDataFormPengajuan(state, payload){
			return state.formPengajuan = {
				id: payload.id,
				pengaju: payload.pengaju,
				nomor_hp: payload.nomor_hp,
				tujuan: payload.tujuan,
				klasifikasi: payload.klasifikasi,
				kegiatan: payload.kegiatan,
				koordinat: payload.koordinat,
				callfrom: "web",
				pekerjaan: payload.pekerjaan,
				alamat: payload.alamat,
				jabatan: payload.jabatan,
				email: payload.email,
				luas_tanah: payload.luas_tanah,
				pemilik_tanah: payload.pemilik_tanah,
				status_tanah: payload.status_tanah,
				alamat_tanah: payload.alamat_tanah,
				no_sertifikat: payload.no_sertifikat,
				kecamatan: payload.kecamatan,
				gampong: payload.gampong,
				nama_dokumen_tanah: payload.nama_dokumen_tanah,
				link_dokumen_tanah: payload.link_dokumen_tanah
			};
		},
		hapusKoordinat(state, index){
			return state.koordinat.splice(index, 1);
		},
		tambahKoordinatPoly(state, payload){
			state.koordinat.push(payload);
			return state.koordinat;
		},
		submitPengajuan(){

		},
		increment (state, payload=null){
			return state.count = state.count + (payload ? payload:1);
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
