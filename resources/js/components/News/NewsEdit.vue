<template>
<section>
    <NewsCreate :data="data"></NewsCreate>
</section>
</template>

<script>

import NewsCreate from './NewsCreate'; 

export default {
    components: {NewsCreate},
    data: function() {
        return {
            data: {},
        }
    },
    created(){
        this.getNewsById();
    },
    methods: {
        getNewsById() {
            let id = this.$route.params.id;

            axios.get(`${api('news.store')}/${id}`)
            .then((response) => {
                this.data = response.data; 
            })
        }
    }
}
</script>

<style>

</style>
