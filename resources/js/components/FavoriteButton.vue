<template>
  
    <!-- <button @click="favoritePost" class="btn btn-secondary ml-3" v-text="buttonText"></button> -->
    <a @click="favoritePost">
        <i :class="{active: status }" class="fas pt-3 fa-2x fa-star"></i>
    </a>
  
</template>

<script>
export default {
    props: ['postId','favorit'],
  mounted() {
    console.log("Component mounted.");
  },

  data() {
      return {
          status: this.favorit
      }
  },

  methods: {
    favoritePost() {
      axios.post('/favorite/' + this.postId)
        .then(response => {
            this.status = ! this.status;
            console.log(response.data);
      })
        .catch(errors => {
            if (errors.response.status == 401){
                window.location = '/login';
            }
        });
    }
  },

  computed: {
      buttonText() {
          return (this.status) ? 'Unfavorite' : 'Favorite';
      }
  }
};
</script>
