<template>
  <div class="col-8 m-auto">
    <div class="card">
      <div class="card-header">
        <router-link :to="{ name: 'EmployeesIndex' }">&larr; Back</router-link>
        <span class="float-right">Create Employee Data</span>
      </div>
      <div class="card-body">
        <form @submit.prevent="storeEmployee()">
          <div class="row form-group">
            <label
              for="first_name"
              class="col-md-4 col-form-label text-md-right"
              >First Name</label
            >
            <div class="col-md-6">
              <input
                v-model="form.first_name"
                id="first_name"
                type="text"
                class="form-control"
                name="first_name"
                required
                autofocus
              />
            </div>
          </div>

          <div class="row form-group">
            <label
              for="middle_name"
              class="col-md-4 col-form-label text-md-right"
              >Middle Name</label
            >
            <div class="col-md-6">
              <input
                v-model="form.middle_name"
                id="middle_name"
                type="text"
                class="form-control"
                name="middle_name"
                autofocus
              />
            </div>
          </div>

          <div class="row form-group">
            <label for="last_name" class="col-md-4 col-form-label text-md-right"
              >Last Name</label
            >
            <div class="col-md-6">
              <input
                v-model="form.last_name"
                id="last_name"
                type="text"
                class="form-control"
                name="last_name"
                required
                autofocus
              />
            </div>
          </div>

          <div class="row form-group">
            <label for="address" class="col-md-4 col-form-label text-md-right"
              >Address</label
            >
            <div class="col-md-6">
              <input
                v-model="form.address"
                id="address"
                type="text"
                class="form-control"
                name="address"
                required
                autofocus
              />
            </div>
          </div>

          <div class="row form-group">
            <label for="zip_code" class="col-md-4 col-form-label text-md-right"
              >Zip Code</label
            >
            <div class="col-md-6">
              <input
                v-model="form.zip_code"
                id="zip_code"
                type="number"
                class="form-control"
                name="zip_code"
                required
                autofocus
              />
            </div>
          </div>

          <div class="row form-group">
            <label for="birthdate" class="col-md-4 col-form-label text-md-right"
              >Date of Birth</label
            >
            <div class="col-md-6">
              <datepicker
                v-model="form.birthdate"
                input-class="form-control"
              ></datepicker>
            </div>
          </div>

          <div class="row form-group">
            <label
              for="date_hired"
              class="col-md-4 col-form-label text-md-right"
              >Date Hired</label
            >
            <div class="col-md-6">
              <datepicker
                v-model="form.date_hired"
                input-class="form-control"
              ></datepicker>
            </div>
          </div>

          <div class="row form-group">
            <label
              for="department"
              class="col-md-4 col-form-label text-md-right"
              >Department</label
            >
            <div class="col-md-6">
              <select
                v-model="form.department_id"
                name="department"
                id="department"
                class="form-control"
                aria-label="Default select example"
              >
                <option
                  v-for="departments in departments"
                  :key="departments.id"
                  :value="departments.id"
                >
                  {{ departments.name }}
                </option>
              </select>
            </div>
          </div>

          <div class="row form-group">
            <label for="country" class="col-md-4 col-form-label text-md-right"
              >Country</label
            >
            <div class="col-md-6">
              <select
                v-model="form.country_id"
                @change="getStates()"
                name="country"
                id="country"
                class="form-control"
                aria-label="Default select example"
              >
                <option
                  v-for="country in countries"
                  :key="country.id"
                  :value="country.id"
                >
                  {{ country.name }}
                </option>
              </select>
            </div>
          </div>

          <div class="row form-group">
            <label for="state" class="col-md-4 col-form-label text-md-right"
              >State</label
            >
            <div class="col-md-6">
              <select
                v-model="form.state_id"
                @change="getCities()"
                name="state"
                id="state"
                class="form-control"
                aria-label="Default select example"
              >
                <option
                  v-for="state in states"
                  :key="state.id"
                  :value="state.id"
                >
                  {{ state.name }}
                </option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right"
              >City</label
            >

            <div class="col-md-6">
              <select
                v-model="form.city_id"
                name="city"
                class="form-control"
                aria-label="Default select example"
              >
                <option v-for="city in cities" :key="city.id" :value="city.id">
                  {{ city.name }}
                </option>
              </select>
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus-square"></i>
                Create
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";
export default {
  components: {
    Datepicker,
  },

  data() {
    return {
      countries: [],
      states: [],
      cities: [],
      departments: [],
      form: {
        first_name: "",
        last_name: "",
        middle_name: "",
        address: "",
        country_id: "",
        state_id: "",
        department_id: "",
        city_id: "",
        zip_code: "",
        birthdate: null,
        date_hired: null,
      },
    };
  },

  created() {
    this.getCountries();
    this.getDepartments();
  },

  methods: {
    getCountries() {
      axios
        .get("/api/employees/countries")
        .then((res) => {
          this.countries = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    getStates() {
      axios
        .get("/api/employees/" + this.form.country_id + "/states")
        .then((res) => {
          this.states = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    getCities() {
      axios
        .get("/api/employees/" + this.form.state_id + "/cities")
        .then((res) => {
          this.cities = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    getDepartments() {
      axios
        .get("/api/employees/departments")
        .then((res) => {
          this.departments = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    storeEmployee() {
      axios
        .post("/api/employees", {
          first_name: this.form.first_name,
          middle_name: this.form.middle_name,
          last_name: this.form.last_name,
          address: this.form.address,
          country_id: this.form.country_id,
          state_id: this.form.state_id,
          city_id: this.form.city_id,
          department_id: this.form.department_id,
          zipcode: this.form.zip_code,
          birthdate: this.format_date(this.form.birthdate),
          date_hired: this.format_date(this.form.date_hired),
        })
        .then((res) => {
          this.$router.push({ name: "EmployeesIndex" });
        });
    },
    format_date(value) {
      if (value) {
        return moment(String(value)).format("YYYYMMDD");
      }
    },
  },
};
</script>

<style>
</style>