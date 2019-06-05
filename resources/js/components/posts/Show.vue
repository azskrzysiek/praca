<template>
<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-around">
                <div>
                    <button class="btn btn1 btn-primary" 
                    :class="{'btnActive':score === 1}" 
                    @click.prevent="showHalf()">Połowa</button>
                </div>
                <div>
                    <button class="btn btn1 btn-primary" 
                    :class="{'btnActive':score === 2}"
                    @click.prevent="showFull()">Cały mecz</button>
                </div>
                <div>
                    <button class="btn btn1 btn-primary" 
                    :class="{'btnActive':score === 3}"
                    @click.prevent="showChart()">Wykresy</button>
                </div>
            </div>
        </div>
            <half :post="post" :player_home="player_home" :player_away="player_away" :score="score" v-if="score === 1" :key="score"></half>
            <full :post="post" :score="score" :player_home="player_home" :player_away="player_away" v-else-if="score === 2" :key="score"></full>
            <chart :post="post" :score="score" v-else-if="score === 3" :key="score"></chart>
    </div>
</div>
    
   
    

</template>

<script>
 
export default {
    props: ['post','player_home','player_away'],
    data () {
        return {
            score: 2,
            isHalf: 0,
            
        }
    },
    methods: {
        showHalf() {
            this.score = 1;
            console.dir(this.score);
        },
        showFull() {
            this.score = 2;
        },
        showChart() {
            this.score = 3;
        },
        onChild(value) {
            this.score = value;
        }
    },
}
</script>

<style scoped>
.btn {
    box-sizing: border-box;
    max-height: 77px;
    min-width: 145px;
}
.btn1 {
    position: relative;
    display: inline-block;
    padding: 20px 30px;
    font-size: 1.4rem;
    transition: all ease 0.3;
}

.btn1::after {
    position: absolute;
    top: 60%;
    left: 47%;
    content: ">";
    transform: rotate(90deg);
    transition: all ease 0.3s;
    opacity: 0;
}

.btn1:hover {
    padding: 10px 30px 40px 30px;
}

.btn1:hover::after {
    top: 65%;
    opacity: 1;
}

.btnActive {
    background-color: blue;
    padding: 10px 30px 40px 30px;
}

.btnActive::after {
    top: 65%;
    opacity: 1;
}
.skill-bar {
    height: 1000px;
}


</style>
