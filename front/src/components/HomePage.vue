<template>
	<div>
		
		<form class="row g-3">
			<div class="col-auto">
				<input type="text" class="form-control" placeholder="Cari">
			</div>
			<div class="col-auto">
				<select class="form-select" v-model="cari.pekerjaan" @change="cariData()">
					<option :value=0 selected>Pekerjaan</option>
					<option v-for="pekerjaan in daftar_pekerjaan" 
						:value="pekerjaan.pekerjaan" :key="pekerjaan.pekerjaan">
						{{ pekerjaan.pekerjaan }}</option>
				</select>
			</div>
			<div class="col-auto">
				<select class="form-select"  v-model="cari.tahun" @change="cariData()">
					<option :value="0" selected>Tahun Lahir</option>
					<option v-for="tahun in daftar_tahun" 
						:value="tahun.tahun" :key="tahun.tahun">
						{{ tahun.tahun }}</option>
				</select>
			</div>
			<div class="col-auto">
				<select class="form-select" v-model="cari.bulan" @change="cariData()">
					<option :value="0" selected>Bulan Lahir</option>
					<option v-for="bulan in daftar_bulan" 
						:value="bulan.bulan" :key="bulan.bulan">
						{{ bulan.bulan }}</option>
				</select>
			</div>
  <div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Tambah Data</button>
  </div>
</form>
		
		
		<div class="table-responsive">
		<table class="table">
			<thead class="table-light">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nama</th>
					<th scope="col">Pekerjaan</th>
					<th scope="col">Tanggal Lahir</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(column, k) in data_profile" v-bind:key="k">
                    <td >{{column.id}}</td>
                    <td>{{column.nama}}</td>
                    <td>{{column.pekerjaan}}</td>
					<td>{{column.tanggal_lahir}}</td>
					<td>
						<button type="button" class="btn btn-sm btn-danger" @click="hapus(column.id)">Hapus</button>
						<button type="button" class="btn btn-sm btn-warning" @click="update(column.id)">Update</button>
						</td>
                </tr>
			</tbody>
		</table>
	</div>
	<nav aria-label="..." class="text-end">
			<ul class="pagination">
				<li class="page-item" 
					:class="[!column.url ? 'disabled' :
					column.label == curr_page ? 'active' :''
					]" 
					v-for="(column, k) in links" v-bind:key="k">
					<a class="page-link" href="#" @click="paginate(column.url)">
						<span>{{
							clearAmp(column.label)==='Previous'? 
								'&laquo; Previous': clearAmp(column.label)==='Next'
								? 'Next &raquo;':column.label
							}}</span>
					</a>
				</li>
			</ul>
		</nav>
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

export default {
	name: "HomePage",
	components:{
		SimpleModal
	},
	data() {
		return {
			cari:{
				pekerjaan:0,
				tahun:0,
				bulan:0
			},
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
			url:'http://127.0.0.1:8000/api/profile',
		}
	},
	methods:{
		cariData(){
			// this.params = '/'+this.cari.pekerjaan+'/'+this.cari.bulan+
			// 		'/'+this.cari.tahun;
			// this.url += this.params;
			// this.get();

		
			// let params ={};
			// if(this.cari.pekerjaan || this.cari.bulan || this.cari.tahun) {
				// url += '/'+this.cari.pekerjaan+'/'+this.cari.bulan+
				// 	'/'+this.cari.tahun;
				// console.log(this.cari.bulan)
				// this.url = 'http://127.0.0.1:8000/api/profile/'+this.cari.pekerjaan+'/'+this.cari.tahun+'/'+this.cari.bulan;	
			// 	// params : {''};
			// } 
			// console.log(url)

			// const profile = await axios.post(url, { headers: "" });	
			// this.data_profile = profile.data.data.data;
			// this.links = profile.data.data.links;	
			// this.curr_page = profile.data.data.current_page
			// // console.log(profile.data.data)
			// this.params = '';
		
		},
		hapus(id) {
			this.selectedID = id;
			let isExecuted = confirm("Apakah anda akan menghapus data ini ?");
			if(isExecuted) {
				axios.delete(this.url+'/'+id,{ headers: "" }).then(() => {
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
					this.tanggal_lahir = this.data_profile[i].tanggal_lahir;
					
				}
			}
			this.isModalVisible = true;
		},
		simpanData() {
			const {nama, pekerjaan, tanggal_lahir, selectedID} = this;
			if(selectedID) {
				axios.put(this.url+'/'+selectedID, {
					nama,
					pekerjaan,
					tanggal_lahir,
				},{ headers: "" }).then(() => {
					this.get();
					this.isModalVisible = false;
				}).catch((err) => console.log(err));
			} else {
				axios.post(this.url, {
					nama,
					pekerjaan,
					tanggal_lahir,
				},{ headers: "" }).then(() => {
					this.get();
					this.isModalVisible = false;
				}).catch((err) => console.log(err));
			}
			
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
			// let split_page = page.split('?'), url='';
			// console.log(page.split('?'))
			// url = split_page[0]+'/'+this.cari.pekerjaan+'/'
			// 	+this.cari.tahun+'/'+this.cari.bulan+'?'+split_page[1]
			// console.log(url)
			this.get(page);
		},
		async get(url=this.url) {
			// let params ={};
			// if(this.cari.pekerjaan || this.cari.bulan || this.cari.tahun) {
				// url += '/'+this.cari.pekerjaan+'/'+this.cari.bulan+
				// 	'/'+this.cari.tahun;
				// console.log(this.cari.bulan)
				// this.url = 'http://127.0.0.1:8000/api/profile/'+this.cari.pekerjaan+'/'+this.cari.tahun+'/'+this.cari.bulan;	
			// 	// params : {''};
			// } 
			// console.log(url)

			const profile = await axios.get(url, { headers: "" });	
			this.data_profile = profile.data.data.data;
			this.links = profile.data.data.links;	
			this.curr_page = profile.data.data.current_page
			// console.log(profile.data.data)
			this.params = '';
		},
		async getDaftarPekerjaan(){
			const pekerjaan = await axios.get("http://127.0.0.1:8000/api/daftar-pekerjaan", { headers: "" });
			this.daftar_pekerjaan = pekerjaan.data.data;
		},
		async getDaftarTahun(){
			const tahun = await axios.get("http://127.0.0.1:8000/api/daftar-tahun-lahir", { headers: "" });
			this.daftar_tahun = tahun.data.data;
		},
		async getDaftarBulan(){
			const bulan = await axios.get("http://127.0.0.1:8000/api/daftar-bulan-lahir", { headers: "" });
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