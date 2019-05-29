<template>
<transition name="fade" appear mode="out-in">
    <div class="card-body text-center" :style="[score === 1 ? styleObject : '']">
        <div>
            <h1>{{ post.id }}</h1>
        </div>
    </div>
</transition>
</template>

<script>
export default {
    props: ['post','score'],

    data () {
        return {
        styleObject: {
            minHeight: '1000px',
            },
        }
       
    },

    mounted () {
        console.log(this.post.id);
    },

    

}
</script>

<style scoped>

    .move-right {
        position: absolute;
        display: inline-block;
        right: 0;
        top: 8.5%;
        cursor: pointer;
    }

    .fade-enter {
      opacity: 0;
    }
    .fade-enter-active {
      transition: all 1s;
    }


</style>
