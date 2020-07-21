<template>
      <div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5  class="modal-title" id="exampleModalLabel">تعديل</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <input v-if="!showsearch" type="text" class="form-control my-2" name="name" placeholder="title"  v-model="Edit.name" />
       <input v-else type="text" class="form-control my-2" name="name" placeholder="title"  v-model="searchEdit.name" />
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
          <button type="button" class="btn btn-success" @click="updateemp">تعديل</button>
      </div>
    </div>
  </div>
</div>
 <div class="container">
   
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-md-8">
            <div class="input-group">
              <input type="text" v-model="search" class="form-control">
              <div class="input-group-prepend">
                <button @click.prevent="searchemp()" class="btn btn-primary"><i class="fa fa-search"></i></button>

              </div>

            </div>
            </div>
            <div class="card">
            


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

      <tbody v-if="!showsearch">
                <tr    v-for="emp in employees"  :key="emp.id" >


       
          <td colspan="1">
        <a type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.id,emp.status)">
        {{emp.status}}
        </a>
        </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp)">
          12%
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.id,emp.job.price)">
          {{emp.job.price}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.job.id,emp.job.name)">
          {{emp.job.name}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.id,emp.user.phone)">
          {{emp.user.phone}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.id,emp.user.email)">
          {{emp.user.email}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.user.id,emp.user.name)">
          {{emp.user.name}}
          </button>
          </td>
            <td colspan="1">
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(emp.id,emp.user.NID)">
            {{emp.user.NID}}
            </button>
            </td>
                </tr>

      </tbody>
 <tbody v-else >
                <tr    v-for="res in result.data"  :key="res.id" >


       
          <td colspan="1">
        <a type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(res.id,res.status)">
        {{res.status}}
        </a>
        </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(res)">
          12%
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(res.id,res.job.price)">
          {{res.job.price}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(res.job.id,res.job.name)">
          {{res.job.name}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(res.id,res.user.phone)">
          {{res.user.phone}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(res.id,res.user.email)">
          {{res.user.email}}
          </button>
          </td>
          <td colspan="1">
          <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(res.user.id,res.user.name)">
          {{res.user.name}}
          </button>
          </td>
            <td colspan="1">
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" @click="editPost(res.id,res.user.NID)">
            {{res.user.NID}}
            </button>
            </td>
                </tr>

      </tbody>
    </table>
      </div>
     </div>
   
      </div>
      </div>
      </div>
      </div>

</template>

<script>
export default {
      data () {
      return {
        employees:{
            id:'',
          name:'fi9',
          email:'',
          phone:'',
          NID:'',
        

        },
        Edit:{
          id:'',
          name:'',
        },
        search:'',
        showsearch:false,
        result:{
          id:'',

        },
        searchEdit:{
        id:'',
        name:'',
        }
      
      }
      },
    
    methods:{
      searchemp(){
        fetch('api/search'+this.search)
        .then(res => res.json())
        .then(res => {
          this.Edit=res;
          this.result=res;
          this.search='';
          console.log(this.result);

          this.showsearch=true;
          console.log(this.showsearch);

          //this.result=response.data


        })
        .catch(err =>{
          console.log(err);
        });

        },
      getPost()
       {
            axios.get('api/getEmp').then(response=>{
              this.employees=response.data.data
              console.log(this.employees)
    })
        },
      editPost(id,emp){
        this.searchEdit.name = emp
        this.searchEdit.id = id
        this.Edit.name=emp
        this.Edit.id = id 
        console.log(this.Edit)


        },
          updateemp(){
                console.log(this.Edit)

        axios.put('api/updateemp/'+this.searchEdit.id,this.searchEdit).
        then(response=>{
          if(response.data.status=='error'){
            Toast.fire({
          icon: 'error',
          title: 'Create error'
        })
      
          }
else if (response.data.status=='success')
        {
Toast.fire({
  icon: 'success',
  title: 'Create successfully'
})
this.errors=[]
this.employees={
           id:'',
          name:'',
          email:'',
          phone:'',
          NID:'',
      
       

}
this.getPost()

        }
      
        }
        )
      },

    },
    
    
      created(){
    this.getPost()
  }
}
</script>
