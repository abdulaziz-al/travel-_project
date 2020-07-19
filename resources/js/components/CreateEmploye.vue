<template>
    <div>
 <div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            

                <div class="card-body">
             

                            <div class="col-sm-12 form-inline">
                              <multiselect 
                                v-model="job.selected"
                                :options="optionsArray">
                              </multiselect>
                            </div>
                            <br>
                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <img src="mail.png" class="img" alt="Avatar">

                                <input id="email" type="email" class="form-control  " name="email" v-model="job.email"   placeholder="الإيميل" required autocomplete="email">

                             

                              

                            </div>
                            <div class="col-md-6 input-container">
                                <img src="name.png" class="img" alt="Avatar">
                                <input id="name" type="text" class="form-control" name="name" v-model="job.name"   placeholder="الإسم الرباعي" required autocomplete="name" autofocus>

                            
                        
                            </div>
                           

                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 input-container">
                                <img src="date.png" class="img" alt="Avatar">

                                    <input type='text' class="form-control" name="exp" v-model="job.exp"  id="hijri-date-input5" placeholder="تاريخ إنتهاء الهوية أو الإقامة"/>
                             
                                                        </div>
                            <div class="col-md-6 input-container">
                                <img src="id.png" class="img" alt="Avatar">

                                <input type="text" class="form-control" name="NID" v-model="job.NID" placeholder="رقم الهوية">
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <div class="col-md-6">
                                <img src="phone.png" class="img" alt="Avatar">

                            <input type="text" class="form-control" name="phone" v-model="job.phone" placeholder="رقم الجوال">
                            </div>
                            <div class="col-md-6">
                                <img src="password.png" class="img" alt="Avatar">

                                
                                <input id="password" type="password" class="form-control" name="password" v-model="job.password" placeholder="الرقم السري" required autocomplete="new-password">

                             
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <br>

                                <button type="submit" @click="createJob" class="btn btn-primary" id="btn">
                                    إنشاء 
                                </button>
                            </div>
                        </div>
                         </div>
    </div> 
    </div> 
    </div>
     </div>
    </div>
</template>
<script>
  import Multiselect from 'vue-multiselect'
import underscore from 'vue-underscore'
import item from './Item'

  export default {
    components: { Multiselect  ,item},
    data () {
      return {
        job:{
          id:'',
          name:'',
          email:'',
          phone:'',
          NID:'',
          exp:'',
          password:'',
                  selected: null,

        },

        
        options: []
      }
    },
    methods:{
      createJob(){
        console.log(this.job)
        axios.post('api/createjob',this.job).
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
this.job={
           id:'',
          name:'',
          email:'',
          phone:'',
          NID:'',
          exp:'',
          password:'',

}

        }
      
        }
        )
      },
        getPost()
       {
            axios.get('api/getjob').then(response=>{
              this.options=response.data.data
    })
        }
    },
    computed:{
        optionsArray(){
            return _.map(this.options,
             function(num , key)
            {
                return num.name})
        }
    },

      created(){
    this.getPost()
  }
  }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
