<template>
<div>
  <apexchart width="500" type="donut" :options="options" :series="series"></apexchart>
</div>
</template>

<script>
import VueApexCharts from 'vue-apexcharts'


export default {
  name: 'Chart',
  components: {
    apexcharts: VueApexCharts,
  },
  data: function() {
    return {
      options: {
        chart: {
            animations: {
                enabled: true,
                easing: 'easeinout',
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
        labels: ['Apple', 'Mango', 'Orange', 'Watermelon'],
      },
      series: [44, 55, 41, 17, 15],
    }
  },
}
</script>
