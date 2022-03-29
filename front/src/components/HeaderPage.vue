<template>
	<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
        <li>
          <router-link  class="nav-link px-2 link-dark" to="/payment">Payment</router-link>
          <!-- <a href="#" class="nav-link px-2 link-dark">Payment</a> -->
          </li>
        <!-- <li><a href="#" class="nav-link px-2 link-dark">Pricing</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
        <li><a href="#" class="nav-link px-2 link-dark">About</a></li> -->
      </ul>

      <!-- <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
        <button type="button" class="btn btn-primary">Sign-up</button>
      </div> -->
    </header>
</template>

<script>
import { mapGetters } from "vuex";
export default {
	name: "HeaderPage",
	data() {
		return {
			kegiatan: null,
			nkegiatan: null,
			kabupaten: null,
			nkabupaten: null,
			provinsi: null,
			nprovinsi: null,
		};
	},
	computed: {
		...mapGetters(["count"]),
	},
	methods: {
		showFormPengajuan() {
			this.emitter.emit("formPengajuan");
		},
    },
};
</script>

<style scoped>
.btn-action:hover {
  background-color: #f2f2f2 !important;
  text-decoration: none;
  color: #000;
  /* padding: 5px; */
}
.btn-action {
  margin-left: 10px;
}
.fa {
  /* color:#68abb9; */
  color: #00809d;
}
.inp-search {
  /* width: 40em !important; */
  width: 40em;
}
.has-search .form-control {
  padding-left: 2.375rem;
  box-shadow: 0 0 0 1px rgb(0 0 0 / 10%), 0 2px 4px 0 rgb(0 0 0 / 16%);
}

.has-search .form-control-feedback {
  position: absolute;
  z-index: 2;
  display: block;
  width: 2.375rem;
  height: 2.375rem;
  line-height: 2.375rem;
  text-align: center;
  pointer-events: none;
}
.bd-navbar {
  padding: 0.75rem 0;
  background-color: #fff;
}
.bd-navbar .navbar-nav-svg {
  width: 1rem;
  height: 1rem;
}

.navbar > .container,
.navbar > .container-fluid,
.navbar > .container-lg,
.navbar > .container-md,
.navbar > .container-sm,
.navbar > .container-xl,
.navbar > .container-xxl {
  display: flex;
  flex-wrap: inherit;
  align-items: center;
  justify-content: space-between;
}
.alert-danger {
  color: #de1b2d;
  background-color: white;
  border-color: #f5c6cb;
}

.btn-primary:not(:disabled):not(.disabled).active,
.btn-primary:not(:disabled):not(.disabled):active,
.show > .btn-primary.dropdown-toggle {
  color: #fff;
  background-color: #dc2b17;
  border-color: #dc2b17;
}
.btn-primary.focus,
.btn-primary:focus {
  color: #fff;
  background-color: #dc2b17;
  border-color: #dc2b17;
  box-shadow: 0 0 0 0.2rem rgb(38 143 255 / 50%);
}
select {
  border: 3px solid #e6e6e6;
  background-color: #ffffff;

  /* font-weight: 400; */
  color: inherit;
  /* padding: 4px 0px; */
  line-height: normal;
  transition: border-color 0.2s ease, outline 0.2s ease;
  border-radius: 4px;
}

select:focus {
  box-shadow: 0 3px 4px rgba(#005ba6, 0.3) inset;
  outline: 3px solid #005ba6;
  border-radius: 4px;
}
.form-control {
  display: inline-block;
  width: auto;
  vertical-align: middle;
}
.searchbox {
  background-color: #fff;
  border-right: none;
  height: 40px;
  border-radius: 6px;
  border: none;
  width: 100%;
  -webkit-appearance: none;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: row;
  -webkit-flex-direction: row;
  flex-direction: row;
  -moz-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.16);
  -webkit-box-shadow: 0 0 0 1px rgb(0 0 0 / 10%), 0 2px 4px 0 rgb(0 0 0 / 16%);
  box-shadow: 0 0 0 1px rgb(0 0 0 / 10%), 0 2px 4px 0 rgb(0 0 0 / 16%);
}
.shadow-sm {
  box-shadow: 0 0.125rem 0.25rem rgba(133, 130, 130, 0.075) !important;
}

.logo-yel {
  margin-right: 3px;
  background-repeat: no-repeat;
  background-color: white;
  border-radius: 50%;
  z-index: 999;
  margin-top: -8px;
  margin-bottom: -8px;
}
.navbar-brand strong {
  color: rgba(137, 24, 34, 0.85);
}

.navbar-nav a {
  color: #615e5e;
  text-decoration: none;
  transition: ease-in-out color 0.15s;
}
.navbar-nav a:hover {
  color: #080808;
  text-decoration: none;
  border-bottom: 2px solid #be2126;
}
</style>