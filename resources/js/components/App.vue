<template>
    <div id="root">
        <div class="wrapper">
            <!-- <BounceLoader size="100px" v-if="$root.loading"></BounceLoader> -->
            <div id="sidebar">
                <Sliderbar></Sliderbar>
            </div>    
            
            <div id="content">
                <Navbar></Navbar>
                <div class="page">
                    <!-- <transition name="router-anim" 
                                enter-active-class="animated fadeInDown"
                                leave-active-class="animated fadeOutDown"> -->
                        <router-view></router-view>
                    <!-- </transition> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import Sliderbar from './Templates/Sliderbar.vue';
import Navbar from './Templates/Navbar.vue';


export default {
    components: {Sliderbar, Navbar},
}
</script>

<style>

</style>