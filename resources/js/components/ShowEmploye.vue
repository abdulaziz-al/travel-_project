<template>
      <div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5  class="modal-title" id="exampleModalLabel">create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <input type="text" class="form-control my-2" placeholder="title"  v-model="name" >
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" >create</button>
      </div>
    </div>
  </div>
</div>

                <div class="card-body">
             
    <table class="table table-hover">
      <thead>
        <tr>
          <th colspan="1">الحالة</th>
          <th>البدلات</th>
          <th>الراتب</th>
          <th>الوظيفة</th>
          <th>رقم الجوال</th>
          <th>الإيميل</th>
          <th>الإسم</th>
          <th>رقم الهوية </th>

        </tr>
      </thead>
      <tbody>
                <tr v-for="emp in employees"  :key="emp.id" >


       
          <td colspan="1">
        <a type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.status)">
        {{emp.status}}
        </a>
        </td>
          <td colspan="1">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp)">
          12%
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.job.price)">
          {{emp.job.price}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.job.name)">
          {{emp.job.name}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.user.phone)">
          {{emp.user.phone}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.user.email)">
          {{emp.user.email}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.user.name)">
          {{emp.user.name}}
          </button>
          </td>
            <td colspan="1">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.user.NID)">
            {{emp.user.NID}}
            </button>
            </td>
                </tr>

      </tbody>
    </table>
      </div>
   
      </div>

</template>

<script>
export default {
      data () {
      return {
        employees:{
          },
                  name:'zee'

      }
      },
    
    methods:{
      getPost()
       {
            axios.get('api/getEmp').then(response=>{
              this.employees=response.data.data
    })
        },
 editPost(emp){
     this.name=emp
        console.log(this.name)


        }
    },
    
    
      created(){
    this.getPost()
  }
}
</script>