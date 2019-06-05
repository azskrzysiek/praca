<template>
<transition name="fade" appear mode="out-in">
    <div class="card-body text-center" :style="[score === 1 ? styleObject : '']">
        <div class="row">
            <div class="col-6">
                <h1>Gospodarze</h1>
                <img :src="img_home" alt="">
                 <h1>{{ player_home.user.name }}</h1>
            </div>
            <div class="col-6">
                <h1>Goście</h1>
                <img :src="img_away" alt="">
                 <h1>{{ player_away.user.name }}</h1>
            </div>
        </div>
    </div>
</transition>
</template>

<script>
export default {
    props: ['post','score','player_home','player_away'],

    data () {
        return {
        styleObject: {
            minHeight: '1000px',
            },
        img_home: this.player_home.image ? '/storage/' + this.player_home.image : '/jpg/noimage.jpg',
        img_away: this.player_away.image ? '/storage/' + this.player_away.image : '/jpg/noimage.jpg',
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

    img {
        height: 100px;
    }


</style>
