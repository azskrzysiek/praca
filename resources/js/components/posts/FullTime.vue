<template>
<transition name="fade" appear mode="out-in">
    <div class="card-body text-center zero" :style="[score === 2 ? styleObject : '']">
        <h1>Full time score</h1>
    </div>
</transition>
</template>

<script>
export default {
    props: ['score'],
    data () {
        return {
            styleObject: {
                minHeight: '1000px' ,
            },
        }
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
