<template>
  <div class="col-8 m-auto">
    <h4 class="card-title ">Employee Data Management</h4>
        <div class="card mb-3">
            <div>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="#">
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" name="keyword" placeholder="Search" class="form-control mb-2" id="inlineFormInput">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <router-link :to="{name :'EmployeesCreate'}" class="btn btn-primary" >
                         <i class="fas fa-plus"></i> Create</router-link>
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
                        <tr>
                          <td>a</td>
                          <td>c</td>
                          <td>v`</td>
                          <td>f</td>
                          <td>f</td>
                          <td>
                            <a href="#" class="btn btn-success">Edit</a>
                          </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
  </div>
</template>