<template>
    <div class="mt-4">
        <!-- <h2 class="text-xl text-center">
            {{message}}
        </h2> -->

        <file-pond
            name="image"
            ref="pond"
            class-name="my-pond"
            label-idle="Drop or choose images here..."
            server="/upload"
            @init="filepondInitialized"
           
            accepted-file-types="image/*" 
        />

        <!-- <vue-file
            name="image"
            ref="pond"
            class-name="my-pond"
            label-idle="Drop or choose images here..."
            server="/upload"
        /> -->


    </div>
</template>

<script>

import vueFilePond from 'vue-filepond';

import "filepond/dist/filepond.min.css";

//para resolver 
//[Vue warn]: Property "acceptedFileTypes" was accessed during render but is not defined on instance. 
//   at <FilePond name="image" ref="pond" class-name="my-pond"  ... > 

import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

const FilePond = vueFilePond(FilePondPluginFileValidateType);
// const FilePond = vueFilePond();

export default {

    components: {
        FilePond  //,<file-pond>
        // 'vue-file' :FilePond
    },

    data() {
        return {
            // message: 'Hello, world!'
        }
    },

    methods : {
        filepondInitialized(){
            console.log("Fileponde is ready to be used!");
            console.log('Filepond obj: ', this.$refs.pond);
        }
    }
    
}
</script>