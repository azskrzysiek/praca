<template>
<transition name="fade" appear mode="out-in">
    <div class="card-body text-center" :style="[score === 1 ? styleObject : '']">
        <div class="row">
            <div class="col-6">
                <h1 class="h1">Gospodarze</h1>
                <div class="mvp d-flex flex-column justify-content-center">
                    <h1 class="h1">Bramki zdobyte</h1>
                    <i class="fas fa-futbol pb-2"></i>
                    <h1>{{ score_home }}</h1>
                </div>
                 <div class="mvp d-flex flex-column justify-content-center">
                    <h1 class="h1">Szanse na zwycięstwo</h1>
                    <i class="fas fa-dice blue"></i>
                    <h1>{{ chance_home }} %</h1>
                </div>
                <div class="mvp d-flex flex-column justify-content-center">
                    <h1 class="h1">Bramki różnica</h1>
                    <i class="fas fa-futbol red pb-2"></i>
                    <h1>{{ score_home_roz }}</h1>
                </div>
            </div>
            <div class="col-6">
                <h1 class="h1">Goście</h1>
                <div class="mvp d-flex flex-column justify-content-center">
                    <h1 class="h1">Bramki zdobyte</h1>
                    <i class="fas fa-futbol pb-2"></i>
                    <h1>{{ score_away }}</h1>
                </div>
                <div class="mvp d-flex flex-column justify-content-center">
                    <h1 class="h1">Szanse na zwycięstwo</h1>
                    <i class="fas fa-dice blue"></i>
                    <h1>{{ chance_away }} %</h1>
                </div>
                <div class="mvp d-flex flex-column justify-content-center">
                    <h1 class="h1">Bramki różnica</h1>
                    <i class="fas fa-futbol red pb-2"></i>
                    <h1>{{ score_away_roz }}</h1>
                </div>
            </div>
        </div>
    </div>
</transition>
</template>

<script>
import VueApexCharts from 'vue-apexcharts'
export default {
    name: 'Chart',
    components: {
    apexcharts: VueApexCharts,
  },
    props: ['post','score','player_home','player_away'],

    data () {
        return {
        styleObject: {
            minHeight: '1000px',
            },
        img_home: this.player_home.image ? '/storage/' + this.player_home.image : '/jpg/noimage.jpg',
        img_away: this.player_away.image ? '/storage/' + this.player_away.image : '/jpg/noimage.jpg',
        link_home: '/profile/' + this.player_home.id,
        link_away: '/profile/' + this.player_away.id,
        score_roz: '',
        score_home: '',
        score_away: '',
        score_home_roz: '',
        score_away_roz: '',
        chance_home: '',
        chance_away: '',
        };
       
    },

    mounted () {
        score_home: {
            this.score_roz = this.post.scoreHalf.split(':').map(Number);
            this.score_home = this.score_roz[0];
            this.score_away = this.score_roz[1];
            this.score_home_roz = (this.score_roz[0] - this.score_roz[1]);
            this.score_away_roz = (this.score_roz[1] - this.score_roz[0]);
            this.score_home_roz > 0 ? (this.score_home_roz = '+' + this.score_home_roz) : (this.score_home_roz = this.score_home_roz);
            this.score_away_roz > 0 ? (this.score_away_roz = '+' + this.score_away_roz) : (this.score_away_roz = this.score_away_roz);
            this.chance_home = (this.score_home * 100 / (this.score_away + this.score_home));
            this.chance_away = (this.score_away * 100 / (this.score_away + this.score_home));
            this.chance_home = this.chance_home.toFixed(2);
            this.chance_away = this.chance_away.toFixed(2);
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
    .h1 {
        font-weight: 700;
    }

    i {
        font-size: 200%;
        padding: 10px;
    }

    .blue {
        color: #1a1aff;
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
    .mvp {
        padding: 5vh 0;
        border-bottom: 1px solid #000;
        height: 290px;
    }
    .fa-trophy {
        color: #f4ee42;
    }
    .fa-hand-peace {
        color: #e60000;
        padding: 10px;
    }
    .fa-futbol {
        color: #33cc33;
        padding: 10px;
    }
    .red {
        color: #e60000;
    }


</style>
