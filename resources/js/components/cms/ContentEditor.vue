
<script>
export default {
    props: {
        content: Object
    },
    data() {
        return {
            isEditMode: false,
            originalValue: ''
        }
    },
    methods: {
        switchMode() {
            this.isEditMode = !this.isEditMode;
            if (this.isEditMode) {
                this.originalValue = this.content.content;
                this.$refs.edit.style.height = this.$refs.disp.getBoundingClientRect().height + 'px';
                this.$refs.edit.focus();
            }
        },
        update() {
            axios.put("/cms/sites/1/pages/" + this.content.pageId + "/contents/" + this.content.id, {
                content: this.content.content
            })
            .then(response => console.log(response))
            .catch(error => console.log(error));
        },
        cancelEdited() {
            this.content.content = this.originalValue;
        }
    },
    watch: {
    }
};
</script>

<template>
    <div class="content-container">
        <div class="disp" v-show="!isEditMode" v-on:click="switchMode">
            <div class="text" ref="disp">{{ content.content }}</div>
        </div>
        <div class="edit" v-show="isEditMode">
            <textarea ref="edit" v-model="content.content"></textarea>
            <button v-on:click="update(), switchMode()">OK</button>
            <button v-on:click="cancelEdited(), switchMode()">Cancel</button>
        </div>
    </div>
</template>

<style>
</style>