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

                             <div class="form-group row">
                            
                            <div class="col-md-6">
                                <img src="mail.png" class="img" alt="Avatar">
                                 <v-text-field label="الإيميل " name="email" type="email"  v-model="job.email"  ></v-text-field>
                            </div>
                            <div class="col-md-6 input-container">
                                <img src="name.png" class="img" alt="Avatar">
                                 <v-text-field label="الأسم الرباعي " name="name" v-model="job.name" ></v-text-field>
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-md-6 input-container">
                                <img src="date.png" class="img" alt="Avatar">
                                 <div class="input-group date">
                                    <v-text-field label="تاريخ إنتهاء الهوية أو الإقامة" :value="job.exp"  v-on:change="onDateChange"  name="exp" type="text"  v-model="job.exp"  id="hijri-date-input2"  ></v-text-field>
                                     </div>   
                                    </div>
                            <div class="col-md-6 input-container">
                                <img src="id.png" class="img" alt="Avatar">
                                    <v-text-field label="رقم الهوية"  name="NID"  v-model="job.NID"    ></v-text-field>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <img src="phone.png" class="img" alt="Avatar">
                            <v-text-field label="رقم الجوال"   v-model="job.phone"   name="phone"  ></v-text-field>

                            </div>
                            <div class="col-md-6">
                                <img src="password.png" class="img" alt="Avatar">
                            <v-text-field label="كلمة المرور"  type="password"  v-model="job.password"   name="password"  ></v-text-field>
                            </div>
                        </div>

                        <v-file-input show-size counter multiple label="File input"  name="image"  v-model="job.image"></v-file-input>
                        <v-file-input accept="image/*" label="File input"  v-model="job.image" ></v-file-input>



                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <br>

                                <div class="my-2">
                                 <v-btn color="warning"   @click="createJob" dark>Normal Button</v-btn>
                        </div>
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
  export default {
          components: { Multiselect  },
    props:['value'],
    data: () => ({
      rules: [
        value => !!value || 'Required.',
        value => (value && value.length >= 3) || 'Min 3 characters',
      ],
           job:{
          id:'',
          name:'',
          email:'',
          phone:'',
          NID:'',
          exp:'',
          password:'',
          selected: null,
          image: [],
        },
		filename: 'Choose file',
    	file: '',
        success: '',
        options: [],
        value:null,
    }),
     methods:{
		  onFileChange(e) {
                //console.log(e.target.files[0]);
                this.filename = "Selected File: " + e.target.files[0].name;
                this.file = e.target.files[0];
            },
            onDateChange(e) {
                //console.log(e.target.files[0]);
                this.job.exp =  e
               console.log(this.job.exp)
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
