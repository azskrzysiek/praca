<template>
<transition name="fade" appear mode="out-in">
 <div class="card-body text-center">
    <div class="d-flex flex-wrap justify-content-center">
      <apexchart width="500" type="donut" :options="options" :series="series"></apexchart>
      <apexchart width="500" type="donut" :options="options" :series="series"></apexchart>
      <apexchart width="500" type="donut" :options="options" :series="series"></apexchart>
      <apexchart width="500" type="donut" :options="options" :series="series"></apexchart>
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
  props: ['score','post'],
  data: function() {
    return {
      styleObject: {
          minHeight: '1000px',
          
      },
      options: {
        chart: {
            animations: {
                enabled: true,
                easing: 'easeoutin',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 150
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            }
        },
        labels: ['Gospodarze', 'Goście'],
      },
      series: [this.post.id, 20],
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
      height: 100px;
      transition: height 1s;
    }
    .fade-enter-active {
      height: 1000px;
    }


</style>
