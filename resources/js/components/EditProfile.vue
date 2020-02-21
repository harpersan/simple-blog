<template>
    <div>
        <div class="w-full flex flex-row flex-wrap">
            <div class="w-full bg-indigo-100 h-screen flex flex-row flex-wrap justify-center ">
                <div
                    class="bg-white shadow-lg border-t-4 border-indigo-500 absolute bottom-0 w-full md:w-0 md:hidden flex flex-row flex-wrap">
                    <div class="w-full text-right"><button class="p-2 fa fa-bars text-4xl text-gray-600"></button></div>
                </div>

                <div class="w-0 md:w-1/4 lg:w-1/5 h-0 md:h-screen overflow-y-hidden bg-white shadow-lg">
                    <div class="p-5 bg-white sticky top-0">


                        <img v-if="default_image" class="border border-indigo-100 shadow-lg round rounded-full"
                            src="http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg">

                        <img v-if="image" class="border border-indigo-100 shadow-lg round rounded-full w-56 h-56"
                            :src="'/images/profile/'+image">

                        <img v-if="form.profile_images" class="border border-indigo-100 shadow-lg round rounded-full w-56 h-56"
                            :src="form.profile_images">

                        <div class="pt-2 border-t mt-5 w-full text-center text-xl text-gray-600">
                        </div>

                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="images">
                        <div class="w-full flex justify-center">
                            <p
                                class="w-1/2 bg-blue-500 px-2 py-2 text-white font-semibold rounded text-center cursor-pointer">
                                Upload Images</p>
                        </div>
                    </label>                        
                    </div>

                    <div class="w-full h-screen antialiased flex flex-col hover:cursor-pointer">
                        <a class="hover:bg-gray-200 bg-white border-t-2 p-3 w-full text-left text-gray-600 font-semibold"
                            href="/create-post"><i
                                class="fas fa-plus text-gray-600 text-xl pr-1 pt-1 float-right"></i>Add Blog Post</a>
                        <a class="hover:bg-gray-200 bg-white border-t-2 p-3 w-full text-left text-gray-600 font-semibold"
                            href=""><i class="fa fa-cog text-gray-600 text-xl pr-1 pt-1 float-right"></i>Edit
                            Profile</a>
                        <a class="hover:bg-gray-200 bg-white border-t-2 p-3 w-full text-left text-gray-600 font-semibold"
                            href=""><i class="fa fa-arrow-left text-gray-600 text-xl pr-1 pt-1 float-right"></i>Log
                            out</a>
                    </div>
                </div>

                <!-- End Navbar -->

                <div class="w-full md:w-3/4 lg:w-4/5 p-5 md:px-12 lg:24 h-full overflow-x-scroll antialiased">

                    <form class="w-full max-w-2xl mx-auto border shadow rounded p-5 mt-10 bg-white" @submit.prevent="onSubmit">

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-password">
                                    Name
                                    <p class="text-xs text-red-500 mt-2 normal-case font-semibold" v-text="errors.get('name')"></p>
                                    
                                </label>
                                <input v-model="form.name"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="text">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-password">
                                    Email
                                    <p class="text-xs text-red-500 mt-2 normal-case font-semibold" v-text="errors.get('email')"></p>

                                </label>
                                <input v-model="form.email"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="email">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-password">
                                    Password
                                    <p class="text-xs text-red-500 mt-2 normal-case font-semibold" v-text="errors.get('password')"></p>

                                </label>
                                <input v-model="form.password"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="password">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-password">
                                    Password Confirmation
                                </label>
                                <input v-model="form.password_confirmation"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    type="password">
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3">
                                <button
                                    :class="button_color + ' shadow focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded'"                                    type="submit">
                                    {{ button_text }}
                                </button>
                            </div>
                            <div class="md:w-2/3"></div>
                        </div>

                        <input class="invisible" id="images" type="file" @change="onFileChange" />

                    </form>

                </div>
            </div>

        </div>
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
            user: {
                type: Object
            }
        },

        data: function () {
            return {
                errors: new Errors(),
                button_text : 'Submit',
                button_color : 'bg-teal-400',                
                default_image : true,  
                image : null,  
                form: {
                    id: null,
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null,
                    profile_images: null
                }
            }
        },

        mounted: function () {

            if(this.user.profile_images){
               this.default_image = false
            }

            this.form.id = this.user.id;
            this.form.name = this.user.name;
            this.form.email = this.user.email;
            // this.form.profile_images = this.user.profile_images;

            this.image = this.user.profile_images;
        },
        methods: {

            onFileChange(e) {
                const image = e.target.files[0];
                const reader = new FileReader();
                reader.readAsDataURL(image);
                reader.onload = e => {
                    this.form.profile_images = e.target.result;
                    this.image = null
                    this.default_image = false
                }
            },

            onSubmit() {
                // alert('asdasdasd');
                axios.post('/update-profile', this.$data.form)

                .then(response => {
                    this.button_text = 'Success'
                    this.button_color = 'bg-blue-500'
                    window.location.href = '/'+this.form.name;
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
