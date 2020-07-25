<template>
    <div>
      <v-app>
 <div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            

                <div class="card-body">
             

                            <div
                             class="col-sm-12 form-inline">
                              <multiselect 
                                v-model="job.selected"
                                :options="optionsArray">
                              </multiselect>
                            </div>
                            <br>
                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                <img src="mail.png" class="img" alt="Avatar">

                                <input id="email" type="email" class="form-control" name="email" v-model="job.email"   placeholder="الإيميل" required autocomplete="email"/>

                             

                              

                            </div>
                            <div class="col-md-6 input-container">
                                <img src="name.png" class="img" alt="Avatar">
                                 <v-text-field label="الأسم الرباعي " v-model="job.name" :rules="rules" :value="value"  ></v-text-field>


                            
                        
                            </div>
                           

                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 input-container">
                                <img src="date.png" class="img" alt="Avatar">

                                    <input type='text' class="form-control"  v-model="job.exp" name="exp"  id="hijri-date-input5" placeholder="تاريخ إنتهاء الهوية أو الإقامة"/>
                             
                                                        </div>
                            <div class="col-md-6 input-container">
                                <img src="id.png" class="img" alt="Avatar">

                                <input type="text" class="form-control" name="NID" v-model="job.NID" placeholder="رقم الهوية"/>
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <div class="col-md-6">
                                <img src="phone.png" class="img" alt="Avatar">

                            <input type="text" class="form-control" name="phone" v-model="job.phone" placeholder="رقم الجوال"/>
                            </div>
                            <div class="col-md-6">
                                <img src="password.png" class="img" alt="Avatar">

                                
                                <input id="password" type="password" class="form-control" name="password" v-model="job.password" placeholder="الرقم السري" required autocomplete="new-password"/>

                             
                            </div>
       					

                        </div>
 							<form @submit="createJob" enctype="multipart/form-data">
                  			  <div class="input-group">
                       				 <div class="custom-file">
									
  						<v-file-input  label="File input"  v-on:change="onFileChange"></v-file-input>
                      				      <input type="file" name="filename" class="custom-file-input" id="inputFileUpload"
                       				            v-on:change="onFileChange">
                       				     <label class="custom-file-label" for="inputFileUpload"><p class="text-danger font-weight-bold">{{filename}}</p></label>
                 				       </div>
                				    </div>
                				    <br>
                				</form>
								
									
  						<v-file-input  label="File input" name="image" type="file"  v-model="job.image"></v-file-input>
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
								</v-app>

    </div>
</template>
<script>
import Multiselect from 'vue-multiselect'
import underscore from 'vue-underscore'
    var value = null 

  export default {

    components: { Multiselect  },
    props:['value'],
    data: () => ({    
        job:{
          id:'',
          name:null,
          email:'',
          phone:'',
          NID:'',
          exp:'',
          password:'',
          selected: null,
          image: '',
        },
		filename: 'Choose file',
    	file: '',
        success: '',
        options: [],
        value:null,
            rules: [
      name => !!name || 'Required.',
    name => (name && name.length >= 3) || 'Min 3 characters',
    ],
      
    }),
    methods:{
		  onFileChange(e) {
                //console.log(e.target.files[0]);
                this.filename = "Selected File: " + e.target.files[0].name;
                this.file = e.target.files[0];
			},
			 
      createJob(e){
		    e.preventDefault();
               let currentObj = this;
               const config = {
                   headers: {
                       'content-type': 'multipart/form-data',
                       'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                   }
               }
               // form data
               let formData = new FormData();
               formData.append('file', this.job.image);
  			formData.append('title', this.job.NID );
			console.log(formData);
               // send upload request
               axios.post('api/store_file', formData, config)
                   .then(function (response) {
                       currentObj.success = response.data.success;
                       currentObj.filename = "";
                   })
                   .catch(function (error) {
                       currentObj.output = error;
                   });
    //    const fd = new FormData();
    //    fd.append('image' , this.image)
    this.job.name = this.value
        console.log(this.job)
        axios.post('api/createjob',this.job).
        then(response=>{
          if(response.data.status=='error'){
            Toast.fire({
          icon: 'error',
          title: this.job.image.name
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

<style src="vue-multiselect/dist/vue-multiselect.min.css"> 
</style>
<style>
input{
    direction: rtl;
    width: 30%;
}
.img{
    width: 10%;
margin-left: 87%;
}
#btn{
width: 35%;
margin-left: 15%;
}

.imgg{
    width: 13%;
    margin-left: 87%;
    }
</style>
