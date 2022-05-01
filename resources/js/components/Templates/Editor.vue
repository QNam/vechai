<template>
<div>
    <froala :tag="'textarea'" :config="config"  v-model="value"></froala>
</div>
</template>

<script>


export default {
    props: ['content'],
    data () {
        return {
            value: this.content || "", 
            config: {
                height: 500,
                toolbarButtons: [
                    ["newhtml", "htmltemplates", "copyhtml", "pastecontent", "undo", "redo", "paragraphFormat", "fontFamily", "fontSize", "textColor", "backgroundColor", "bold", "italic", "underline", "strikeThrough"],
                    ["subscript", "superscript", "alignLeft", "alignCenter", "formatOLSimple", "alignRight", "alignJustify", "formatOL", "formatUL", "lineHeight", "outdent", "indent", "quote", "inlineStyle", "clearFormatting"],
                    ["insertLink", "insertImage", "insertVideo", "insertTable", "fontAwesome", "specialCharacters", "insertHR", "fullscreen", "print", "spellChecker", "selectAll", "pageStyleDefaults", "help"]
                ],
                fontFamily: {
                    'Arial,Helvetica,sans-serif': 'Arial',
                    'Georgia,serif': 'Georgia',
                    'Impact,Charcoal,sans-serif': 'Impact',
                    'Tahoma,Geneva,sans-serif': 'Tahoma',
                    "'Times New Roman',Times,serif": 'Times New Roman',
                    'Verdana,Geneva,sans-serif': 'Verdana',
                    'Cabin': 'Cabin',
                },
                imageUploadParam: 'media',
                imageUploadURL: api('media.upload'),
                //imageUploadParams: {id: 'froala-editor'},
                imageUploadMethod: 'POST',
                imageMaxSize: 5 * 1024 * 1024,
                imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif'],

                events: {
                    contentChanged: () => {
                        this.$emit('contentChanged', this.value)
                    }
                }
            },
        }
    },
    methods: {
        
    },
    watch: {
        content: function() {
            this.value = this.content
        }
    }
}
</script>

<style>
@import url('https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600,600i,700,700i&display=swap&subset=vietnamese');
</style>