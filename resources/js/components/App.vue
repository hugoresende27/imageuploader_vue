<template>


<div> 
    <div class="mt-4">
        <!-- <h2 class="text-xl text-center">
            {{message}}
        </h2> -->

        <file-pond
            name="image"
            ref="pond"
            class-name="my-pond"
            label-idle="Drop or choose images here..."
            
            @init="filepondInitialized"
           
            accepted-file-types="image/jpg, image/png" 
            @processfile ="handleProcessFile"
            max-file-size="1MB"
        />

        <!-- <vue-file
            name="image"
            ref="pond"
            class-name="my-pond"
            label-idle="Drop or choose images here..."
            server="/uploads"
        /> -->


    </div>
    <div class="mt-8 mb-24">
        <h3 class="text-2xl font-medium text-center">Image Gallery</h3>
            <div class="grid grid-cols-3 gap-2 justify-evenly mt-4">
                <div v-for="(image,index) in images" :key="index">
                    <img :src="'/storage/images/'+image">
                </div>

            </div>
    
    </div>
</div>
</template>

<script>

import vueFilePond, { setOptions } from 'vue-filepond';

import "filepond/dist/filepond.min.css";

import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';

let serverMessage = {};

setOptions({
    server: {
        process: {
            url: '/uploads',
            onerror: (response)=> {
                serverMessage = JSON.parse(response);
            },
            headers: {
                // 'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf_token"]').content
                'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf_token"]')
            }
        }
    },
    labelFileProcessingError:()=> {
        return serverMessage.error;
    }
});

//para resolver 
//[Vue warn]: Property "acceptedFileTypes" was accessed during render but is not defined on instance. 
//   at <FilePond name="image" ref="pond" class-name="my-pond"  ... > 



const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginFileValidateSize);
// const FilePond = vueFilePond();

export default {

    components: {
        FilePond  //,<file-pond>
        // 'vue-file' :FilePond
    },

    data() {
        return {
            // message: 'Hello, world!'
            images: []
        }
    },

    mounted() {
        axios.get('./images')
            .then((response) => {
                this.images = response.data;
            })
            .catch((error)=> {
                console.log(error);
            })
    },

    methods : {
        filepondInitialized(){
            console.log("Fileponde is ready to be used!");
            console.log('Filepond obj: ', this.$refs.pond);
        },

        handleProcessFile(error, file){
            if (error) {
                console.log(error);
                return ;
            }

            //add file to array
            console.log(file);
            this.images.unshift(file.serverId);
        }
    }
    
}
</script>