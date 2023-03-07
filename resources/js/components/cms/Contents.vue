<script>
import ContentEditor from "./ContentEditor.vue";
import ContentCreater from "./ContentCreater.vue";

export default {
    components: {
        ContentEditor,
        ContentCreater
    },
    props: {
        pageId: Number,
        contentsProp: Array
    },
    data() {
        return {
            contents: []
        }
    },
    mounted() {
        this.contents = this.contentsProp;
    },
    methods: {
        appendContent(arg) {
            const beforeIndex = this.contents.findIndex(content => content.id = arg.beforeContentId);
            this.contents.splice(beforeIndex + 1, 0, {
                id: 0,
                pageId: this.pageId,
                content: arg.content
            });
        }
    },
    watch: {
    }
};
</script>

<template>
    <div class="contents">
        <div v-for="content in contents" :key="content.id">
            <ContentEditor
                :content="content"
            />
            <ContentCreater
                :pageId="content.pageId"
                :beforeContentId="content.id"
                v-on:onCreateNew="appendContent"
            />
        </div>
    </div>
</template>

<style>
</style>