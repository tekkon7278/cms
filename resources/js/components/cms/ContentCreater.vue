
<script>
export default {
    props: {
        pageId: Number,
        beforeContentId: Number
    },
    data() {
        return {
            isEditMode: false,
            inputText: ''
        }
    },
    methods: {
        switchMode() {
            this.isEditMode = !this.isEditMode;
            if (this.isEditMode) {
                this.$refs.edit.focus();
            }
        },
        update() {
            this.$emit('onCreateNew', {
                content: this.inputText,
                beforeContentId: this.beforeContentId
            });
            axios.post("/cms/sites/1/pages/" + this.pageId + "/contents", {
                content: this.inputText,
                beforeContentId: this.beforeContentId
            })
            .then(response => console.log(response))
            .catch(error => console.log(error));
        },
        cancelEdited() {
            this.inputText = '';
        }
    },
    watch: {
    }
};
</script>

<template>
    <div class="new">
        <div class="icon" v-show="!isEditMode" v-on:click="switchMode">{{ this.beforeContentId }}→</div>
        <div class="content-container"  v-show="isEditMode">
            <div class="edit">
                <textarea ref="edit" v-model="inputText"></textarea>
                <button v-on:click="update(), switchMode()">OK</button>
                <button v-on:click="cancelEdited(), switchMode()">Cancel</button>
            </div>
        </div>
    </div>
</template>

<style>
</style>