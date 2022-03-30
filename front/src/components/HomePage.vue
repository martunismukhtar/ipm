<template>
	<div class="container">		
		<FilterModul :get="get" 
			:addProfile="addProfile"
			:daftar_pekerjaan="daftar_pekerjaan"
			:daftar_tahun="daftar_tahun"
			:daftar_bulan="daftar_bulan"
			/>

		<TabelModul :data_profile="data_profile"
			:hapus="hapus"
			:update="update"
		/>
		<PaginationModul :links="links"
			:paginate="paginate"
			:curr_page="curr_page"
		/>
	
		<SimpleModal v-show="isModalVisible" :onClicked="hideModal">
			<template v-slot:header>Input data</template>
			<template v-slot:body>
				<form @submit.prevent="simpanData">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Nama</label>
						<input type="text" class="form-control" required v-model="nama">

					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Pekerjaan</label>
						<input type="text" class="form-control" required v-model="pekerjaan">
					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
						<input type="date" class="form-control" required v-model="tanggal_lahir">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</template>     
		</SimpleModal>
	</div>
</template>

<script>

import axios from 'axios';
import SimpleModal from './SimpleModal.vue';
import FilterModul from './FilterModul';
import TabelModul from './TabelModul';
import PaginationModul from './PaginationModul';

export default {
	name: "HomePage",
	components:{
		SimpleModal, FilterModul, TabelModul, PaginationModul
	},
	data() {
		return {
			
			daftar_pekerjaan:[],
			daftar_tahun:[],
			daftar_bulan:[],
			selectedID:null,
			nama:null, pekerjaan:null, tanggal_lahir:null,
			isModalVisible:false,
			data_profile:[],
			links:[],
			curr_page:null,
			liclass:null,
			params:'',
			url_api:'http://127.0.0.1:8000/api/',
			url:'http://127.0.0.1:8000/api/filter',
		}
	},
	methods:{
		hapus(id) {
			this.selectedID = id;
			let isExecuted = confirm("Apakah anda akan menghapus data ini ?");
			if(isExecuted) {
				axios.delete(this.$store.state.api+'profile/'+id,{ headers: "" }).then(() => {
					this.get();
					this.isModalVisible = false;
				}).catch((err) => console.log(err));
			}
		},
		update(id){
			this.selectedID = id;
			for(let i=0;i<this.data_profile.length;i++) {
				if(this.data_profile[i].id==id) {
					this.nama = this.data_profile[i].nama;
					this.pekerjaan = this.data_profile[i].pekerjaan;
					this.tanggal_lahir = this.data_profile[i].ori_tanggal_lahir;
					
				}
			}
			this.isModalVisible = true;
		},
		simpanData() {
			const {nama, pekerjaan, tanggal_lahir, selectedID} = this;
			let url = this.$store.state.api+'profile';
			if(selectedID) {
				axios.put(url+'/'+selectedID, {
					nama,
					pekerjaan,
					tanggal_lahir,
				},{ headers: "" }).then(() => {
					this.getDaftarPekerjaan();
					this.getDaftarTahun();
					this.getDaftarBulan();
					this.get();
					this.isModalVisible = false;
				}).catch((err) => console.log(err));
			} else {
				axios.post(url, {
					nama,
					pekerjaan,
					tanggal_lahir,
				},{ headers: "" }).then(() => {
					this.getDaftarPekerjaan();
					this.getDaftarTahun();
					this.getDaftarBulan();
					this.get();
					this.isModalVisible = false;
				}).catch((err) => console.log(err));
			}
			
		},
		hideModal(){
			this.isModalVisible = false;
		},
		addProfile() {
			this.isModalVisible = true;
		},
		clearAmp(text){
			if(text==='&laquo; Previous') {
				return 'Previous';
			} 
			if(text==='Next &raquo;') {
				return 'Next';
			}
			return text;
		},
		paginate(page){
			this.get(page);
		},
		async get(url=this.url) {
			
			const {pekerjaan, tahun, bulan, cari} = this.$store.state.filter;
			const profile = await axios.post(url,{
				pekerjaan, tahun, bulan, cari
			}, { headers: "" });	
			this.data_profile = profile.data.data.data;
			this.links = profile.data.data.links;	
			this.curr_page = profile.data.data.current_page;
			
		},
		async getDaftarPekerjaan(){
			const pekerjaan = await axios.get(this.$store.state.api+"daftar-pekerjaan", { headers: "" });
			this.daftar_pekerjaan = pekerjaan.data.data;
		},
		async getDaftarTahun(){
			const tahun = await axios.get(this.$store.state.api+"daftar-tahun-lahir", { headers: "" });
			this.daftar_tahun = tahun.data.data;
		},
		async getDaftarBulan(){
			const bulan = await axios.get(this.$store.state.api+"daftar-bulan-lahir", { headers: "" });
			this.daftar_bulan = bulan.data.data;
		}
	},
	mounted() {
		this.getDaftarPekerjaan();
		this.getDaftarTahun();
		this.getDaftarBulan();
		this.get();

	},
};
</script>

<style scoped>

</style>