<template>
    <div>
        <div v-for="todo in todos" :key="todo.index" style="list-style-type: none;">
            <input
                v-if="todo.edit"
                v-model="todo.title"
                @blur="todo.edit = false; $emit('update')"
                @keyup.enter="todo.edit=false; $emit('update')"
                v-focus
            >
            <div v-else>
                <label @click="todo.edit = true;"> Facebook </label>
            </div>
        </div>
    </div>
    
</template>

<script>
export default {
    data() {
        return {
            todos: [
            { title: 'http://facebook.com/KrzysztofNowicki', edit: false },
         ],
    editedTodo: null,
    message: 'Hello Vue.js!'
    };
  },
  methods: {
    editTodo: function (todo) {
      this.editedTodo = todo
    }
  },
  directives: {
    focus: {
      inserted (el) {
        el.focus()
      }
    }
  }
}

</script>

<style>

</style>
