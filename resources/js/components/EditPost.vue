<template>
    <div>
        <form class="w-full max-w-2xl mx-auto border shadow rounded p-5 mt-10 bg-white" @submit.prevent="onSubmit">

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Title
                        <p class="text-xs text-red-500 mt-2 normal-case font-semibold" v-text="errors.get('title')"></p>
                    </label>
                    <input v-model="form.title"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="email" type="text">

                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password">
                        Description
                        <p class="text-xs text-red-500 mt-2 normal-case font-semibold" v-text="errors.get('description')"></p>
                    </label>
                    <textarea v-model="form.description"
                        class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                        id="message"></textarea>
                </div>
            </div>


            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="images">
                        <div class="w-1/4">
                            <p class="bg-blue-500 px-2 py-1 text-white font-semibold rounded text-center cursor-pointer">Upload Images</p>
                        </div>
                    </label>
                </div>
            </div>


            <div v-if="image" class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <img  :src="'/images/blogpost/' + image" alt="">
                </div>
            </div>

            <div v-if="form.images" class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <img :src="form.images" alt="">
                </div>
            </div>

            <div class="md:flex md:items-center">
                <div class="md:w-1/3">
                    <button
                        :class="button_color + ' shadow focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded'"
                        type="submit">
                        {{button_text}}
                    </button>
                </div>
                <div class="md:w-2/3"></div>
            </div>

            <input class="invisible" id="images" type="file" @change="onFileChange"/>

        </form>
    </div>
</template>

<script>
  class Errors {
    constructor() {
      this.errors = {};
    }

    get(field) {
      if (this.errors[field]) {
        return this.errors[field][0];
      }
    }

    save(errors) {
      this.errors = errors;
    }

    clear(field) {
      delete this.errors[field];
    }
  }
    export default {

      props: {
         post: {
            type: Object
         },
         user: {
             type : String
         }
      },

    data: function () {
         return {
             errors: new Errors(),
             button_text : 'Submit',
             button_color : 'bg-teal-400',
             image : null,
             form : {
                 images      : null,
                 title       : null,
                 description : null,
                 id          : null,
                 
             }   
         }
     },

     mounted: function () {
         this.form.title = this.post.title;
         this.form.description = this.post.description;
         this.image = this.post.images;
         this.form.id = this.post.id
     },
     methods: {

        onFileChange(e) {
            const image = e.target.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(image);
            reader.onload = e =>{
                this.form.images = e.target.result;
                this.image = null
            }  
        },

        onSubmit() {
            // alert('asdasdasd');
            axios.post('/update-post', this.$data.form)

            .then(response => {
                this.button_text = 'Success'
                this.button_color = 'bg-blue-500'
                window.location.href = '/'+this.user;
            })

            .catch(error => {
              if (error.response.status == 422) {
                this.errors.save(error.response.data.errors);
              }
            })
        }
     }

    }

</script>
