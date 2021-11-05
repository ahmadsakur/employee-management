<template>
  <div class="col-8 m-auto">
    <h4 class="card-title">Employee Data Management</h4>
    <div class="card mb-3">
      <div v-if="showMessages">
        <div
          class="alert alert-warning alert-dismissible fade show"
          role="alert"
        >
          <strong>{{ messages }}</strong>
          <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      <div class="card-header">
        <div class="row">
          <div class="col">
            <form>
              <div class="form-row align-items-center">
                <div class="col">
                  <input
                    type="search"
                    v-model.lazy="search"
                    class="form-control mb-2"
                    placeholder="Jane Doe"
                  />
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-primary mb-2">
                    Search
                  </button>
                </div>
                <div class="col">
                  <select
                    v-model="selectedDeprtment"
                    name="city"
                    class="form-control"
                    aria-label="Default select example"
                  >
                    <option
                      v-for="department in departments"
                      :key="department.id"
                      :value="department.id"
                    >
                      {{ department.name }}
                    </option>
                  </select>
                </div>
              </div>
            </form>
          </div>
          <div>
            <router-link
              :to="{ name: 'EmployeesCreate' }"
              class="btn btn-primary"
            >
              <i class="fas fa-plus"></i> Create</router-link
            >
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Address</th>
              <th scope="col">Department</th>
              <th scope="col">Manage</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(employee, index) in employees" :key="employee.id">
              <td scope="row">{{ index + 1 }}</td>
              <td>{{ employee.first_name }}</td>
              <td>{{ employee.last_name }}</td>
              <td>{{ employee.address }}</td>
              <td>{{ employee.department.name }}</td>
              <td>
                <router-link
                  :to="{ name: 'EmployeesEdit', params: { id: employee.id } }"
                  class="btn btn-warning"
                  >Edit</router-link
                >
                <button
                  @click.prevent="deleteEmployee(employee.id)"
                  class="btn btn-danger"
                >
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      employees: [],
      showMessages: false,
      messages: "",
      search: null,
      selectedDeprtment: null,
      departments: [],
    };
  },
  watch: {
    search() {
      this.getEmployees();
    },
    selectedDeprtment() {
      this.getEmployees();
    },
  },
  created() {
    this.getEmployees();
    this.getDepartments();
  },
  methods: {
    getEmployees() {
      axios
        .get("/api/employees", {
          params: {
            search: this.search,
            department_id: this.selectedDeprtment,
          },
        })
        .then((res) => {
          this.employees = res.data.data;
        })
        .catch((error) => {
          console.log(error);
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
    deleteEmployee(id) {
      axios.delete("/api/employees/" + id).then((res) => {
        (this.showMessages = true), (this.messages = res.data);
        this.getEmployees();
      });
    },
  },
};
</script>